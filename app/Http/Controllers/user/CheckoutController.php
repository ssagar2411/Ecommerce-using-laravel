<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\Product;
use Cart;
use Session;

class CheckoutController extends Controller
{
    public function index(Request $request){
        $items = Cart::getContent();
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
        $shippingcost = 80;
        $totalprice = $subtotalprice + $shippingcost;
        // dd($totalprice);
        // dd($items);
        return view('user.checkout')->with(compact('items','subtotalprice','totalprice','shippingcost'));
    }

    public function postCheckout(Request $request){
        dd($request->all());
    }
}
