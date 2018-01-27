<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function index(Request $request){
        $productId = $request->productId;
        $productById = Product::find($productId);
        Cart::add([
            'id' => $productById->id,
            'name' =>$productById->productName,
            'price' =>$productById->productPrice,
            'qty' =>$request->productQuantity,
           ]);
        return redirect('/show-cart');
    }
    public function cartView(){
        $cartProducts = Cart::content();
        return view('frontEnd.cart.cartContent',['cartProducts'=>$cartProducts]);
    }
    
    public function updateCart(Request $request){
        Cart::update($request->rowId, $request->productQuantity);
        return redirect('/show-cart')->with('message','Product Quantity Update Successfully');
    }
    
    public function removeCartProduct($rowId){
        Cart::remove($rowId);
        return redirect('/show-cart');
    }
}
