<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Contactinfo;
use App\model\admin\Sociallink;

class ContactinfoController extends Controller
{
    public function createContactinfo(){
        return view('admin.addcontactinfo');
    }

    public function addContactinfo(Request $request){
        $data = $request->all();
        //dd($data);
        $contactinfo = new Contactinfo;
        $contactinfo->address = $data['address'];
        $contactinfo->phone = $data['phone'];
        $contactinfo->email = $data['email'];
        $contactinfo->save();
        return redirect()->route('admin.create-contactinfo');
    }
}
