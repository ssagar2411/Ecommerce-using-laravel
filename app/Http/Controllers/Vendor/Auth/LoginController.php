<?php

namespace App\Http\Controllers\vendor\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Auth;
class LoginController extends Controller
{
    public function getLogin(){
    	return view('vendor.auth.login');
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect('vendor/login');
	}
	public function postLogin(Request $request){
		$validator=Validator::make($request->all(),[            
			'email' => 'required|email|max:255',
			'password' => 'required',
		]);
		if($validator->passes()) {
				$email=$request->email;
				$password=$request->password;
				$rememberToken=$request->remember;
				if(Auth::guard()->attempt(['email' => $email, 'password' => $password], $rememberToken)) {
					$user=Auth::user();
					if(!$user->active){
						Auth::logout();
						$url=route('vendor.resend_verification') . '?email=' . $user->email;
						$msg = array(
							'success'  => 0,
							'message' => 'Please activate your account. <a href="'.$url.'">Resend verification email?</a>'
						);                          
					}else{
						$request->session()->regenerate();                            
						$msg = array(
							'success'  => 1,
							'message' => 'Sucessfully Loggedin',
							'role'=>$user->role->name,
							'redirect_url'=>$user->role->name=='user'?url('/user/profile'):url('/vendor/dashboard'),
						);                                                          
					}
					return response()->json($msg);
				}else{
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
    public function signupActivate($confirmation_code){
    	if( ! $confirmation_code)
    	{
    	    throw new InvalidConfirmationCodeException;
    	}

    	$verifyUser = User::where('activation_token', $confirmation_code)->first();
    	if(isset($verifyUser) ){    	   
    	    if(!$verifyUser->active) {
    	        $verifyUser->active = 1;
    	        $verifyUser->activation_token = '';
    	        $verifyUser->save();
    	        $status = "Your e-mail is verified. You can now login.";
    	    }else{
    	        $status = "Your e-mail is already verified. You can now login.";
    	    }
                	    
    	}else{
    	    return redirect('/vendor/login')->with('message', "Sorry your email cannot be identified.");
    	}

    	Session::flash('message',$status);

    	return redirect('/vendor/login');
    }
}
