<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner;
use Image;
use DB;

class bannerController extends Controller
{
    public function forntEndBannerView(){
        $banners = banner::all();
        return view('admin.home.bannerOffer.frontEndBannerView',['banners'=>$banners]);
    }
    public function forntEndBannerAdd(){
        $banners = banner::all();
        return view('admin.home.bannerOffer.createfrontEndBanner',['banners'=>$banners]);
    }
    public function forntEndBannerSave(Request $request){

        $this->validate($request,[
            'Bannerimage'=>'required',
            'Bannersorting'=>'required',
            'Bannerstatus'=>'required',
        ]);
        
        $Bannerimage = $request->file('Bannerimage');
        $name = $Bannerimage->getClientOriginalName();
        $uploadPath = 'website/images/banners/';
		$bannerName = time().$name;
        Image::make($Bannerimage)->resize(1110,480)->save($bannerName);
        $Bannerimage->move($uploadPath, $bannerName);
        
        /*Eloquent ORM process*/
        $banner= new banner();
        $banner->bannerImage = $bannerName;
        $banner->sorting =$request->Bannersorting;
        $banner->carousal_caption_offer =$request->carousalCaptionOffer;
        $banner->carousal_caption_description =$request->carousalCaptionOfferDescription;
        $banner->status = 'Active';
        $banner->createdBy = auth()->user()->id;
        $banner->deleted ='No';
        $banner->save();
        return redirect('/banner/frontEndView')->with('message','Banner'
            . ' save secessfully');
    }
    public function forntEndBannerDelete($id) {
        $products = banner:: find($id);
        $products->status = 'Inactive';
        $products->deleted = 'Yes';
        $products->deletedBy = auth()->user()->id;
        $products->deletedDate = date('Y-m-d H:i:s');
        $products->save();
        return redirect('/banner/frontEndView/')->with('message', 'Banner In-Active secessfully');
    }

    public function changeStatus($id){
        $products = banner:: find($id);
        if ($products->status=="Active") {
                    # code...
            $products->status = "Inactive";
            $products->save();

        }
        else{
            $products->status = "Active";
            $products->save();

        }

        return redirect()->back()->with('message','Banner status changed successfully');

    }
    
    public function multiiForm(){
        return view('admin.home.multiiForm');
    }
    public function advanceForm(){
        return view('admin.home.advanceForm');
    }
}
