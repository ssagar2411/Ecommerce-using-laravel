<?php

namespace App\Http\Controllers\user\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;
use Session;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('user.auth.login');
    }
    public function postLogin(Request $request){
		$validator=Validator::make($request->all(),[	        
	        'email' => 'required|email|max:255',
	        'password' => 'required',
	    ]);
	     if ($validator->passes()) {
	     	    	$email=$request->email;
	     	    	$password=$request->password;
	     	    	$rememberToken=$request->remember;
	     	    	// now we use the Auth to Authenticate the users Credentials
	     			// Attempt Login for members
	     			if (Auth::guard()->attempt(['email' => $email, 'password' => $password], $rememberToken)) {
						 $user=Auth::user();
						 $url = route('user.resend_verification'). '?email='.$user->email;
	     				if(!$user->active){
	     					Auth::logout();
		     				$msg = array(
		     					'success'  => 0,
		     					'message' => 'Please activate your account. <a href="' . $url .'">Resend verification email?</a>'
		     				);	     					
	     				}else{
		     				$msg = array(
		     					'success'  => 1,
		     					'message' => 'Sucessfully Loggedin',
		     					'role'=>$user->role->name,
		     					'redirect_url'=>$user->role->name=='user'?url('/user/profile'):url('/vendor/dashboard'),
		     				);		     					
	     				}
	     				return response()->json($msg);
	     			} else {
	     				$msg = array(
	     					'success'  => 0,
	     					'message' => 'Wrong Credentials!!!'
	     				);
	     				return response()->json($msg);
	     			}
	     }else{
	     	return response()->json(['errors' => $validator->errors()]);
	     }
    	
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect('/');
    }
    public function signupActivate($confirmation_code){
    	if( ! $confirmation_code)
    	{
    	    throw new InvalidConfirmationCodeException;
    	}

    	$verifyUser = User::where('activation_token', $confirmation_code)->first();



    	if(isset($verifyUser) ){
    	    $user = $verifyUser->user;
    	    if(!$verifyUser->active) {
    	        $verifyUser->active = 1;
    	        $verifyUser->activation_token = '';
    	        $verifyUser->save();
    	        $status = "Your e-mail is verified. You can now login.";
    	    }else{
    	        $status = "Your e-mail is already verified. You can now login.";
    	    }    	    
    	}else{
    	    return redirect('/user/login')->with('message', "Sorry your email cannot be identified.");
    	}

    	Session::flash('message',$status);

    	return redirect('/user/login');
    }
}
