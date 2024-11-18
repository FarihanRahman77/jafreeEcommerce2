<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productSpecialOffer;
use App\Models\ProductHotOffer;
use App\Models\Coupon;
use App\Models\User;
use App\product;
use App\productspecification;
use App\masterOffer;
use DB;

class offerController extends Controller
{

    public function masterOfferView()
    {
        $masterOffer = masterOffer::where('status', 'Active')->get();
        return view('admin.home.bannerOffer.masterOfferView', ['masterOffer' => $masterOffer]);
    }

    public function masterOfferAdd()
    {
        return view('admin.home.bannerOffer.createMasterOffer');
    }

    public function masterOfferSave(Request $request)
    {
        //return $Request->all(); /* Data pass check like echo */
        $this->validate($request, [
            'offerName' => 'required',
            /*'startDate' => 'required',
            'endDate' => 'required',*/
            'masterStatus' => 'required',
        ]);

        $pool = "JAMANCART";
        $countPool = strlen($pool) - 1;
        $totalChars = 6;

        $serial = '';
        for ($i = 0; $i < $totalChars; $i++) {
            $currIndex = mt_rand(0, $countPool);
            $currChar = $pool[$currIndex];
            $serial .= $currChar;
        }

        //dd($request->all());
        /* Eloquent ORM process */
        $masterOffer = new masterOffer();
        $masterOffer->master_offerName = $request->offerName;
        $masterOffer->master_offerCode = $serial;
        /*$masterOffer->startDate = $request->startDate;
        $masterOffer->endDate = $request->endDate;*/
        $masterOffer->status = $request->masterStatus;
        $masterOffer->createdBy = auth()->user()->id;
        $masterOffer->deleted = 'No';
        $masterOffer->save();
        return redirect('/master/masterOfferView')->with('message', 'Master Offer save secessfully');
    }
    public function specialOfferProductWeight(Request $request)
    {
        $weights = productspecification::where([['tbl_productsId', '=', $request->id], ['deleted', '=', 'No']])->get();
        return json_encode($weights);
    }
    public function masterOfferDelete(Request $request)
    {
        $masterOffer = masterOffer::find($request->id);
        $masterOffer->status = 'Inactive';
        $masterOffer->deleted = 'Yes';
        $masterOffer->deletedBy = auth()->user()->id;
        $masterOffer->deletedDate = date('Y-m-d H:i:s');
        $masterOffer->save();
        return 'Success';
        //return redirect('/master/masterOfferView/')->with('message', 'Master Offer deleted secessfully');
    }

    public function productsSpecialOfferView()
    {
          $productSpecialOfffer = DB::table('product_special_offers')
            ->join('products', 'products.id', '=', 'product_special_offers.tbl_productId')
            ->join('master_offers', 'master_offers.id', '=', 'product_special_offers.tbl_masterOfferId')
            ->select('product_special_offers.id', 'product_special_offers.status', 'products.productName', 'products.amount', 'products.productImage', 'product_special_offers.tbl_productId', 'master_offers.master_offerName', 'product_special_offers.offerPrice', 'product_special_offers.startDate', 'product_special_offers.endDate', 'product_special_offers.created_at')
            // ->where('product_special_offers.status','=','Active')
            ->where('master_offers.master_offerName', '=', 'Special Offer')
            ->get();

        //$productSpecialOfffer = productSpecialOffer::where('status', 'Active')->get();
        return view('admin.home.bannerOffer.productSpecialOfferView', ['productSpecialOfffer' => $productSpecialOfffer]);
    }

    public function productsSpecialOfferView2($status)
    {
    $productSpecialOfffer = DB::table('product_special_offers')
            ->join('products', 'products.id', '=', 'product_special_offers.tbl_productId')
            ->join('master_offers', 'master_offers.id', '=', 'product_special_offers.tbl_masterOfferId')
            ->join('productspecifications', 'productspecifications.id', '=', 'product_special_offers.product_spec_id')
            ->select('product_special_offers.id', 'product_special_offers.status', 'products.productName', 'productspecifications.specificationName', 'products.amount', 'products.productImage', 'product_special_offers.tbl_productId', 'master_offers.master_offerName', 'product_special_offers.offerPrice', 'product_special_offers.startDate', 'product_special_offers.endDate', 'product_special_offers.created_at')
            ->where('product_special_offers.status', '=', 'Active')
            //->where('master_offers.master_offerName','=','Special Offer')
            ->where('product_special_offers.status', '=', $status)
            ->get();
        //dd($productSpecialOfffer);
        //$productSpecialOfffer = productSpecialOffer::where('status', 'Active')->get();
        return view('admin.home.bannerOffer.productSpecialOfferView2', ['productSpecialOfffer' => $productSpecialOfffer]);
    }

    public function productsSpecialOfferView3(Request $request)
    {

        //return $request->all();
        if ($request->status != "All") {
            $productSpecialOfffer = DB::table('product_special_offers')
                ->join('products', 'products.id', '=', 'product_special_offers.tbl_productId')
                ->join('master_offers', 'master_offers.id', '=', 'product_special_offers.tbl_masterOfferId')
                ->join('productspecifications', 'productspecifications.id', '=', 'product_special_offers.product_spec_id')
                ->select('product_special_offers.id', 'product_special_offers.status', 'products.productName', 'productspecifications.specificationName', 'products.amount', 'products.productImage', 'product_special_offers.tbl_productId', 'master_offers.master_offerName', 'product_special_offers.offerPrice', 'product_special_offers.startDate', 'product_special_offers.endDate', 'product_special_offers.created_at')
               
                ->select('product_special_offers.id', 'product_special_offers.status', 'products.productName', 'products.amount', 'products.productImage', 'product_special_offers.tbl_productId', 'master_offers.master_offerName', 'product_special_offers.offerPrice', 'product_special_offers.startDate', 'product_special_offers.endDate', 'product_special_offers.created_at')
                // ->where('product_special_offers.status','=','Active')
                ->where('master_offers.master_offerName', '=', 'Special Offer')
                ->where('product_special_offers.status', '=', $request->status)
                ->get();
        } 
        else {
            $productSpecialOfffer = DB::table('product_special_offers')
                ->join('products', 'products.id', '=', 'product_special_offers.tbl_productId')
                ->join('master_offers', 'master_offers.id', '=', 'product_special_offers.tbl_masterOfferId')
                  ->join('productspecifications', 'productspecifications.id', '=', 'product_special_offers.product_spec_id')
            ->select('product_special_offers.id', 'product_special_offers.status', 'products.productName', 'productspecifications.specificationName', 'products.amount', 'products.productImage', 'product_special_offers.tbl_productId', 'master_offers.master_offerName', 'product_special_offers.offerPrice', 'product_special_offers.startDate', 'product_special_offers.endDate', 'product_special_offers.created_at')
           
                ->select('product_special_offers.id', 'product_special_offers.status', 'products.productName', 'products.amount', 'products.productImage', 'product_special_offers.tbl_productId', 'master_offers.master_offerName', 'product_special_offers.offerPrice', 'product_special_offers.startDate', 'product_special_offers.endDate', 'product_special_offers.created_at')
                // ->where('product_special_offers.status','=','Active')
                ->where('master_offers.master_offerName', '=', 'Special Offer')
                ->get();
        }


        //$productSpecialOfffer = productSpecialOffer::where('status', 'Active')->get();
        return view('admin.home.bannerOffer.productSpecialOfferView2', ['productSpecialOfffer' => $productSpecialOfffer]);
    }

    public function productSpecialOfferAdd()
    {
        $masterOffer = masterOffer::where('status', 'Active')->get();
        $products = product::where([['productStatus', '=', 'Active'], ['deleted', '=', 'No']])->get();
        return view('admin.home.bannerOffer.createSpecialProductOffer', ['products' => $products, 'masterOffer' => $masterOffer]);
    }

    public function productSpecialOfferSave(Request $request)
    {
        //return $Request->all(); /* Data pass check like echo */
        $this->validate($request, [
            'productName' => 'required',
            'specialOfferName' => 'required',
            'offerPrice' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'offerStatus' => 'required',
        ]);

        //dd($request->all());
        /* Eloquent ORM process */
        //$product = product::find($request->productName);


        //if ($product->in_offer == "no") {
        $masterOffer = new productSpecialOffer();
        $masterOffer->tbl_productId = $request->productName;
        $masterOffer->specialOfferName = $request->specialOfferName;
        $masterOffer->tbl_masterOfferId = $request->masterOfferName;
        $masterOffer->product_spec_id = $request->productWeight;
        $masterOffer->minimum_quantity = $request->minPurchaseQty;
        $masterOffer->offerPrice = $request->offerPrice;
        $masterOffer->startDate = $request->startDate;
        $masterOffer->endDate = $request->endDate;
        $masterOffer->status = $request->offerStatus;
        $masterOffer->createdBy = auth()->user()->id;
        $masterOffer->deleted = 'No';
        $masterOffer->save();

        //$product->in_offer = "yes";
        //$product->save();

        return redirect('/products/specialOfferView/Active')->with('message', 'Product Special Offer save secessfully');
        //}

        // else{
        //    return redirect('/products/specialOfferView/Active')->with('message', 'Product is already in an offer');

        //}


    }
    public function productSpecialOfferDelete($id)
    {
        $masterOffer = productSpecialOffer::find($id);
        $masterOffer->status = 'Inactive';
        $masterOffer->deleted = 'Yes';
        $masterOffer->deletedBy = auth()->user()->id;
        $masterOffer->deletedDate = date('Y-m-d H:i:s');
        $masterOffer->save();
        return redirect('/products/specialOfferView/Active')->with('message', 'Product Special Offer deleted secessfully');
    }


    //Hot Offer
    public function productsHotOfferView()
    {

        $productHotOfffer = DB::table('product_hot_offers')
            ->join('products', 'products.id', '=', 'product_hot_offers.tbl_productId')
            ->join('master_offers', 'master_offers.id', '=', 'product_hot_offers.tbl_masterOfferId')
            ->select('product_hot_offers.id', 'product_hot_offers.status', 'products.productName', 'products.amount', 'products.productImage', 'product_hot_offers.tbl_productId', 'master_offers.master_offerName', 'product_hot_offers.offerPrice', 'product_hot_offers.startDate', 'product_hot_offers.endDate', 'product_hot_offers.created_at')
            // ->where('product_hot_offers.status','=','Active')
            ->where('master_offers.master_offerName', '=', 'Hot Offer')
            ->get();

        //return $productHotOfffer;

        //$productSpecialOfffer = productSpecialOffer::where('status', 'Active')->get();
        return view('admin.home.bannerOffer.productHotOfferView', ['productHotOfffer' => $productHotOfffer]);
    }

    public function productsHotOfferView2($status)
    {

        $productHotOfffer = DB::table('product_hot_offers')
            ->join('products', 'products.id', '=', 'product_hot_offers.tbl_productId')
            ->join('master_offers', 'master_offers.id', '=', 'product_hot_offers.tbl_masterOfferId')
            ->select('product_hot_offers.id', 'product_hot_offers.status', 'products.productName', 'products.amount', 'products.productImage', 'product_hot_offers.tbl_productId', 'master_offers.master_offerName', 'product_hot_offers.offerPrice', 'product_hot_offers.startDate', 'product_hot_offers.endDate', 'product_hot_offers.created_at')
            // ->where('product_hot_offers.status','=','Active')
            ->where('master_offers.master_offerName', '=', 'Hot Offer')
            ->where('product_hot_offers.status', '=', $status)
            ->get();

        //return $productHotOfffer;

        //$productSpecialOfffer = productSpecialOffer::where('status', 'Active')->get();
        return view('admin.home.bannerOffer.productHotOfferView2', ['productHotOfffer' => $productHotOfffer]);
    }

    public function productsHotOfferView3(Request $request)
    {

        if ($request->status != "All") {
            $productHotOfffer = DB::table('product_hot_offers')
                ->join('products', 'products.id', '=', 'product_hot_offers.tbl_productId')
                ->join('master_offers', 'master_offers.id', '=', 'product_hot_offers.tbl_masterOfferId')
                ->select('product_hot_offers.id', 'product_hot_offers.status', 'products.productName', 'products.amount', 'products.productImage', 'product_hot_offers.tbl_productId', 'master_offers.master_offerName', 'product_hot_offers.offerPrice', 'product_hot_offers.startDate', 'product_hot_offers.endDate', 'product_hot_offers.created_at')
                // ->where('product_hot_offers.status','=','Active')
                ->where('master_offers.master_offerName', '=', 'Hot Offer')
                ->where('product_hot_offers.status', '=', $request->status)
                ->get();
        } else {
            $productHotOfffer = DB::table('product_hot_offers')
                ->join('products', 'products.id', '=', 'product_hot_offers.tbl_productId')
                ->join('master_offers', 'master_offers.id', '=', 'product_hot_offers.tbl_masterOfferId')
                ->select('product_hot_offers.id', 'product_hot_offers.status', 'products.productName', 'products.amount', 'products.productImage', 'product_hot_offers.tbl_productId', 'master_offers.master_offerName', 'product_hot_offers.offerPrice', 'product_hot_offers.startDate', 'product_hot_offers.endDate', 'product_hot_offers.created_at')
                // ->where('product_hot_offers.status','=','Active')
                ->where('master_offers.master_offerName', '=', 'Hot Offer')
                ->get();
        }


        //return $productHotOfffer;

        //$productSpecialOfffer = productSpecialOffer::where('status', 'Active')->get();
        return view('admin.home.bannerOffer.productHotOfferView2', ['productHotOfffer' => $productHotOfffer]);
    }

    public function productHotOfferAdd()
    {
        $masterOffer = masterOffer::where('status', 'Active')->get();
        $products = product::where('productStatus', 'Active')->get();
        return view('admin.home.bannerOffer.createHotProductOffer', ['products' => $products, 'masterOffer' => $masterOffer]);
    }

    public function productHotOfferSave(Request $request)
    {
        //return $Request->all(); /* Data pass check like echo */
        $this->validate($request, [
            'productName' => 'required',
            'specialOfferName' => 'required',
            'offerPrice' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'offerStatus' => 'required',
        ]);

        //dd($request->all());
        /* Eloquent ORM process */

        $product = product::find($request->productName);

        if ($product->in_offer == "no") {
            $masterOffer = new ProductHotOffer();
            $masterOffer->tbl_productId = $request->productName;
            $masterOffer->specialOfferName = $request->specialOfferName;
            $masterOffer->tbl_masterOfferId = $request->masterOfferName;
            $masterOffer->offerPrice = $request->offerPrice;
            $masterOffer->startDate = $request->startDate;
            $masterOffer->endDate = $request->endDate;
            $masterOffer->status = $request->offerStatus;
            $masterOffer->createdBy = auth()->user()->id;
            $masterOffer->deleted = 'No';
            $masterOffer->save();

            $product->in_offer = "yes";
            $product->save();

            return redirect('/products/hotOfferView/Active')->with('message', 'Product Hot Offer save secessfully');
        } else {
            return redirect('/products/hotOfferView/Active')->with('message', 'Product is already in an offer');
        }
    }
    public function productHotOfferDelete($id)
    {
        $masterOffer = ProductHotOffer::find($id);
        $masterOffer->status = 'Inactive';
        $masterOffer->deleted = 'Yes';
        $masterOffer->deletedBy = auth()->user()->id;
        $masterOffer->deletedDate = date('Y-m-d H:i:s');
        $masterOffer->save();
        return redirect('/products/hotOfferView/Active')->with('message', 'Product Hot Offer deleted secessfully');
    }

    //end Hot Offer


    public function productsSpecialDealsView()
    {
        $productSpecialDeals = DB::table('product_special_offers')
            ->join('products', 'products.id', '=', 'product_special_offers.tbl_productId')
            ->join('master_offers', 'master_offers.id', '=', 'product_special_offers.tbl_masterOfferId')
            ->select('product_special_offers.id', 'product_special_offers.status', 'products.productName', 'products.amount', 'products.productImage', 'product_special_offers.tbl_productId', 'master_offers.master_offerName', 'product_special_offers.offerPrice', 'product_special_offers.startDate', 'product_special_offers.endDate', 'product_special_offers.created_at')
            ->where('product_special_offers.status', '=', 'Active')
            ->where('master_offers.master_offerName', '=', 'Deals Offer')
            ->get();

        //$productSpecialOfffer = productSpecialOffer::where('status', 'Active')->get();
        return view('admin.home.bannerOffer.productSpecialDealsView', ['productSpecialOfffer' => $productSpecialDeals]);
    }

    public function productSpecialDealsAdd()
    {
        $masterOffer = masterOffer::where('status', 'Active')->get();
        $products = product::where('productStatus', 'Active')->get();
        return view('admin.home.bannerOffer.createSpecialProductDeals', ['products' => $products, 'masterOffer' => $masterOffer]);
    }

    public function productSpecialDealsSave(Request $request)
    {
        //return $Request->all(); /* Data pass check like echo */
        /* $this->validate($request, [
            'productName' => 'required',
            'minimumPrice' => 'required',
            'dealsPrice' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'offerStatus' => 'required',
        ]);*/

        //dd($request->all());
        /* Eloquent ORM process */
        $masterOffer = new productSpecialOffer();
        $masterOffer->tbl_productId = $request->productName;
        $masterOffer->specialOfferName = 'Deals Offer';
        $masterOffer->tbl_masterOfferId = $request->masterOfferName;
        $masterOffer->minimumDalsPrice = $request->minimumPrice;
        $masterOffer->offerPrice = $request->dealsPrice;
        $masterOffer->startDate = $request->startDate;
        $masterOffer->endDate = $request->endDate;
        $masterOffer->status = $request->dealsStatus;
        $masterOffer->createdBy = auth()->user()->id;
        $masterOffer->deleted = 'No';
        $masterOffer->save();

        return redirect('/products/specialDealsView')->with('message', 'Product Special Deals Save Secessfully');
    }
    public function productSpecialDealsDelete($id)
    {
        $masterOffer = productSpecialOffer::find($id);
        $masterOffer->status = 'Inactive';
        $masterOffer->deleted = 'Yes';
        $masterOffer->deletedBy = auth()->user()->id;
        $masterOffer->deletedDate = date('Y-m-d H:i:s');
        $masterOffer->save();
        return redirect('/products/specialDealsView')->with('message', 'Product Special Deals Deleted Secessfully');
    }

    public function couponView($type)
    {
        $coupons = DB::table('coupons')
            ->leftJoin('users', 'coupons.users_id', '=', 'users.id')
            ->where([['deleted', '=', 'No'], ['type', '=', $type]])
            ->select('coupons.*', 'users.name')
            ->get();
        /*$coupons = Coupon::where([['deleted','=','No'],['type','=',$type]])->get();*/
        return view('admin.home.bannerOffer.couponView', ['type' => $type, 'coupons' => $coupons]);
    }
    public function couponAdd($type)
    {
        $users = User::where([['status', '=', 'active']])->get();
        return view('admin.home.bannerOffer.createCoupon', ['users' => $users, 'type' => $type]);
    }
    public function generateCouponCode(Request $request)
    {
        $pool = "JAMAN&123456789@Alitechnology!";
        $countPool = strlen($pool) - 1;
        $totalChars = 6;
        $serial = '';
        $couponCode = '';
        while (1) {
            $serial = '';
            for ($i = 0; $i < $totalChars; $i++) {
                $currIndex = mt_rand(0, $countPool);
                $currChar = $pool[$currIndex];
                $serial .= $currChar;
            }
            $couponCode = "";
            if ($request->type == 'Coupon') {
                $couponCode = 'JC';
            } else if ($request->type == 'Voucher') {
                $couponCode = 'JV';
            }
            $couponCode .= $serial;

            $coupons = coupon::where('code', $couponCode)->get();
            $i = 0;
            foreach ($coupons as $coupon) {
                $i++;
            }
            if ($i == 0) break;
        }
        return $couponCode;
    }
    public function couponSave(Request $request)
    {
        $type = $request->type;
        $couponType = $request->coupon_type;
        $coupon = new Coupon();
        $coupon->code = $request->couponCode;
        if ($type != 'Voucher') {
            if ($request->users_id != "") {
                $coupon->users_id = $request->users_id;
            }
            $coupon->minimum_amount = $request->minimum_amount;
        }
        $coupon->amount = $request->amount;
        $coupon->claimed = 0;
        $coupon->status = $request->status;
        $coupon->type = $type;
        $coupon->coupon_type = $couponType;
        if ($couponType == 'dateRange') {
            $coupon->start_date = $request->start_date;
            $coupon->end_date = $request->end_date;
        } else if ($couponType == 'times') {
            $coupon->coupon_time_count = $request->coupon_time_count;
            $coupon->used_time_count = 0;
        }
        $coupon->createdBy = auth()->user()->id;
        $coupon->deleted = 'No';
        $coupon->save();

        return redirect('/coupon/view/' . $type)->with('message', 'Product Special Deals Save Secessfully');
    }
    public function viewBestDeals()
    {
        $deals = DB::table('products')
            ->where([['deleted', '=', 'No'], ['in_offer', '=', 'yes']])
            ->select('products.*')
            ->get();
        return view('admin.home.bannerOffer.bestDealsView', ['deals' => $deals]);
    }
}
