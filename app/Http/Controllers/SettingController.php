<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index(){
        $setting_one = Setting::where('id',1)->first();
        $setting_two = Setting::where('id',2)->first();
        return view('admin.setting',compact('setting_one','setting_two'));
    }
    public function updateSetting(Request $request , $id_one , $id_two){
        $setting_one = Setting::find($id_one);
        $setting_one->name = $request->name_one;
        $setting_one->value = $request->value_one;
        $setting_one->save();

        $setting_two = Setting::find($id_two);
        $setting_two->name = $request->name_two;
        $setting_two->value = $request->value_two;
        $setting_two->save();
        return redirect()->back();
    }
}
