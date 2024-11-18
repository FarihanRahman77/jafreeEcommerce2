<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopSetting;
use Image;

class ShopSettingController extends Controller
{
    //
	public function settingList(){
		$settings = ShopSetting::orderby('id','desc')->where('deleted','No')->get();
		return view('admin.home.shop-setting.setting-list',compact('settings'));
		return view('admin.home.order.order-invoice',compact('settings'));
	}

	public function addSetting(){
		return view('admin.home.shop-setting.add-setting');
	}

	public function settingSave(Request $request){

		$setting =  ShopSetting::find('0');
		$setting->name = $request->name;
		$setting->currency = $request->currency;
		$setting->erp_baseurl = $request->erp_baseurl;
		$setting->status = $request->status;
		$setting->save();
		return redirect()->back()->with('message','Setting created successfully');

	}

	public function editSetting(){

		$setting = ShopSetting::first();
		return view('admin.home.shop-setting.edit-setting',compact('setting'));

	}

	public function updateSetting(Request $request){
			$setting = ShopSetting::first();

			$setting->website_name = $request->name;
			$setting->currency = $request->currency;
			$setting->erp_baseurl = $request->erp_baseurl;

			$setting->updated_by = auth()->user()->id;

			$setting->save();

		return redirect()->back()->with('message','Setting Updated Successfully');

	}

	public function deleteSetting($id){
		$setting = ShopSetting::find($id);
		$setting->deleted = "Yes";
		$setting->deleted_by = auth()->user()->id;
		$setting->save();
		return redirect()->back()->with('message','Setting Deleted Successfully');
	}
}
