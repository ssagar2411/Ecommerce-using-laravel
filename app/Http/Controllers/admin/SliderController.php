<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Slider;
use App\model\admin\Brand;
use App\model\admin\Onsell;
use App\model\admin\Collection;
use App\model\admin\Category;

class SliderController extends Controller
{
    public function addSlider(){
        $collections = Collection::get();
        $onsells = Onsell::get();
        $brands = Brand::get();
        $categories = Category::get();
        //dd($brands);
        return view('admin.addslider')->with(compact('collections','onsells','brands','categories'));
    }

    public function insertSlider(Request $request){
        $data = $request->all();
        dd($data);
    }
}
