<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::orderBy('created_at','desc')->get();
        return view('admin.products',compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.add-product',compact('categories'));
    }
    public function store(Request $request){
        $product = new Product();
        $product->designation = $request->designation;
        $product->category_id = $request->category;
        $product->pu = $request->pu;
        $product->code = $request->code;
        $product->conditionnement = $request->conditionnement;
        $product->IV = $request->IV;
        $product->slug = str::slug($request->designation);
        $product->link_image = $request->image;
        $product->save();
        return redirect('admin/products');
    }
}
