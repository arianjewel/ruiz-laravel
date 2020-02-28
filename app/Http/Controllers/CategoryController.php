<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.category.add-category', [
            'categories' => $categories
        ]);
    }

    public function storeCategory(Request $request){
        $this->validate($request, [
            'cat_name'  => 'required|min:3|max:50|string'
        ]);

        $data = $request->except('_token');

        Category::create($data);

        return back()->with('message', 'You have successfully created a Category!');
    }

    public function manageCategory(){
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.category.manage-category', [
            'categories' => $categories
        ]);
    }

    public function updateCategory(Request $request){
        $this->validate($request, [
            'cat_name'  => 'required|min:3|max:50|string'
        ]);

        $data = $request->except(['_token']);

        Category::find($request->id)->update($data);

        return redirect('admin/category/')->with('message','Category updated Successfully');

    }

    public function unpublishedCategory($id){
        $category = Category::find($id);
        if ($category->parent_id == null){
            $catWithSubCat = Category::with('children')->find($id);
            if ($catWithSubCat->children){
                foreach ($catWithSubCat->children as $children){
                    $children->cat_status = 0;
                    $children->save();
                }
            }
            $catWithSubCat->cat_status = 0;
            $catWithSubCat->save();
            return back()->with('message', 'Category Unpublished Successfully');
        }
        $category->cat_status = 0;
        $category->save();
        return back()->with('message', 'Category Unpublished Successfully');
    }

    public function publishedCategory($id){
        $category = Category::find($id);
        if ($category->parent_id == null){
            $catWithSubCat = Category::with('children')->find($id);
            if ($catWithSubCat->children){
                foreach ($catWithSubCat->children as $children){
                    $children->cat_status = 1;
                    $children->save();
                }
            }
            $catWithSubCat->cat_status = 1;
            $catWithSubCat->save();
            return back()->with('message', 'Category Published Successfully');
        }
        $category->cat_status = 1;
        $category->save();
        return back()->with('message', 'Category Published Successfully');
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        if ($category->parent_id == null){
            $catWithSubCat = Category::with('children')->find($id);
            if ($catWithSubCat->children){
                foreach ($catWithSubCat->children as $children){
                    $children->cat_status = 1;
                    $children->delete();
                }
            }
            $catWithSubCat->cat_status = 1;
            $catWithSubCat->delete();
            return back()->with('message', 'Category Deleted Successfully');
        }
        $category->cat_status = 1;
        $category->delete();
        return back()->with('message', 'Category Deleted Successfully');
    }
}
