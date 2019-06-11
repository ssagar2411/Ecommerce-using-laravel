<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\model\vendor\Vendor;
use Auth;

class DashBoardController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $data = Vendor::where('user_id',$id)->firstOrFail();
        return view('vendor.dashboard')->with(compact('data'));
    }
}
