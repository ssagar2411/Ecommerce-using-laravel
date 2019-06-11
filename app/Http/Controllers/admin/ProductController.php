<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use App\model\admin\Product;
use App\model\admin\Stocks_status;
use App\model\admin\Category;
use App\model\admin\Brand;
use App\model\admin\Attribute_group;
use App\model\admin\Attribute;
use App\model\admin\Product_image;
use App\model\admin\Product_attribute;
use App\model\admin\Collection_product;
use App\model\admin\Sell_product;
use App\model\admin\Tag;
use App\model\admin\Product_tag;



class ProductController extends Controller
{
    public function manageProduct(){
        $products = Product::get();
        $brands = Brand::get();
        $categories = Category::get();
        $stock_status = Stocks_status::get();
        $branddropdown = "<option selected disabled value=''>Search By Brands</option>";
        $statusdropdown = "<option selected disabled value=''>Search By Stock Status</option>";
        $categorydropdown = "<option selected disabled value=''>Search By Categories</option>";
        foreach($stock_status as $status){
            $statusdropdown.="<option value='".$status->status_id."'>".$status->status_name."</option>";
        }
        foreach($brands as $brand){
            $branddropdown.="<option value='".$brand->brand_id."'>".$brand->brand_name."</option>";
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
        foreach($products as $product){
            $brand = Brand::find($product->brand_id);
            $brand_name = $brand->brand_name;
            $product->brand_name = $brand_name;
            $stock_status = Stocks_status::find($product->stock_status_id);
            $stock_name = $stock_status->status_name;
            $product->stock_status_name = $stock_name;
        }
        //dd($products);
        return view('admin.manageproducts',compact('products','statusdropdown','branddropdown','categorydropdown'));
    }
    public function addProduct(){
        $stockstatus = Stocks_status::get();
        $categories = Category::get();
        $brands = Brand::get();
        $attribute_groups = Attribute_group::get();
        $branddropdown = "<option selected value=''>Select Product Brand</option>";
        $statusdropdown = "<option selected value=''>Select Product Status</option>";
        $categorydropdown = "<option selected value=''>Select Product Category</option>";
        $attributegroup = "<option selected value=''>Select Attribute Group</option>";
        $tagdropdown = "<option disabled value=''>Select Product Tags</option>";
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
        $tags = Tag::get();
        foreach($tags as $tag){
            $tagdropdown.="<option value='".$tag->id."'>".$tag->name."</option>";
        }
        // dd($tagdropdown);
        return view('admin.product')->with(compact('statusdropdown','categorydropdown','branddropdown','attributegroup','tagdropdown'));
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
    public function createProduct(Request $request){
         //dd($request->all());
        $tags = $request->tagid;
        
        
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
            $product->dimension_class_id = $data['dimension_class_id'];
            $product->product_images = $mainimage;
            $product->save();
            $item = Product::where('product_code',$data['product_code'])->get()->first()->toArray();
            $productid = $item['product_id'];
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
            foreach($tags as $tag){
                $producttag = new Product_tag;
                $producttag->pid = $productid;
                $producttag->tagid = $tag;
            }
            $size = count($request->attribute);
            for($key = 0; $key < $size; $key++){
                $productattribute = new Product_attribute;
                $productattribute->product_id = $productid;
                $productattribute->attribute_id = $request->attribute[$key];
                $productattribute->attribute_value = $request->attribute_value[$key];
                $productattribute->save();
            }
            return redirect()->route('admin.manage-product')->with('msg','Product Added Successfully . . .');
        }
    }

    public function getcategoryProduct(Request $request){
        $data = $request->all();
       // dd($data['cat_id']);
        $catid = $data['cat_id'];
        $products = Product::where('category_id',$catid)->get();
        $prod = [];
        foreach($products as $product){
            //dd($product->product_id);
            if(Collection_product::where('collection_id',$data['collection_id'])->where('product_id',$product->product_id)->get()->toArray() == null){
                array_push($prod,$product);
            }
        }
        //dd(json_encode($products));
        return response()->json($prod);
    }

    public function getsellProduct(Request $request){
        $data = $request->all();
       // dd($data['cat_id']);
        $catid = $data['cat_id'];
        $products = Product::where('category_id',$catid)->get();
        $prod = [];
        foreach($products as $product){
            //dd($product->product_id);
            if(Sell_product::where('sell_id',$data['sell_id'])->where('product_id',$product->product_id)->get()->toArray() == null){
                array_push($prod,$product);
            }
        }
        //dd(json_encode($products));
        return response()->json($prod);
    }

    public function setFeature(Request $request){
        //dd($request->feature);
        $product = Product::where('product_id',$request->product_id)->update(['featured'=>$request->feature]);
        return response()->json($request->feature);
    }
    public function viewProduct($id){
        // dd($id);
        $productdetail = Product::where('product_id', $id)->firstOrFail();
        $productimages = Product_image::where('product_id', $id)->get();
        $productattributes = Product_attribute::where('product_id', $id)->groupBy('attribute_id')->get();
        // dd($productattributes);
        foreach($productattributes as $productattribute){
            $attribute = Attribute::where('attribute_id',$productattribute->attribute_id)->firstOrFail();
            $attributegroup = Attribute_group::where('attribute_group_id', $attribute->attribute_group_id)->firstOrFail();
            $productattribute->attribute_name = $attribute->attribute_name;
            $productattribute->attribute_group_name = $attributegroup->attribute_group_name;
            $productattribute->attribute_group_id = $attributegroup->attribute_group_id;
            // dd($attributegroup);
        }
        $category = Category::where('cat_id', $productdetail->category_id)->firstOrFail();
        $parents = Category::defaultOrder()->ancestorsOf($category->cat_id);
        $plists = "";
        foreach($parents as $parent){
            $plist=$parent->cat_name;
            $plists.=$plist." > ";
        }
        $plists= $plists."".$category->cat_name;
        $productdetail->parent_category = $plists;
        $stockstatus = Stocks_status::where('status_id', $productdetail->stock_status_id)->firstOrFail();
        $productdetail->stockstatus = $stockstatus->status_name;
        $brand = Brand::where('brand_id',$productdetail->brand_id)->firstOrFail();
        $productdetail->brand_name = $brand->brand_name;
        if($productdetail->weight_class_id == 1){
            $productdetail->weight_class = 'GM';
        } else if($productdetail->weight_class_id == 2){
            $productdetail->weight_class = 'KG';
        } else if($productdetail->weight_class_id == 3){
            $productdetail->weight_class = 'MG';
        }
        if($productdetail->dimension_class_id == 1){
            $productdetail->dimension_class = 'MM';
        } else if($productdetail->dimension_class_id == 2){
            $productdetail->dimension_class = 'CM';
        } else if($productdetail->dimension_class_id == 3){
            $productdetail->dimension_class = 'M';
        }
        
        // dd($productattributes);
        return view('admin.viewproduct')->with(compact('productdetail','productimages','productattributes'));
    }

    public function editProduct($id){
        // dd($id);
        $product = Product::find($id);
        // dd($product);
        $stockstatus = Stocks_status::get();
        $categories = Category::get();
        $brands = Brand::get();
        $attribute_groups = Attribute_group::get();
        $branddropdown = "<option selected value=''>Select Product Brand</option>";
        $statusdropdown = "<option selected value=''>Select Product Status</option>";
        $categorydropdown = "<option selected value=''>Select Product Category</option>";
        $attributegroup = "<option selected value=''>Select Attribute Group</option>";
        $tagdropdown = "<option disabled value=''>Select Product Tags</option>";
        foreach($stockstatus as $status){
            if ($product->stock_status_id == $status->status_id) {
                $statusdropdown.="<option selected value='".$status->status_id."'>".$status->status_name."</option>";
            } else {
                $statusdropdown.="<option value='".$status->status_id."'>".$status->status_name."</option>";        
            }
        }
        foreach($brands as $brand){
            if ($product->brand_id == $brand->brand_id) {
                $branddropdown.="<option selected value='".$brand->brand_id."'>".$brand->brand_name."</option>";
            } else {
                $branddropdown.="<option value='".$brand->brand_id."'>".$brand->brand_name."</option>";
            }
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
                if($product->category_id == $category->cat_id){
                    $categorydropdown.="<option selected value='".$category->cat_id."'>".$parentlists."</option>";
                } else {
                    $categorydropdown.="<option value='".$category->cat_id."'>".$parentlists."</option>";
                }
                
            }
        }
        $tags = Tag::get();
        foreach($tags as $tag){
            $tagdropdown.="<option value='".$tag->id."'>".$tag->name."</option>";
        }
        // dd($tagdropdown);
        return view('admin.editproduct')->with(compact('product','statusdropdown','categorydropdown','branddropdown','attributegroup','tagdropdown'));
    }
}

