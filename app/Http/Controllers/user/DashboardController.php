<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\model\VendorUser\VendorUser;
use Session;


class DashboardController extends Controller
{
    public function index(){
        return view('user.profile.userprofile');
    }
    public function recentOrder(Request $request){
        return view('user.profile.index');
    }
    public function cancelOrder(Request $request){
        return view('user.profile.cancellation');
    }
    public function updateProfile(Request $request){
        // dd($request->all());
        $user = Auth::user();
        $userdetail = Auth::user()->vendoruser;
        $userdetail->fname = $request->fname;
        $userdetail->lname = $request->lname;
        $user->email = $request->email;
        $userdetail->dob = $request->dob;
        $userdetail->gender = $request->gender;
        $userdetail->mobile_number = $request->phoneno;
        $userdetail->province = $request->province;
        $userdetail->city = $request->city;
        $userdetail->postalcode = $request->postalcode;
        $userdetail->address = $request->ship_address;
        $userdetail->billingaddress = $request->bill_address;
        $userdetail->save();
        $user->save();
        return redirect()->route('user.profile')->with('msg','Profile has been updated successfully . . .');
    }
}
