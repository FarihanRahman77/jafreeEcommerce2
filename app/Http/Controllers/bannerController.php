<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner;
use Image;
use DB;

class bannerController extends Controller
{
    public function forntEndBannerView(){
        $banners = banner::orderby('id','DESC')->get();
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
        
        if ($request->hasFile('Bannerimage')) {
            $Bannerimage = $request->file('Bannerimage');
            $name = $Bannerimage->getClientOriginalName();
        
            // Define the upload path and unique image name
            $uploadPath = 'website/images/banners/'; // Path relative to public folder
            $bannerName = time() . '_' . $name; // Unique name for the file
            $imagePath = public_path($uploadPath . $bannerName); // Full path to save the image
        
            // Resize the image and save it
            Image::make($Bannerimage)
                ->resize(1420, 390)
                ->save($imagePath);
        
            // (Optional) Move the original image if you need to keep it
            // $Bannerimage->move(public_path($uploadPath), $bannerName);
        
            // Image is successfully resized and saved
        }
        
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
