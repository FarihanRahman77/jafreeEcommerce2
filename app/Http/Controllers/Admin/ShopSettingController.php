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
		$setting = ShopSetting::first();
		return view('admin.home.shop-setting.edit-setting',compact('setting'));
	}

	public function addSetting(){
		return view('admin.home.shop-setting.add-setting');
	}

	public function settingSave(Request $request){

//  return $request;
		// $shopLogo = $request->file('shop_logo');
		// $name = $shopLogo->getClientOriginalName();
		// $uploadPath = 'productImage/';
		// $imageUrl = $uploadPath.$name;
		// Image::make($shopLogo)->resize(360,360)->save($imageUrl);

		// $reportWatermark1 = $request->file('report_watermark1');
		// $name2 = $shopLogo->getClientOriginalName();
		// $uploadPath2 = 'productImage/';
		// $imageUrl2 = $uploadPath2.$name2;
		// Image::make($reportWatermark1)->resize(360,360)->save($imageUrl2);

		// $reportWatermark2 = $request->file('report_watermark2');
		// $name3 = $shopLogo->getClientOriginalName();
		// $uploadPath3 = 'productImage/';
		// $imageUrl3 = $uploadPath3.$name3;
		// Image::make($reportWatermark2)->resize(360,360)->save($imageUrl3);

		$setting =  ShopSetting::find('0');
		// $setting->owners_name = $request->owners_name;
		$setting->name = $request->name;
		$setting->currency = $request->currency;
		// $setting->shop_logo = $imageUrl;
		// $setting->motto = $request->motto;
		// $setting->address = $request->address;
		// $setting->phone_no = $request->phone_no;
		// $setting->alt_phone_no = $request->alt_phone_no;
		// $setting->mobile_no = $request->mobile_no;
		// $setting->email = $request->email;
		// $setting->website = $request->website;
		// $setting->fax = $request->fax;
		// $setting->report_header1 = $request->report_header1;
		// $setting->report_header2 = $request->report_header2;
		// $setting->report_watermark1 = $imageUrl2;
		// $setting->report_watermark2 = $imageUrl3;
		// $setting->report_footer1 = $request->report_footer1;
		// $setting->report_footer2 = $request->report_footer2;
		// $setting->licence_key = $request->licence_key;
		// $setting->type = $request->type;
		$setting->status = $request->status;
		// $setting->expire_date = $request->expire_date;
		$setting->save();
		return redirect()->back()->with('message','Setting created successfully');

	}

	public function editSetting($id){

		$setting = ShopSetting::where('id',$id)->first();
		return view('admin.home.shop-setting.edit-setting',compact('setting'));

	}

	public function updateSetting(Request $request){

		$setting = ShopSetting::find($request->id);
		//return $content;
		// $shopLogo = $request->file('shop_logo');
		
		
		// if ($shopLogo) {

		// 	unlink($setting->shop_logo);
			

		// 	// $name = $shopLogo->getClientOriginalName();
		// 	// $uploadPath = 'productImage/';
		// 	// $imageUrl = $uploadPath.$name;
		// 	// Image::make($shopLogo)->resize(360,360)->save($imageUrl);

		// 	// $setting->owners_name = $request->owners_name;
		// 	$setting->shop_name = $request->shop_name;
		// 	$setting->currency = $request->currency;
		// 	// $setting->shop_logo = $imageUrl;
		// 	// $setting->motto = $request->motto;
		// 	// $setting->address = $request->address;
		// 	// $setting->phone_no = $request->phone_no;
		// 	// $setting->alt_phone_no = $request->alt_phone_no;
		// 	// $setting->mobile_no = $request->mobile_no;
		// 	// $setting->email = $request->email;
		// 	// $setting->website = $request->website;
		// 	// $setting->fax = $request->fax;
		// 	$setting->status = $request->status;
		// 	$setting->updated_by = auth()->user()->id;

		// }	

		// else{
			// $setting->owners_name = $request->owners_name;
			$setting->name = $request->name;
			$setting->currency = $request->currency;
			// $setting->motto = $request->motto;
			// $setting->address = $request->address;
			// $setting->phone_no = $request->phone_no;
			// $setting->alt_phone_no = $request->alt_phone_no;
			// $setting->mobile_no = $request->mobile_no;
			// $setting->email = $request->email;
			// $setting->website = $request->website;
			// $setting->fax = $request->fax;
			$setting->status = $request->status;
			$setting->updated_by = auth()->user()->id;


		// }

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
