<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use App\model\admin\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            //dd($request->all());
            if($request->hasFile('cat_image')){
                //dd('hello');
                $image_tmp = Input::file('cat_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $image_path = 'images/backend_images/categories/'.$filename;
                    $image_tmp->move(public_path('images/backend_images/categories'),$filename);
                }
            }
            $data = $request->all();        
            //dd($data);   
            $parentid = $data['parent_id'];
            
            $category = new Category;
            $parent = Category::find($parentid);
            $category->cat_name = $data['cat_name'];
            $category->cat_description = $data['cat_description'];
            $category->cat_image = $filename;
            //dd($parent);
            $category->parent_id = $parentid;
            $category->save();
            
            
            //Category::create(['cat_name'=>$data['cat_name'],'cat_description'=>$data['cat_description'],'cat_image'=>$filename,$parent]);
            return redirect('admin/add-category')->with('flash_message','Category Added Successfully !!!');

        }else{
            $parentcategories = Category::get();
            $categorydropdown ="<option  selected value=''> Select Parent Category </option>";
            foreach($parentcategories as $category){
                if($category->parent_id == null){
                    $categorydropdown.= "<option value='".$category->cat_id."'>".$category->cat_name."</option>";
                }else{
                    $child = $category->cat_id;
                    $parents = Category::defaultOrder()->ancestorsOf($child);
                    //dd(json_decode($parents));
                    $parentlists = "";
                    foreach($parents as $parent){
                        $parentlist=$parent->cat_name;
                        $parentlists.=$parentlist." > ";
                    }
                    $parentlists.=$category->cat_name;
                    $categorydropdown.="<option value='".$category->cat_id."'>".$parentlists."</option>";
                }
            }
           
            return view('admin.addcategory')->with(compact('categorydropdown'));
        }
    }

    public function manageCategory( Request $request){
        $categories = Category::get();

        foreach($categories as $category){
            $parentlists = "";
            if($category->parent_id == Null){
                $parentlists = "Itself a Parent Category";
                //dd($category);
            } else{
                $parents = Category::defaultOrder()->ancestorsOf($category->cat_id);
                foreach($parents as $parent){
                    $parentlist=$parent->cat_name;
                    $parentlists.=$parentlist." > ";
                }
                //dd($parents);
            }
            $category->parentlists = $parentlists;
        }
        //dd($categories);
        return view('admin.managecategory',compact('categories'));
        
    }

    public function editCategory($id){
        $data = Category::find($id);
        $parents = Category::defaultOrder()->ancestorsOf($id);
        $plists = "";
        foreach($parents as $parent){
            $plist=$parent->cat_name;
            $plists.=$plist." > ";
        }
        $parentcategories = Category::get();
            $categorydropdown ="<option  selected value=''> Select Parent Category </option>";
            foreach($parentcategories as $category){
                if($category->parent_id == null){
                    $categorydropdown.= "<option value='".$category->cat_id."'>".$category->cat_name."</option>";
                }else{
                    $child = $category->cat_id;
                    $parents = Category::defaultOrder()->ancestorsOf($child);
                    //dd(json_decode($parents));
                    $parentlists = "";
                    foreach($parents as $parent){
                        $parentlist=$parent->cat_name;
                        $parentlists.=$parentlist." > ";
                    }
                    $parentlists.=$category->cat_name;
                    $categorydropdown.="<option value='".$category->cat_id."'>".$parentlists."</option>";
                }
            }
        //$parentlists.=$parents->cat_name;
        //dd($parentlists);
        return view('admin.editcategory')->with(compact('data','plists','categorydropdown'));

    }

    public function updateCategory(Request $request){
        $data = $request->all();
        //dd($data);
        $category = Category::find($data['cat_id']);
        //dd($category);
        $category->cat_name = $data['cat_name'];
        $category->cat_description = $data['cat_description'];
        if($data['parent_id'] == Null){
            $category->parent_id = $data['p_id'];
        }else{
            $category->parent_id = $data['parent_id'];
        }
        if($request->hasFile('cat_image')){
            $img_tmp = Input::file('cat_image');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $imagepath = 'images/backend_images/categories/'.$filename;
                $img_tmp->move(public_path('images/backend_images/categories'),$filename);
                $category->cat_image = $filename;
                unlink('images/backend_images/categories/'.$data['catagory_image']);
            }
        }else{
            $category->cat_image = $data['catagory_image'];
        }
        $category->save();
        return redirect()->route('admin.manage-category')->with('flash_message','Category Updated Successfully . . .');
        //dd($data);
    }
}
