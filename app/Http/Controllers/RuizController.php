<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class RuizController extends Controller
{
    public function index(){
        $featuredProducts = Product::skip(1)->take(8)->get();
        $newProducts = Product::orderBy('id','DESC')->take(8)->get();
        return view('front-end.home.home',[
            'featuredProducts' => $featuredProducts,
            'newProducts'=> $newProducts
        ]);
    }

    public function loginRegister(){
        return view('front-end.auth.login-register');
    }

    //for shop & product of front-end

    public function shop(){
        $products = Product::with('brands','categories')->get();
//        return $products;
        return view('front-end.shop.shop', [
            'products' => $products
        ]);
    }

    public function catProduct($id){
//        $catProducts = Category::find($id)->products()->get();
        $catProducts = Category::with('products')->find($id);
//        return $catProducts;
        return view('front-end.shop.cat-products', [
            'catProducts' => $catProducts
        ]);
    }

    public function productDetails($id){
        $products = Product::with('categories')->find($id);
        $cat = json_decode($products->categories);
        $cat_id = $cat[0]->id;
        $relatedProducts = Category::with('products')->find($cat_id);


       return view('front-end.shop.product-details',[
           'products' => $products,
           'relatedProducts' => $relatedProducts
       ]);
    }

    public function searchProducts(Request $request){

  
        $products = Product::query()
        ->where('product_name', 'LIKE', "%{$request->product}%")
        ->get();
        
        return view('front-end.shop.search-products', ['products' => $products]);
    //     $tickets = Ticket::whereHas('user', function ($query) use ($request) {
    //     $query->where('name', 'like', "%{$request->name}%");
    // });

    }


    public function myAccount(){
        return view('front-end.auth.my-account');
    }


    public function blogShow(){
        return view('front-end.blog.blog');
    }

}
