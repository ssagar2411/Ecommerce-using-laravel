<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\model\Coupon;
use App\model\Coupon_setting;

class CouponController extends Controller
{
    public function manageCoupon(){
        $coupons = Coupon::where('vendorid',Auth::user()->id)->get();
        //dd($coupons);
        return view('vendor.managecoupon')->with(compact('coupons'));
    }

    public function addCoupon(){
        return view('vendor.addcoupon');
    }

    public function insertCoupon(Request $request){
        $data = $request->all();
        //dd($data);
        $data['userid'] = Auth::user()->id;
        $coupon = new Coupon;
        $coupon->vendorid = Auth::user()->id;
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->start_time = $data['start_date'];
        $coupon->end_time = $data['end_date'];
        $coupon->coupon_code = $data['coupon_code']; 
        $coupon->save();
        $coup = Coupon::where('coupon_code',$data['coupon_code'])->firstOrFail();
        //dd($coup->id);
        $couponsetting = new Coupon_setting;
        $couponsetting->coupon_id = $coup->id;
        $couponsetting->discount_type = $data['discount_type'];
        if($data['discount_type'] == 1){
            $couponsetting->discount_value = $data['discount_value'];
        }else{
            $couponsetting->discount_percent = $data['discount_percent'];
            $couponsetting->maximum_discount_value = $data['maximum_discount'];
        }
        $couponsetting->minimum_order_value = $data['minimum_order_value'];
        $couponsetting->issued_number_coupon = $data['issued_number_coupon'];
        $couponsetting->limit_per_customer = $data['limit_per_customer'];
        $couponsetting->save();
        return redirect()->route('vendor.manage-coupon')->with('msg','Coupon has been added Successfully . . .');


    }
}
