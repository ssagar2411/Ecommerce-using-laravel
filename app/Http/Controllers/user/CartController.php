<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Product;
use Cart;
use Session;

class CartController extends Controller
{
    public function addProduct(Request $request){
        //Cart::get($id);
        $data = $request->all();
        // dd($data);
        $product = Product::find($data['pid']);
        $sellprice = $product->sell_price;
        $productname = $product->product_name;
        $productimage = $product->product_images;
        $Attributes = [
            'color' => $data['color'],
            'size' => $data['size'],
            'image' => $productimage,
        ];
        Cart::add($data['pid'],$productname,$sellprice,$data['quantity'],$Attributes);
        // dd(Cart::getContent());
        $items['id'] = $data['pid'];
        $items['name'] = $productname;
        $items['price'] = $sellprice;
        $items['color'] = $data['color'];
        $items['size'] = $data['size'];
        $items['image'] = $productimage;
        $items['quantity'] =$data['quantity'];
        //$item = Cart::getContent(); 
        return response()->json($items);

    }

    public function getProduct(Request $request){
        $data = Cart::getContent();
        // dd($data);
        return response()->json($data);
    }

    public function viewCart(Request $request){
        $items = Cart::getContent();
        //dd($items->toArray());
        $subtotalprice = 0;
        $totalquantity = 0;
        foreach($items as $item){
            //dd($item['attributes']->size);
            $product = Product::find($item['id']);
            $item->markprice = $product->mark_price;
            $discount = (($product->mark_price - $item['price'])/$product->mark_price)*100;
            $item->dis_per = number_format((float)$discount, 2, '.', '');
            $itemtotalprice = $item['price']*$item['quantity'];
            $subtotalprice = $subtotalprice + $itemtotalprice;
            $totalquantity = $totalquantity + $item['quantity'];
            $item->itemtotalprice = $itemtotalprice;
            // dd($item->attributes->color);
        }
        $totalprice = $subtotalprice + 100;
        //dd($totalquantity);
        // dd($subtotalprice);
    
        if($request->ajax()){
        return view('cart.ajax.viewcart')->with(compact('items','subtotalprice','totalquantity','totalprice'));
        }
        return view('viewcart');
    }

    public function updateCart(Request $request){
        $data = $request->all();
        //dd($data['itemsingleprice']);
        //$updateddata = [];
       $updatedata = Cart::update($data['productid'],array(
            'quantity' => array(
                'relative' => false,
                'value' => $data['quantity']
            ),
        ));
       
        //dd($updatedata);
        return response()->json($updatedata);

    }

    public function deleteCart(Request $request){
        // dd($request->all());
        // $data = $request->all();
        $data = Cart::remove($request->id);
        return response()->json($data);
    }

    
}
