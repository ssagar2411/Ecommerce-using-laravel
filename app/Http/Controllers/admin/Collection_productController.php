<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Collection_product;
use App\model\admin\Product;
use App\model\admin\Collection;

class Collection_productController extends Controller
{
    //
    public function addCollectionproducts(Request $request){
        $data = $request->all();
        $a = count($data['product_id']);
        $collection_id = $data['collection_id'];
        //dd($data);
        for($key=0; $key<$a ; $key++){
            $collection_product = new Collection_product;
            $collection_product->collection_id = $data['collection_id'];
            $collection_product->product_id = $request->product_id[$key];
            $collection_product->save();
        }
        //dd($data);
        return redirect()->route('admin.collection-products')->with('msg','Product has been added successfully to Collection');
        
    }

    public function editCollectionproduct($id){
        $data = Collection_product::where('collection_id',$id)->get();
        //dd($data);
        $collection = Collection::find($id);
        // dd($collection);
        $collectionname = $collection['collection_name'];
        $collectionimage = $collection['collection_image'];
        //dd($collectionname);
        $abc = [];
       foreach($data as $dat){
            $p_id = $dat->product_id;
            $product = Product::where('product_id',$p_id)->first();
            $product->collection_id = $id;
            array_push($abc,$product);
        }
    //    dd($abc);
        return view('admin.editproductcollection')->with(compact('abc','collectionname','collectionimage'));
    }

    public function deleteCollectionproduct(Request $request){
        $data = $request->all();
        $col_id = $data['collection_id'];
        $pro_id = $data['product_id'];
        $prod = Collection_product::where('collection_id',$col_id)->where('product_id',$pro_id)->delete();
        return response()->json($prod);
    }
}
