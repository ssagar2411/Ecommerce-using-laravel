<?php

namespace App\Http\Controllers\vendor\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\model\vendor\Vendor;
use App\Notifications\Vendor\SignupActivate;
use Auth;
class RegisterController extends Controller
{
    public function getRegister(){    	
    	return view('vendor.auth.register');
    }
        public function postRegister(Request $request){
        	$validator=Validator::make($request->all(),[
                'vname' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|confirmed',                
                'phone_number'=>'required|size:10|regex:/^[0-9]+$/i',
            ]);

            $input = $request->all();

            //dd("hi");

            if ($validator->passes()) {

                $user = new User([
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role_id'=>2,
                    'activation_token' => str_random(60),
                ]);
                $user->save();
                $vendor=Vendor::create([
                    'name'=>$request->vname,
                    'phone_number'=>$request->phone_number,
                    'user_id'=>$user->id,
                ]);
                $user->notify(new SignupActivate($user));

                Auth::logout();

                return response()->json([
                     'message' => 'Please verify your email','success' => '1'
                ], 201);

            }
            
            return response()->json(['errors' => $validator->errors()]);
        }
    public function resend(Request $request){
        $user = User::byEmail($request->email)->firstOrFail();
              
        if($user->hasVerifiedEmail()) {
            return redirect('vendor/login')->withInfo('Your email has already been verified');
        }
        $user->active=0;
        $user->activation_token=str_random(40);   
        $user->save();        
  
        $user->notify(new SignupActivate($user));      

        return redirect('vendor/login')->with('msg','Verification email resent. Please check your inbox');
    }
}
