<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home');
    }


    public function generate()
    {
        $categories = Category::with('childrenCategories')->get();
        return view('admin.generate-report',compact('categories'));
    }

    public function listing(Request $request)
    {
        $categories = Category::whereIn('id',$request->categories)
                                ->orderBy('flag', 'asc')
                                ->with(['childrenCategories' => function ($query) {
                                    $query->orderBy('flag', 'asc');
                                }])
                                ->get();

        $disponibilite = $request->disponibilite;
        $IV = $request->IV;
        return view('admin.report-listing',compact('categories','disponibilite','IV'));
    }
}
