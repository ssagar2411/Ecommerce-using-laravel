<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Brand;

class BrandController extends Controller
{
    public function addBrand(Request $request){
        if($request->hasFile('brand_logo')){
            $img_tmp = Input::file('brand_logo');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $image_path = 'images/backend_images/brands/'.$filename;
                $img_tmp->move(public_path('images/backend_images/brands'),$filename);
            }
        }
        $data = $request->all();
        $brand = new Brand;
        $brand->brand_name = $data['brand_name'];
        $brand->brand_logo = $filename;
        $brand->save();
        return response()->json($brand);
    }

    public function manageBrand(){
        $brands = Brand::get();
        return view('admin.managebrand')->with(compact('brands'));
    }

    public function editBrand(Request $request){
        //dd($request->all());
        $brand = Brand::find($request->brand_id);
        //dd($brand);

        $brand->brand_name = $request->brand_name;
        if($request->hasFile('brand_logo')){
            $img_tmp = Input::file('brand_logo');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $imagepath = 'images/backend_images/brands/'.$filename;
                $img_tmp->move(public_path('images/backend_images/brands'),$filename);
                $brand->brand_logo = $filename;
                unlink('images/backend_images/brands/'.$request->brand_logo_old);
            }
        }else{
            $brand->brand_logo = $request->brand_logo_old;
        }
        $brand->save();
        $brand->sn = $request->sn;
        return response()->json($brand);
    }

    public function deleteBrand(Request $request){
        $brand = Brand::find($request->brand_id);
        //dd($brand['brand_logo']);
        unlink('images/backend_images/brands/'.$brand['brand_logo']);
        $brand->delete();
        return response()->json($brand);
    }
}
