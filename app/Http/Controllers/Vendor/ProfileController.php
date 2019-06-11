<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use App\model\vendor\Vendor;
use Image;
use Session;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function editProfile($id){
        //dd($id);
        $user = User::find($id);
        //dd($user->email);
        $data = Vendor::where('user_id',$id)->firstOrFail();
        $data->primary_email = $user->email;
        //dd($data);
        return view('vendor.editprofile')->with(compact('data'));
    }

    public function updateProfile(Request $request){
        $data = $request->all();
        //dd($data);
        $vendor = Vendor::find($data['id']); 
        //dd($vendor);
        $vendor->name = $data['name'];
        $vendor->phone_number = $data['primary_number'];
        $vendor->secondary_phone_number = $data['secondary_number'];
        $vendor->address = $data['address'];
        $vendor->secondary_email = $data['secondary_email'];
        $vendor->facebook_url = $data['facebook_link'];
        $vendor->twitter_url = $data['twitter_link'];
        $vendor->instagram_url = $data['instagram_link'];
        $vendor->description = $data['description'];
        if ($request->hasFile('image')) {
            $image_tmp = Input::file('image');
            if($image_tmp->isValid()){
                /*$originalimage = $request->file('image');
                $thumbnailimage = Image::make($originalimage);*/
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $image_path = 'images/vendor_images/profile/'.$filename;
                $image_tmp->move(public_path('images/vendor_images/profile'),$filename);
            }
            $vendor->logo = $filename;
        }else {
            $vendor->logo = $data['oldimg'];
        }
        $vendor->save();
        return redirect()->back()->with('msg','Profile has been updated Successfully . . . .');
    }

    public function getProfile(Request $request){
        $data = $request->all();
        //dd($data);
        $detail = Vendor::where('user_id', $data['id'])->firstOrFail();
        //dd($detail->logo);
        return response()->json($detail);
    }

    public function changePassword(){
        $primaryemail = Auth::user()->email;
        //dd($primaryemail);
        $data = Vendor::where('user_id',Auth::user()->id)->firstOrFail();
        return view('vendor.changepassword')->with(compact('data','primaryemail'));
    }

    public function matchPassword(Request $request){
        $data = $request->all();
        if(!(Hash::check($data['currentpass'], Auth::user()->password))){
            echo "false";
        }else{
            echo "true";
        } 
    }

    public function updatePassword(Request $request){
        $data = $request->all();
        //dd($data);
        $check_password = User::where('email',Auth::user()->email)->firstOrFail();
        //dd($check_password);
        $new_password = $data['new_password'];
        $password = bcrypt($new_password);
        User::where('email',Auth::user()->email)->update(['password'=>$password]);
        return redirect()->back()->with('msg','Password has been updated successfully . . .');
    }
}
