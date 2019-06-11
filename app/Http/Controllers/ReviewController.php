<?php

namespace App\Http\Controllers;
use App\User;
use Auth;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request){
        $userid = Auth::user()->id;
        dd($userid);
    }

}
