<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use App\Coupon;
use Session;

class CartController extends Controller
{
    
    public function addToCart(Request $request){
    	$product = Product::findOrFail($request->id);
    	if ($product->offer_price) {
    		$price = $product->offer_price;
    	}else{
    		$price = $product->sell_price;
    	}

        $img = json_decode($product->product_image)[0];

    	// foreach (json_decode($product->product_image) as $img) {
    	// 	$img = $img;
    	// 	break;
    	// }



    	Cart::add([
    		'id' => $request->id,
            'name' => $product->product_name,
            'price' => $price,
            'qty' => $request->qty,
            'options' => [
                'image' => $img,
                'product_qty' => $product->product_qty,
            ]


    	]);

    	return redirect('/cart');
    }

    public function viewCart(){
    	$cartProducts = Cart::content();
    	
        return view('front-end.cart.cart',[
            'cartProducts' => $cartProducts,
        ]);
    }

    public function deleteCart($id){
        Cart::remove($id);
        return back();
    }

     public function updateCart(Request $request){
        if (Cart::count()==0) {
            return back();
        }
			foreach ($request->qty as $key => $qty) {
     		$rowId = $request->rowId[$key];
     		Cart::update($rowId, $qty);
     	}
 		return back()->with('message', 'Cart Updated');
        
    }

    public function applyCoupon(Request $request){
        $coupons = Coupon::where('code', $request->coupon_code)->first();
        Session::put('coupons',$coupons);
        return back()->with('message', 'Coupon applied');
    }
}
