<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }

    public function storeBrand(Request $request){
        $this->validate($request, [
            'brand_name'  => 'required|min:3|max:50|string'
        ]);
        $brandImage = $request->file('brand_img');
        if ($brandImage){
            $ext = '.'.$request->brand_img->getClientOriginalExtension();
            $imageName = str_replace($request->brand_img->getClientOriginalName(), date('Ymdhis').$ext, $request->brand_img->getClientOriginalName());
            $directory = 'public/image/brand-image/';
            $imageUrl = $directory.$imageName;
            $brandImage->move($directory, $imageName);

            $brands = new Brand();
            $brands->brand_name = $request->brand_name;
            $brands->brand_desc = $request->brand_desc;
            $brands->brand_img = $imageUrl;
            $brands->save();

            return back()->with('message', 'You have successfully created a Brand!');
        }

        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->brand_desc = $request->brand_desc;
        $brands->save();

        return back()->with('message', 'You have successfully created a Brand!');


    }

    public function manageBrand(){
        $brands = Brand::all();
        return view('admin.brand.manage-brand', [
            'brands' => $brands
        ]);
    }
}
