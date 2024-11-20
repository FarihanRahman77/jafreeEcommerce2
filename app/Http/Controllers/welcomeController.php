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

class welcomeController  extends Controller
{
  public function Index()
  {
    return view('website.master');
  }
  // public function Index(){
  //   //dd(EuCookieConsent::canIUse('essential'));
  //   return view('frontEnd.home.homeContent');
  // }
  public function aboutUs()
  {
    return view('frontEnd.home.aboutUs');
  }
  public function termsCondition()
  {
    return view('frontEnd.home.termsCondition');
  }
  public function campaign()
  {
    return view('frontEnd.home.campaign');
  }
  public function faqs()
  {
    return view('frontEnd.home.faqs');
  }
  public function privacy()
  {
    return view('frontEnd.home.privacy');
  }
  public function productDetails($id)
  {
    $product = DB::table('products')
      //->leftJoin('product_special_offers', 'product_special_offers.tbl_productId', '=', 'products.id')
      //->leftJoin('product_hot_offers', 'product_hot_offers.tbl_productId', '=', 'products.id')
      ->where([['products.id', '=', $id], ['products.deleted', '=', 'no']])
      ->select('products.*'/*,'product_special_offers.offerPrice','product_hot_offers.offerPrice'*/)
      ->first();
    $specifications = DB::table('productspecifications')
      ->leftJoin('product_special_offers', function ($join) {
        $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
        $join->on('product_special_offers.startDate', '<=', DB::raw("'" . date('Y-m-d') . "'"));
        $join->on('product_special_offers.endDate', '>=', DB::raw("'" . date('Y-m-d') . "'"));
      })
      //->whereBetween($today, ['product_special_offers.startDate', 'product_special_offers.endDate'])
      //->whereRaw('? between product_special_offers.startDate and product_special_offers.endDate', [date('Y-m-d')])
      ->where('tbl_productsId', '=', $product->id)
      ->where('productspecifications.deleted', '=', 'No')
      ->select('productspecifications.*', 'product_special_offers.offerPrice')
      ->orderBy('productspecifications.specPrice')
      ->get();
    //dd($specifications);
    $product->spec = $specifications;
    //$product = product::find($id);
    /*$topProducts = product::where('is_top','on')->get();
    foreach ($topProducts as $topProduct)
	{
		$specifications = productspecification::where('tbl_productsId','=',$topProduct->id)
					->where('deleted','=','No')
					->select('*')
					->get();
		$topProduct->spec = $specifications;
	}*/
    $currencyData = ShopSetting::where('id', 1)->first();
    $currency = $currencyData->currency;
    //return view('frontEnd.home.product-details',compact('product','topProducts','currency'));
    return view('frontEnd.home.product-details', compact('product', 'currency'));
  }

  public function fetch(Request $request)
  {
    if ($request->get('query')) {
      $query = $request->get('query');
      $data = DB::table('products')
        ->where('productName', 'LIKE', "%{$query}%")
        ->where('deleted', '=', 'no')
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach ($data as $row) {
        $output .= '
     <li><a href="#">' . $row->productName . '</a></li>
     ';
      }
      $output .= '</ul>';
      echo $output;
    }
  }

  public function searchedProducts(Request $request)
  {
    $query = $request->searchProduct;
    if ($query != "") {
      return redirect(url('search/' . $query));
    } else {
      return redirect(route('/'));
    }
  }
  public function searchGetProducts($request)
  {
    $query = $request;
    if ($query != "") {
      $products = DB::table('products')
        ->leftjoin('categories', 'categories.id', '=', 'products.tbl_CategoryID')
        ->leftjoin('sub_categories', 'sub_categories.id', '=', 'products.tbl_subCategoryID')
        //->leftJoin('product_special_offers', 'product_special_offers.tbl_productId', '=', 'products.id')
        ->where([['products.deleted', '=', 'No'], ['products.productName', 'LIKE', "%{$query}%"]])
        ->orWhere([['products.deleted', '=', 'No'], ['categories.categoryName', 'like', "%{$query}%"]])
        ->orWhere([['products.deleted', '=', 'No'], ['sub_categories.subCategoryName', 'like', "%{$query}%"]])
        ->SELECT('products.*', 'categories.categoryName', 'sub_categories.subCategoryName')
        ->get();

      foreach ($products as $product) {
        $specifications = DB::table('productspecifications')
          ->leftJoin('product_special_offers', function ($join) {
            $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
            $join->on('product_special_offers.startDate', '<=', DB::raw("'" . date('Y-m-d') . "'"));
            $join->on('product_special_offers.endDate', '>=', DB::raw("'" . date('Y-m-d') . "'"));
          })
          ->where('tbl_productsId', '=', $product->id)
          ->where('productspecifications.deleted', '=', 'No')
          ->select('productspecifications.*', 'product_special_offers.offerPrice')
          ->get();
        $product->spec = $specifications;
        $hasDiscount = "No";
        foreach ($specifications as $spec) {
          if ($spec->offerPrice != "") {
            $hasDiscount = "Yes";
            break;
          } else {
            $hasDiscount = "No";
          }
        }

        $product->hasDiscount = $hasDiscount;
      }
      $settings = ShopSetting::find(1);
      return view('frontEnd.home.searched-products', ['products' => $products, 'currency' => $settings->currency, 'searchKey' => $query]);
    } else {
      return redirect(route('/'));
    }
  }
  public function catProducts2()
  {
    return view('frontEnd.home.productsCategory2');
  }
  public function contactUs()
  {
    $shopSetting = ShopSetting::where('status', 'Active')->first();
    return view('frontEnd.home.contactUs', compact('shopSetting'));
  }

  public function submitContactUs(Request $request)
  {

    $form = new ContactUs();

    if (auth()->user()) {
      $form->sender_id = auth()->user()->id;
      $form->name = auth()->user()->name;
      $form->email = auth()->user()->email;
      $form->telephone = auth()->user()->phone;
      $form->message = $request->message;
    } else {
      $form->name = $request->name;
      $form->email = $request->email;
      $form->telephone = $request->telephone;
      $form->subject = $request->subject;
      $form->message = $request->message;
    }

    $form->save();
    return redirect(route('user-message-portal'))->with('message', 'Thanks for contacting with us. We will contact with you soon');
  }

  public function events()
  {
    return view('frontEnd.home.events');
  }
  public function bestDeals()
  {

    /*$deals = DB::table('products')
                    ->where([['deleted','=','No'],['in_offer','=','yes']])
                    ->select ('products.*')
                    ->take(20)
                    ->get();
            
            foreach ($deals as $deal)
        	{
        		
        		
				$specifications = DB::table('productspecifications')
                    ->leftJoin('product_special_offers', function($join)
                         {
                             $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
                             $join->on('product_special_offers.startDate','<=',DB::raw("'".date('Y-m-d')."'"));
                             $join->on('product_special_offers.endDate','>=',DB::raw("'".date('Y-m-d')."'"));
                         })
                    ->where('tbl_productsId','=',$deal->id)
					->where('productspecifications.deleted','=','No')
					->select('productspecifications.*', 'product_special_offers.offerPrice')
					->get();
        		$deal->spec = $specifications;
        		$deal->id = $deal->id;
        	}*/
    $deals = DB::table('products')
      ->join('productspecifications', 'productspecifications.tbl_productsId', '=', 'products.id')
      ->join('product_special_offers', function ($join) {
        $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
        $join->on('product_special_offers.startDate', '<=', DB::raw("'" . date('Y-m-d') . "'"));
        $join->on('product_special_offers.endDate', '>=', DB::raw("'" . date('Y-m-d') . "'"));
      })
      ->where([['products.deleted', '=', 'No'], ['productspecifications.deleted', '=', 'No'], ['product_special_offers.deleted', '=', 'No']])
      ->select('products.*', 'product_special_offers.offerPrice', 'productspecifications.specificationName', 'productspecifications.id as specId', 'productspecifications.specPrice')
      ->take(20)
      ->get();

    foreach ($deals as $deal) {
      //$deal->id = $deal->id . 'd';
    }
    $settings = ShopSetting::find(1);
    // $view->with(['deals'=>$deals,'currency'=>$settings->currency]);

    return view('frontEnd.home.bestDeals', ['deals' => $deals, 'currency' => $settings->currency]);
  }
  public function service()
  {
    $content = Content::where('alias', 'service')->first();
    return view('frontEnd.home.service', compact('content'));
  }
  public function checkout(Request $request)
  {

    //var_dump( Session::get('cart_array'));

    //if(isset(auth()->user()->id)){
    $carringCostList = LocationCarringCost::all();
    //dd($carringCostList);
    if (isset(auth()->user()->id)) {
      $userId = auth()->user()->id;
      $users = Users::find($userId);
      $userList = Users::where('utype', 'USR')->get();
      return view('frontEnd.home.checkout', ['users' => $userList, 'user_Address' => $users, 'carringCostList' => $carringCostList]);
    } else {
      return view('frontEnd.home.checkout', ['user_Address' => null, 'carringCostList' => $carringCostList]);
    }

    /*}else{
   $users = null;
   $carringCostList = null;
   return view('frontEnd.home.checkout',['user_Address'=>$users,'carringCostList'=>$carringCostList]);
 }*/
  }
  public function payment(Request $request)
  {
    //dd($request->grandTotal);
    /*$permission = array("true");
  foreach(Session::get("cart_array") as $keys => $values){
    //echo Session::get("cart_array")[$keys]["product_price"];
    $spec = Productspecification::find(Session::get("cart_array")[$keys]["product_id"]);
    $product_id = $spec->tbl_productsId;
    $product = product::find($product_id);
    if ($product->availability == "available") {
      if ($product->in_offer == "yes") {
        $hotOffer = ProductHotOffer::where('tbl_productId',$product->id)->first();
        $offerPrice = $product->amount - $hotOffer->offerPrice;
      //array_push($permission, $offerPrice);
      //array_push($permission, Session::get("cart_array")[$keys]["product_price"]);
        if ($offerPrice != Session::get("cart_array")[$keys]["product_price"]) {
          array_push($permission, "false");
        //$permission = false;
          Session::put('removeProduct', Session::get("cart_array")[$keys]["product_name"]);        
        }
        else{
          array_push($permission, "true");
        //$permission = true;
        }



      }
      else{
        array_push($permission, "true");
      //$permission = true;
      }
    }

    else{
      Session::put('removeProduct2', Session::get("cart_array")[$keys]["product_name"]);
      array_push($permission, "unavailable");
    }
    


  }
  //return $permission;

  if (in_array("false", $permission)) {
    //echo "we";
    //return $permission;
    return redirect()->back()->with('message','There is updated offer price. Please remove the product: "'.Session::get('removeProduct').'" and add to cart again');

  }

  elseif (in_array("unavailable", $permission)) {
    //echo "we";
    //return $permission;
    return redirect()->back()->with('message','Unfortunately product is unavailable: "'.Session::get('removeProduct2').'"');

  }


  else{
    //echo "qw";
    return view('frontEnd.home.payment',['orderInformation'=>$request]);



  }*/
    return view('frontEnd.home.payment', ['orderInformation' => $request]);
    // $products = DB::table('products')
    //               ->join('product_hot_offers','product_hot_offers.tbl_productId','=','products.id')
    //               ->select('products.*','product_hot_offers.offerPrice')

    //               ->get();
    //   return view('frontEnd.home.payment',['orderInformation'=>$request]);
  }
  public function orderPlacement(Request $request)
  {
    //dd($request->cod);

    //return $request->all();

    if (auth()->user()->utype == "ADM") {
      if ($request->cod == "cod") {
        $order = new orders();
        $orderNo = sprintf('%06d', Orders::max('order_number') + 1);
        $order->order_number = $orderNo;
        $order->user_id = $request->user_id;
        $order->grand_total = $request->grandTotal;
        $order->item_count = $request->itemCount;
        $order->payment_status = '0';
        $order->payment_method = 'COD';
        $order->full_name = $request->name;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->country = "UK";
        $order->phone_number = $request->mobile;
        $order->location_carring_cost_id = $request->location_carring_cost_id;
        $order->carring_cost = $request->carring_cost;
        $order->net_payable = $request->net_payable;
        $order->created_by = auth()->user()->id;
        $order->save();


        $order_id = $order->id;
        foreach (Session::get("cart_array") as $keys => $values) {
          $specification_id = Session::get("cart_array")[$keys]["product_id"];
          $spec = productspecification::find($specification_id);
          $product_id = $spec->tbl_productsId;
          $product_quantity = Session::get("cart_array")[$keys]["product_quantity"];

          if (Session::get("cart_array")[$keys]["product_price"] != Session::get("cart_array")[$keys]["product_discount"]) {
            $product_price = Session::get("cart_array")[$keys]["product_discount"];
          } else {
            $product_price = Session::get("cart_array")[$keys]["product_price"];
          }
          $real_amount = Session::get("cart_array")[$keys]["product_price"];
          $totalAmount = Session::get("cart_array")[$keys]["product_quantity"] * $product_price;




          //$product_price = Session::get("cart_array")[$keys]["product_price"];
          //$totalAmount = $product_quantity*$product_price;

          $order_details = new OrderDetails();
          $order_details->order_id = $order_id;
          $order_details->products_id = $product_id;
          $order_details->specification_id = $specification_id;
          $order_details->quantity = $product_quantity;
          $order_details->salesAmount = $product_price;
          $order_details->totalAmount = $totalAmount;
          $order_details->grandTotal = $totalAmount;
          $order_details->real_amount = $real_amount;
          $order_details->discount = $real_amount - $product_price;
          $order_details->createdBy = auth()->user()->id;
          $order_details->save();

          //$product = product::find($product_id);
          $spec->increment('sale_time');
          $spec->save();
        }
        Session::forget('cart_array');

        //Session::pull('cart_array');
        return view('frontEnd.home.homeContent');
      }
    } else {
      if ($request->cod == "cod") {
        $order = new orders();
        $orderNo = sprintf('%06d', Orders::max('order_number') + 1);
        $order->order_number = $orderNo;
        $order->user_id = auth()->user()->id;
        $order->grand_total = $request->grandTotal;
        $order->item_count = $request->itemCount;
        $order->payment_status = '0';
        $order->payment_method = 'COD';
        $order->full_name = $request->name;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->country = "UK";
        $order->phone_number = $request->mobile;
        $order->location_carring_cost_id = $request->location_carring_cost_id;
        $order->carring_cost = $request->carring_cost;
        $order->net_payable = $request->net_payable;
        $order->created_by = auth()->user()->id;
        $order->save();


        $order_id = $order->id;
        foreach (Session::get("cart_array") as $keys => $values) {
          $specification_id = Session::get("cart_array")[$keys]["product_id"];
          $spec = productspecification::find($specification_id);
          $product_id = $spec->tbl_productsId;
          $product_quantity = Session::get("cart_array")[$keys]["product_quantity"];
          //$product_price = Session::get("cart_array")[$keys]["product_price"];
          //$totalAmount = $product_quantity*$product_price;
          //$productWeight = productspecification::find($product_id);

          if (Session::get("cart_array")[$keys]["product_price"] != Session::get("cart_array")[$keys]["product_discount"]) {
            $product_price = Session::get("cart_array")[$keys]["product_discount"];
          } else {
            $product_price = Session::get("cart_array")[$keys]["product_price"];
          }
          $real_amount = Session::get("cart_array")[$keys]["product_price"];
          $totalAmount = Session::get("cart_array")[$keys]["product_quantity"] * $product_price;

          $order_details = new OrderDetails();
          $order_details->order_id = $order_id;
          $order_details->specification_id = $specification_id;
          $order_details->products_id = $product_id;
          $order_details->quantity = $product_quantity;
          $order_details->salesAmount = $product_price;
          $order_details->totalAmount = $totalAmount;
          $order_details->grandTotal = $totalAmount;
          $order_details->real_amount = $real_amount;
          $order_details->discount = $real_amount - $product_price;
          $order_details->createdBy = auth()->user()->id;
          $order_details->save();

          $spec->increment('sale_time');
          $spec->save();
        }
        Session::forget('removeProduct');
        Session::forget('cart_array');

        //Session::pull('cart_array');
        return view('frontEnd.home.homeContent');
      }
    }
  }
  public function subCategory($id)
  {
    $sub_categories = DB::table('sub_categories')
      ->leftjoin('categories.id', '=', 'sub_categories.tbl_CategoryID')
      ->SELECT('sub_categories.id as subId,sub_categories.subCategoryName', 'categories.id', 'categories.categoryName')
      ->where('categories.status', 'Active')
      ->where('categories.id', $id)
      ->get();
    //return $sub_categories;
    return view('frontEnd.includes.menue', ['sub_categories' => $sub_categories]);
  }
  public function viewcategoryproduct($id)
  {


    $products = DB::table('tbl_products')
      ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
      ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
      ->whereIn('tbl_products.id', function ($query) use ($id) {
        $query->select('tbl_product_id')
          ->distinct()
          ->from('tbl_print_book_product')
          ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
          ->where('tbl_printbook_category.is_website', 'Yes')
          ->where('tbl_printbook_category.tbl_category_id', $id);
      })
      ->where('tbl_products.deleted', 'No')
      ->where('tbl_products.status', 'Active')
      ->select(
        'tbl_products.id',
        'tbl_products.productCode',
        'tbl_products.productName',
        'tbl_products.maxSalePrice',
        'tbl_products.productImage',
        'tbl_products.modelNo',
        'tbl_products.productDescriptions',
        'tbl_brands.brandName',
        'tbl_brands.brand_logo',
        'tbl_category.categoryName'
      )
      ->paginate(15);


    return view('website.pages.shop_grid_3_columns_sidebar', ['products' => $products]);
  }
  public function viewbrandproduct($id)
  {


    $products = DB::table('tbl_products')
      ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
      ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
      ->whereIn('tbl_products.id', function ($query) use ($id) {
        $query->select('tbl_product_id')
          ->distinct()
          ->from('tbl_print_book_product')
          ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
          ->where('tbl_printbook_category.is_website', 'Yes')
          ->where('tbl_printbook_category.tbl_brand_id', $id);
      })
      ->where('tbl_products.deleted', 'No')
      ->where('tbl_products.status', 'Active')
      ->select(
        'tbl_products.id',
        'tbl_products.productCode',
        'tbl_products.productName',
        'tbl_products.maxSalePrice',
        'tbl_products.productImage',
        'tbl_products.modelNo',
        'tbl_products.productDescriptions',
        'tbl_brands.brandName',
        'tbl_brands.brand_logo',
        'tbl_category.categoryName'
      )
      ->paginate(15);


    return view('website.pages.shop_grid_3_columns_sidebar', ['products' => $products]);
  }
}
