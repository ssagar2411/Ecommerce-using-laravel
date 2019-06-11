<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Onsell;
use App\model\admin\Category;
use App\model\admin\Sell_product;
use Response;

class OnsellController extends Controller
{
    //
    public function manageSell(){
        $sales = Onsell::get();
        return view('admin.managesell')->with(compact('sales'));
    }

    public function addSell(Request $request){
        $data = $request->all();
        //dd($data);
        $sale = new Onsell;
        $sale->sell_name = $data['sale_name'];
        $sale->started_at = $data['started_at'];
        $sale->end_at = $data['end_at'];
        $sale->interval = $data['interval'];
        $sale->save();
        return response()->json($sale);
    }

    public function deleteSell(Request $request){
        //dd($request->sell_id);
        $data = Onsell::find($request->sell_id)->delete();
        return response()->json($data);
    }

    public function updateSell(Request $request){
        //dd($request->sell_id);
        $data = Onsell::find($request->sell_id);
        $data->sell_name = $request->sell_name;
        $data->started_at = $request->started_at;
        $data->end_at = $request->end_at;
        $data->interval = $request->interval;
        $data->save();
        return response()->json($data);
    }

    public function saleProducts(){
        $sales = Onsell::get();
        foreach($sales as $sale){
            $sale_id = $sale->sell_id;
            $data = Sell_product::where('sell_id',$sale_id)->get();
            $productno = count($data);
            $sale->product_no = $productno;
        }
        return view('admin.saleproducts')->with(compact('sales'));
    }

    public function addsaleProducts( $id ){
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
        return view('admin.addsaleproduct')->with(compact('saledata','categorydropdown'));
    }
}
