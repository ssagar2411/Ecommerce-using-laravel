<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Sell_product;
use App\model\admin\Onsell;
use App\model\admin\Product;
class Sell_productController extends Controller
{
    //
    public function createsellProduct(Request $request){
        //dd($request->all());
        $data = $request->all();
        $b = count($data['product_id']);
        $sell_id = $data['sell_id'];
        for($key=0; $key<$b; $key++){
            $saleproduct = new Sell_product;
            $saleproduct->sell_id = $sell_id;
            $saleproduct->product_id = $request->product_id[$key];
            $saleproduct->sale_discount = $request->discount_percent[$key];
            //dd($saleproduct);
            $saleproduct->save();
        }
        return redirect()->route('admin.sale-products');
    }
    
    public function editsaleProduct($id){
        $data = Sell_product::where('sell_id',$id)->get();
        $sale = Onsell::find($id);
        $sale_name = $sale['sell_name'];
        $abc=[];
        foreach($data as $dat){
            $pid = $dat->product_id;
            $product = Product::where('product_id',$pid)->first();
            $product->sell_id = $id;
            $product->discount = $dat->sale_discount;
            array_push($abc,$product);
        }
        return view('admin.editsaleproduct')->with(compact('abc','sale_name'));
    }

    public function deletesellProduct(Request $request){
        $data = $request->all();
        $sellid = $data['sell_id'];
        $productid = $data['product_id'];
        $prod = Sell_product::where('sell_id',$sellid)->where('product_id',$productid)->delete();
        return response()->json($prod);
    }
}
