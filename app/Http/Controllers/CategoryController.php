<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Childrencategory;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::get();
        return view('admin.category',compact('categories'));
    }

    public function store(Request $request){
        if($request->category == 0){
            $category = new Category();
            $category->designation = $request->designation;
            $category->link_image = $request->image;
            $category->description = $request->description;
            $category->IV = $request->IV;
            $category->save();
        }
        else{
            $children_category = new Childrencategory();
            $children_category->designation = $request->designation;
            $children_category->link_image = $request->image;
            $children_category->description = $request->description;
            $children_category->category_id = $request->category;
            $children_category->IV = $request->IV;
            $children_category->save();
        }
        return redirect('admin/categories');
    }
}
