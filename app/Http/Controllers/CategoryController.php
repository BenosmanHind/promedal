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
            $category->description = $request->description;
            $category->IV = $request->IV;
            $category->flag = $request->flag;
            if($request->image){
                $destination = 'public/images/categories';
                $path = $request->image->store($destination);
                $storageName = basename($path);
                $category->link_image = $storageName;
             }
            $category->save();
        }
        else{
            $children_category = new Childrencategory();
            $children_category->designation = $request->designation;
            $children_category->link_image = $request->image;
            $children_category->description = $request->description;
            $children_category->category_id = $request->category;
            $children_category->IV = $request->IV;
            $children_category->flag = $request->flag;
            if($request->image){
                $destination = 'public/images/categories';
                $path = $request->image->store($destination);
                $storageName = basename($path);
                $children_category->link_image = $storageName;
             }
            $children_category->save();
        }
        return redirect('admin/categories');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.edit-category',compact('category'));
    }

    public function update(Request $request , $id){
        $category = Category::find($id);
        $category->designation = $request->designation;
        $category->description = $request->description;
        $category->IV = $request->IV;
        $category->flag = $request->flag;
        $previousImage = $category->link_image;
        if($request->image){
            $destination = 'public/images/categories';
            $path = $request->image->store($destination);
            $storageName = basename($path);
            $category->link_image = $storageName;
         }
         else {
            $category->link_image = $previousImage; // Réassigne l'ancienne valeur à link_image
        }
        $category->save();
        return redirect('admin/categories');

    }



    public function showChildrenCategory($id){
        $category = Category::find($id);
        return view('admin.show-children-category',compact('category'));
    }

    public function editChildrenCategory($id){
        $category = Childrencategory::find($id);
        return view('admin.edit-children-category',compact('category'));
    }

    public function deleteChildrenCategory($id){

        $category = Childrencategory::find($id);
        $count_products = $category->products->count();
        if($count_products > 0){
            return back()->with('error','Impossible de supprimer cette catégorie car elle contient des produits.!');
        }
        $category->delete();
        return redirect()->back();
    }

    public function updateChildrenCategory($id , Request $request){
        $children_category = Childrencategory::find($id);
        $children_category->designation = $request->designation;
            $children_category->description = $request->description;
            $children_category->IV = $request->IV;
            $children_category->flag = $request->flag;
            if($request->image){
                $destination = 'public/images/categories';
                $path = $request->image->store($destination);
                $storageName = basename($path);
                $children_category->link_image = $storageName;
             }
            $children_category->save();
            return redirect('admin/categories');
    }
}
