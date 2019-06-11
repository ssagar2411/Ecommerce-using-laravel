<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\model\admin\Collection;
use App\model\admin\Category;
use App\model\admin\Collection_product;
use Response;

class CollectionController extends Controller
{
    //
    public function manageCollection(){
        $collections = Collection::get();
        return view('admin.managecollection')->with(compact('collections'));
    }
    
    public function addCollection(Request $request){
        $data = $request->all();
        // dd($data);
        if($request->hasFile('collection_image')){
            $img_tmp = Input::file('collection_image');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $image_path = 'images/backend_images/collections/'.$filename;
                $img_tmp->move(public_path('images/backend_images/collections'),$filename);
            }
        }
        $collection = new Collection;
        $collection->collection_name = $data['collection_name'];
        $collection->collection_description = $data['collection_description'];
        $collection->collection_image = $filename;
        $collection->save();
        return response()->json($collection);
    }
    public function collectionProducts(){
        $collections = Collection::get();
        foreach($collections as $collection){
            $col_id = $collection->collection_id;
            $data = Collection_product::where('collection_id',$col_id)->get();
            $product_no = count($data);
            $collection->product_no = $product_no;
        }
        //dd($collections);
        return view('admin.productcollection')->with(compact('collections'));
    }

    public function collectionProduct($id){
        $collection = Collection::find($id);
        //dd(json_decode($collection));
        $categories = Category::get();
        $categorydropdown = "<option selected value=''>Select Product Category</option>";
        foreach($categories as $category){
            if($category->parent_id == Null){
                $categorydropdown.="<option value='".$category->cat_id."'>".$category->cat_name."</option>";
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

        return view('admin.addcollectionproduct')->with(compact('categorydropdown','collection'));
    }

    public function editCollection(Request $request){
        // dd($request->all());
        $collection = Collection::find($request->collection_id);
        $collection->collection_name = $request->collection_name;
        if($request->hasFile('collection_image')){
            $img_tmp = Input::file('collection_image');
            if($img_tmp->isValid()){
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $image_path = 'images/backend_images/collections/'.$filename;
                $img_tmp->move(public_path('images/backend_images/collections'),$filename);
                $collection->collection_image = $filename;
            }
        } else {
            $collection->collection_image = $request->collection_img;

        }
        $collection->collection_description = $request->collection_desc;
        $collection->save();
        $collection->sn = $request->sn;
        return response()->json($collection);
    }

    public function deleteCollection(Request $request){
        $data = Collection::find($request->collection_id)->delete();
        //dd($data);
        return response()->json($data);
    }
}
