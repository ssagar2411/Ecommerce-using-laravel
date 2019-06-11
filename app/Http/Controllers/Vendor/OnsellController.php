<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Onsell;
use App\model\admin\Category;
use App\model\admin\Sell_product;
use Response;

class OnsellController extends Controller
{
    public function sellProducts(){
        $sales = Onsell::get();
        foreach($sales as $sale){
            $sale_id = $sale->sell_id;
            $data = Sell_product::where('sell_id',$sale_id)->get();
            $productno = count($data);
            $sale->product_no = $productno;
        }
        return view('vendor.saleproducts')->with(compact('sales'));
    }
    public function addProducts( $id ){
        //dd($id);
        $saledata = Onsell::find($id);
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
        //dd($saledata);
        return view('vendor.addsaleproduct')->with(compact('saledata','categorydropdown'));
    }
}
