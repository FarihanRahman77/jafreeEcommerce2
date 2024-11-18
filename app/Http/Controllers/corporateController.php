<?php
namespace App\Http\Controllers;

//use Session;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Category;
use App\subCategory;
use App\Orders;
use App\OrderDetails;
use App\Users;
use App\Models\ProductHotOffer;
use App\Models\LocationCarringCost;
use App\product;
use App\Models\ShopSetting;
use App\Models\Content;
use App\productspecification;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class corporateController  extends Controller
{
  public function websiteCookie(){
	  //dd(EuCookieConsent::canIUse('essential'));
    return view('frontEnd.home.websiteCookie');
  }
  
}
