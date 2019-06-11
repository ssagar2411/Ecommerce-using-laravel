<?php

namespace App\Http\Controllers\vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use App\model\admin\Product;
use App\model\admin\Stocks_status;
use App\model\admin\Category;
use App\model\admin\Brand;
use App\model\admin\Attribute_group;
use App\model\admin\Attribute;
use App\model\admin\Product_image;
use App\model\admin\Product_attribute;
use App\User;
use App\model\vendor\Vendor;
use Auth;

class ProductController extends Controller
{
    public function addProduct(){
        $id = Auth::user()->id;
        $data = Vendor::where('user_id',$id)->firstOrFail();
        $stockstatus = Stocks_status::get();
        $categories = Category::get();
        $brands = Brand::get();
        $attribute_groups = Attribute_group::get();
        $branddropdown = "<option selected value=''>Select Product Brand</option>";
        $statusdropdown = "<option selected value=''>Select Product Status</option>";
        $categorydropdown = "<option selected value=''>Select Product Category</option>";
        $attributegroup = "<option selected value=''>Select Attribute Group</option>";
        foreach($stockstatus as $status){
            $statusdropdown.="<option value='".$status->status_id."'>".$status->status_name."</option>";
        }
        foreach($brands as $brand){
            $branddropdown.="<option value='".$brand->brand_id."'>".$brand->brand_name."</option>";
        }
        foreach($attribute_groups as $attribute_group){
            $attributegroup.="<option value='".$attribute_group->attribute_group_id."'>".$attribute_group->attribute_group_name."</option>";
        }
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
        return view('vendor.addproduct')->with(compact('categorydropdown','branddropdown','statusdropdown','data','attributegroup'));
    }

    public function createProduct(Request $request){
        //dd($request->all());
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('product_main_images')){
                $image_tmp = Input::file('product_main_images');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $mainimage = rand(111,99999).'.'.$extension;
                    $image_path = 'images/backend_images/products/main_image/'.$mainimage;
                    $image_tmp->move(public_path('images/backend_images/products/main_image'),$mainimage);
                }
            }
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];
            $product->product_code = $data['product_code'];
            $product->product_name = $data['product_name'];
            $product->product_description = $data['product_description'];
            $product->product_sku = $data['product_sku'];
            $product->stock_status_id = $data['stockstatus_id'];
            $product->mark_price = $data['mark_price'];
            $product->sell_price = $data['sell_price'];
            $product->quantity = $data['quantity'];
            $product->weight = $data['weight'];
            $product->weight_class_id = $data['weight_class_id'];
            $product->length = $data['length'];
            $product->width = $data['breadth'];
            $product->height = $data['height'];
            $product->vendorid = Auth::user()->id;
            $product->dimension_class_id = $data['dimension_class_id'];
            $product->product_images = $mainimage;
            $product->save();
            $item = Product::where('product_code',$data['product_code'])->get()->first()->toArray();
            $productid = $product->product_id;
            if($request->hasFile('product_images')){
                foreach($request->product_images as $product_image){
                    //dd($product_image);
                    if($product_image->isValid()){
                        $extension = $product_image->getClientOriginalExtension();
                        $productimage = rand(111,99999).'.'.$extension;
                        $image_path = 'images/backend_images/products/'.$productimage;
                        $product_image->move(public_path('images/backend_images/products'),$productimage);
                        $productimages = new Product_image;
                        $productimages->product_id = $productid;
                        $productimages->image = $productimage;
                        $productimages->save();
                    }
                }
            }
            $size = count($request->attribute);
            for($key = 0; $key < $size; $key++){
                $productattribute = new Product_attribute;
                $productattribute->product_id = $productid;
                $productattribute->attribute_id = $request->attribute[$key];
                $productattribute->attribute_value = $request->attribute_value[$key];
                $productattribute->save();
            }
            return redirect()->route('vendor.manage-product')->with('msg','Product Added Successfully . . .');
        }
    }

    public function getAttribute(Request $request){
        $groupid = $request->attribute_group_id;
        $attribute = Attribute::where('attribute_group_id',$groupid)->get();
        $attributedropdown = "<option selected value=''>Select Attribute</option>";
        foreach($attribute as $attr){
            $attributedropdown.="<option value='".$attr->attribute_id."'>".$attr->attribute_name."</option>";
        }
        return response()->json($attributedropdown);
        
    }

    public function manageProduct(){
        $id = Auth::user()->id;
        $products = Product::where('vendorid',$id)->get();
        foreach($products as $product){
            $brand = Brand::find($product->brand_id);
            $brand_name = $brand->brand_name;
            $product->brand_name = $brand_name;
            $stock_status = Stocks_status::find($product->stock_status_id);
            $stock_name = $stock_status->status_name;
            $product->stock_status_name = $stock_name;
        }

        return view('vendor.manageproduct')->with(compact('products'));
    }

    public function getcategoryProduct(Request $request){
        $data = $request->all();
        //dd($data['cat_id']);
        $catid = $data['cat_id'];
        $products = Product::where('category_id',$catid)->where('vendorid',Auth::user()->id)->get()->toArray();
        //dd(json_encode($products));
        return response()->json($products);
    }
}
