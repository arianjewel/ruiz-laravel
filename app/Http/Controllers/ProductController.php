<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $brands = Brand::where('brand_status',1)->get();
        return view('admin.product.add-product',[
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function storeProduct(Request $request){
        $this->validate($request, [
            'product_name'  => 'required|min:3|max:50|string',
            'cat_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'product_size' => 'required|alpha',
            'product_qty' => 'required|numeric',
            'buy_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'product_image' => 'required',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        foreach($request->file('product_image') as $image){
            $ext = '.'.$image->getClientOriginalExtension();
            $imageName = str_replace($ext, date('Ymdhis').$ext, $image->getClientOriginalName());
            $directory = 'public/image/product-image/';
            $imageUrl = $directory.$imageName;
            $image->move($directory, $imageName);
            $data[] = $imageUrl;
        }

        $products = new Product();
        $products->product_name = $request->product_name;
        $products->brand_id = $request->brand_id;
        $products->product_size = $request->product_size;
        $products->product_qty = $request->product_qty;
        $products->buy_price = $request->buy_price;
        $products->sell_price = $request->sell_price;
        if($request->offer){
            $products->offer_price = $request->sell_price - $request->offer;
        }
        $products->product_desc = $request->product_desc;
        $products->product_image = json_encode($data);
        $products->save();

        $category = Category::find($request->cat_id);
        $category->products()->attach($products);

        return back()->with('message', 'You have successfully created a Product!');
    }

    public function manageProduct(){
        $products = Product::with('brands','categories')->get();
        return view('admin.product.manage-product', [
            'products' => $products
            ]);
    }

    public function deleteProduct($id){
        $products = Product::findOrFail($id);
        $products->delete();

        return back()->with('message', 'Product Deleted successfully!');
    }


    public function unpublishedProduct($id){
        $products = Product::findOrFail($id);
        $products->product_status = 0;
        $products->save();

       return back()->with('message', 'Product Published!'); 
    }

    public function publishedProduct($id){
        $products = Product::findOrFail($id);
        $products->product_status = 1;
        $products->save();

       return back()->with('message', 'Product Unpublished!'); 
    }

    public function updateProduct(Request $request){
        $products = Product::findOrFail($request->id);
        $products->product_name = $request->product_name;
        $products->product_qty = $request->product_qty;
        $products->buy_price = $request->buy_price;
        $products->sell_price = $request->sell_price;
        $products->offer_price = $request->sell_price - $request->offer;
        $products->product_desc = $request->product_desc;
        $products->save();

        return back()->with('message', 'Product Updated Successfully!');
    }
}
