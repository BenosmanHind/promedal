<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index(){
        $setting = Setting::first();
        return view('admin.setting',compact('setting'));
    }
    public function update(Request $request , $id){
        $setting = Setting::find($id);
        $setting->name = $request->name;
        $setting->value = $request->value;
        $setting->save();
        return redirect()->back();
    }
}
