<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Brand;
use App\model\admin\Collection;
use App\model\admin\Collection_product;
use App\model\admin\Product;
use App\model\admin\Contactinfo;
use App\model\admin\Product_image;
use App\model\admin\Product_attribute;
use App\model\admin\Attribute;
use App\model\admin\Attribute_group;
use Auth;

class HomeController extends Controller
{
    public function home(){
        //dd(Auth::user()->id);
       $products = Product::where('featured',1)->get();
       $randproducts = Product::take(8)->inRandomOrder()->get();
        $bestdeals = Product::get();
        $deal = [];
        foreach($bestdeals as $bestdeal){
            $markprice = $bestdeal->mark_price;
            $sellprice = $bestdeal->sell_price;
            $dpercent = (($markprice-$sellprice)/$markprice)*100;
            $per = number_format((float)$dpercent, 2, '.', '');
            //dd(number_format((float)$dpercent, 2, '.', ''));
            $bestdeal->discountpercent = $per;

        }
        $sorteddeals = collect($bestdeals)->sortBy('discountpercent')->reverse()->toArray();
        $discountedproduct = array_slice($sorteddeals,0,8);
        $latestproducts = Product::orderBy('created_at','desc')->take(8)->get();
        $collections = Collection::take(6)->get();
        // dd($collections);
        $brands = Brand::get();
        foreach($latestproducts as $latestproduct){
            $markprice = $latestproduct->mark_price;
            $sellprice = $latestproduct->sell_price;
            $dpercent = (($markprice-$sellprice)/$markprice)*100;
            $per = number_format((float)$dpercent, 2, '.', '');
            //dd(number_format((float)$dpercent, 2, '.', ''));
            $latestproduct->discountpercent = $per;

        }
        foreach($products as $product){
            $markprice = $product->mark_price;
            $sellprice = $product->sell_price;
            $dpercent = (($markprice-$sellprice)/$markprice)*100;
            $per = number_format((float)$dpercent, 2, '.', '');
            //dd(number_format((float)$dpercent, 2, '.', ''));
            $product->discountpercent = $per;

        }
        // dd($brands);
        return view('index')->with(compact('products','collections','randproducts','discountedproduct','latestproducts','brands'));
    }

    public function productPage($id){
        $product = Product::where('product_id',$id)->firstOrFail();
        $productimages = Product_image::where('product_id',$id)->get();
        $productattributes = Product_attribute::where('product_id',$id)->get();
        //dd($product->brand_id);
        $brand = Brand::where('brand_id',$product->brand_id)->firstOrFail();
        //dd($brand->brand_name);
        $product->brand_name = $brand->brand_name;
        foreach($productattributes as $productattribute){
            //dd($productattribute->attribute_id);
            $attribute = Attribute::where('attribute_id',$productattribute->attribute_id)->firstOrFail();
            $productattribute->attribute_name = $attribute->attribute_name;
            $attributegroup = Attribute_group::where('attribute_group_id',$attribute->attribute_group_id)->firstOrFail();
            $productattribute->attribute_group_name = $attributegroup->attribute_group_name;
        }
        if($product->dimension_class_id == 1){
            $product->dimension = 'MM';
        }elseif($product->dimension_class_id == 2){
            $product->dimension = 'CM';
        }elseif($product->dimension_class_id == 3){
            $product->dimension = 'M';
        }
        if($product->weight_class_id == 1){
            $product->weightclass = 'GM';
        }elseif($product->weight_class_id == 2){
            $product->weightclass = 'KG';
        }elseif($product->weight_class_id == 3){
            $product->weightclass = 'MG';
        }
        if($product->mark_price == $product->sell_price){
            $product->dis_stat = 0;
        }else{
            $discountper = (($product->mark_price - $product->sell_price)/$product->mark_price)*100;
            $per = number_format((float)$discountper, 2, '.', '');
            $product->dis_stat = 1;
            $product->discount = $per;
        }
        // dd($product);
        $relatedproducts = Product::where('category_id',$product->category_id)->get();
        // dd($productattributes);
        return view('productdetail')->with(compact('product','productimages','productattributes','relatedproducts'));
    }
}
