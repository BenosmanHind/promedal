<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Carbon\Carbon;
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
        $listing_name = Setting::where('name','listing')->first();


        $listing_date = Setting::where('name','Date')->first();

        $carbonDate = Carbon::createFromFormat('Y-m-d', $listing_date->value);

        // Obtenir le nom du mois en français (mai)
        $monthName = $carbonDate->locale('fr')->monthName;

        // Obtenir l'année (2023)
        $year = $carbonDate->year;

        // Concaténer le résultat
        $listing_date  = ucfirst($monthName) . ' ' . $year;

    
      
        return view('admin.report-listing',compact('categories','disponibilite','IV','listing_name','listing_date'));
    }
}
