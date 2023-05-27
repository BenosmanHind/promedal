<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Childrencategory;
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
        $product->pu = $request->pu;
        $product->code = $request->code;
        $product->conditionnement = $request->conditionnement;
        $product->IV = $request->IV;

        $product->disponibilite = $request->disponibilite;
        $product->slug = str::slug($request->designation);

        if($request->image){
            $destination = 'public/images/products';
            $path = $request->image->store($destination);
            $storageName = basename($path);
            $product->link_image = $storageName;
         }

        $selectedCategoryId = $request->input('category');
        $category = Category::find($selectedCategoryId);

        if($category){
            $category->products()->save($product);
        }
        else{
            $childCategoryId = $this->extractChildCategoryId($selectedCategoryId);
            $children_category = Childrencategory::find($childCategoryId);
            $children_category->products()->save($product);
        }

        return redirect('admin/products');
    }

    private function extractChildCategoryId($selectedCategoryId)
    {
        // Vérifier si l'ID sélectionné contient un préfixe pour les sous-catégories
        if (strpos($selectedCategoryId, 'c_') === 0) {
            // Extraire et retourner l'ID de la sous-catégorie
            return substr($selectedCategoryId, 2);
        }

        // Retourner null si aucun ID de sous-catégorie n'est extrait
        return null;
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.edit-product',compact('product','categories'));
    }

    public function update(Request $request , $id){
     $product = Product::find($id);
     $product->designation = $request->designation;
     $product->pu = $request->pu;
     $product->code = $request->code;
     $product->conditionnement = $request->conditionnement;
     $product->IV = $request->IV;
     $product->slug = str::slug($request->designation);
     $product->disponibilite = $request->disponibilite;
     if($request->image){
         $destination = 'public/images/products';
         $path = $request->image->store($destination);
         $storageName = basename($path);
         $product->link_image = $storageName;
      }

     $selectedCategoryId = $request->input('category');
     $category = Category::find($selectedCategoryId);

     if($category){
         $category->products()->save($product);
     }
     else{
         $childCategoryId = $this->extractChildCategoryId($selectedCategoryId);
         $children_category = Childrencategory::find($childCategoryId);
         $children_category->products()->save($product);
     }

     return redirect('admin/products');
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/products');

    }
}
