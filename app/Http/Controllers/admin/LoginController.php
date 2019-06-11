<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
Use Auth;
Use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function index(){
        return redirect()->route('admin.getlogin');
    }

    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }
   public function login(Request $request){
       $auth = Auth::guard('admin')->attempt(['email' =>$request->email, 'password' => $request->password]);
       if($auth){
           return redirect($this->redirectTo);
       }
       Session::flash('message',"Wrong Email or Password !!!");
       return redirect()->back();
   }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    
    
}
