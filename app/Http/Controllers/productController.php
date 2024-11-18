<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Category;
use App\manufacturer;
use App\product;
use App\subCategory;
use App\productSpecialOffer;
use App\productspecification;
use App\Models\ShopSetting;
use App\Orders;
use App\Users;
use App\Models\LocationCarringCost;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use Image;
use function Sodium\increment;

class productController extends Controller {
  protected $name;
  /* function for admin panel*/
  public function productView() {
    $settings=ShopSetting::where('status', 'Active')->first();
    
    $products=DB::table('tbl_print_book_product')
     ->select([
         'tbl_products.id', 
         'tbl_products.productName', 
         'tbl_products.productImage',
         'tbl_products.status',
         'tbl_products.created_at',
         'tbl_brands.brandName',
         'tbl_category.categoryName'
     ])
     ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
     ->join('tbl_printbook', 'tbl_printbook_category.tbl_printbook_id', '=', 'tbl_printbook.id')
     ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
     ->join('tbl_category', 'tbl_printbook_category.tbl_category_id', '=', 'tbl_category.id')
     ->join('tbl_products', 'tbl_print_book_product.tbl_product_id', '=', 'tbl_products.id')
     ->where('tbl_products.deleted', 'No')
     ->where('tbl_products.status', 'Active')
     ->where('tbl_print_book_product.status', 'Active')
     ->where('tbl_print_book_product.deleted', 'No')
     ->where('tbl_printbook_category.is_website', 'Yes')
     ->where('tbl_printbook_category.status', 'Active')
     ->where('tbl_printbook_category.deleted', 'No')
     ->where('tbl_printbook.status', 'Active')
     ->where('tbl_printbook.deleted', 'No')
     ->distinct()
     ->get();

  return view('admin.home.products.productsView', ['products' => $products,'settings'=>$settings]);  
}
  /* //function for admin panel*/

  /* function for frontEnd panel*/ 
  public function productViewFrontEnd(Request $request) {
      $settings = ShopSetting::find(1);
      $productsData = '';
    $products = DB::table('products')
    ->join('categories', 'products.tbl_categoryId', '=', 'categories.id')
    ->join('manufacturers', 'products.tbl_manufacturerId', '=', 'manufacturers.id')
    ->select('products.id', 'products.in_offer', 'products.productName', 'products.productImage', 'products.amount', 'products.created_at', 'categories.categoryName', 'manufacturers.manufacturerName')
    ->where([['products.deleted', '=', 'no'],['products.availability', '!=', 'off'], ['categories.categoryName', '=', $request->CatName]])
    ->orderBy('products.id', 'desc')
    ->paginate(12);
    if ($request->ajax()) {
        foreach ($products as $product)
    	{
    	    $priceSpecification = '';
    	    $specPrice = '';
    	    $discountPriceData = '';
    		$specifications = DB::table('productspecifications')
                        ->leftJoin('product_special_offers', function($join)
                             {
                                 $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
                                 $join->on('product_special_offers.startDate','<=',DB::raw("'".date('Y-m-d')."'"));
                                 $join->on('product_special_offers.endDate','>=',DB::raw("'".date('Y-m-d')."'"));
                             })
                        ->where('tbl_productsId','=',$product->id)
    					->where('productspecifications.deleted','=','No')
    					->select('productspecifications.*', 'product_special_offers.offerPrice')
    					->get();
    		//$product->spec = $specifications;
    		$hasDiscount = "No";
    		
    		    //$productsData .= $product->productName.'<br>';
        		foreach($specifications as $spec){
        		    $priceSpecification .= '<option value="'.$spec->id.'">'.$spec->specificationName.'</option>';
        		    $specPrice .= '<option value="'.$spec->id.'">'.$spec->specPrice.'</option>';
        		    if($spec->offerPrice != ""){
        		        $hasDiscount = "Yes";
        		        Break;
        		    }else{
        		        $hasDiscount = "No";
        		    }
        		    if ($spec->offerPrice != ''){
        		        $lastChar = substr($spec->offerPrice, -1); 
        	            if($lastChar != '%'){
        	                $discountPrice = $spec->specPrice - $spec->offerPrice;
        	            }else{
        	                $discountPrice = $spec->specPrice - ($spec->specPrice * (substr($spec->offerPrice, 0, -1) / 100));
        	            }
        	            
        	           $discountPriceData .= '<option value="'.$spec->id.'">'.$discountPrice.'</option>';
        		    }else{
        		       $discountPriceData .= '<option value="'.$spec->id.'">'.$spec->specPrice.'</option>';
        		    }
        		}
        		$productsData .= '<div class="col-md-2 col-xs-6 w31_fresh_margin_top_sub_cat">
                                <div class="hover14 column">
                                <div class="agile_top_brand_left_grid">
                                    <div class="agile_top_brand_left_grid_pos">';
            if($product->in_offer == "yes"){
                $productsData .= '<img src="'.asset('frontEnd/images/tag.png').'" alt=" " class="img-responsive" />';
            }
            elseif($hasDiscount == "Yes"){
                $productsData .= '<img src="'.asset('frontEnd/images/offer.png').'" alt=" " class="img-responsive" />';
            }            
            
            $productsData .= '</div>
                <div class="agile_top_brand_left_grid1">
                <figure>
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb">
                            <p class="overFlowP">'.$product->productName.'</a></p>'; 
            
            if(file_exists(public_path('productImage/'.$product->productImage))){
                $productsData .= '<a href="'.route('product-details',['id'=>$product->id]).'"><img title=" " alt=" " src="'.asset('productImage/'.$product->productImage).'" width="150" height="150" /></a>';
            }
            else{
                $productsData .= '<a href="'.route('product-details',['id'=>$product->id]).'"><img title=" " alt=" " src="'.asset('productImage/product.jpg').'" width="150" height="150" /></a>';
            }
            $discount_amount='';
            $regular_price = 0;
            $minSpec = $specifications->where('specPrice', $specifications->min('specPrice'))->first();
            $productsData .= '<div class="ratingDiv">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    <div class="cartLower">';
            $productsData .= '<h4 style="margin: 1.3%;"><span id="currency'.$product->id.'" style="display:none;"><b>'.$settings->currency.'</b></span> <b id="price'.$product->id.'"></b><span id="regPrice'.$product->id.'"></span>
                        </h4>';
           
            $productsData .= '<select name="priceSpecification" class="chooseSizeSub" id="priceSpecification'.$product->id.'" onchange="changeSize('.$product->id.')">'.$priceSpecification.'</select>
						<select id="specPrice'.$product->id.'" style="display:none;">'.$specPrice.'</select>';
		    $productsData .= '<select id="discount'.$product->id.'" style="display:none;">'.$discountPriceData.'</select>';
		    $productsData .= '<input type="number" min="1" class="chooseSizeSub" onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;" id="quantity_'.$product->id.'" name="quantity" value="1" style="width:50px;" />';
		    $productsData .= '<div class="snipcart-details">
                            <form action="#" method="post">
                              <fieldset>
                               <input type="hidden" name="item_id" id="item_id_'.$product->id.'" value="'.$product->id.'" />
                               <input type="hidden" name="item_name" id="item_name_'.$product->id.'" value="'.$product->productName.'" />
                               <input type="hidden" name="item_image" id="item_image_'.$product->id.'" value="'.$product->productImage.'" />';
                               if ($discount_amount==null){
                                    $productsData .= '<input type="hidden" name="amount" id="amount_'.$product->id.'" value="'.$regular_price.'" />';
                               } else{
                                    $productsData .= '<input type="hidden" name="amount" id="amount_'.$product->id.'" value="'.$after_discount_price.'" />';
                               }
                               $productsData .= '<input type="hidden" name="discount_amount" id="discount_amount_'.$product->id.'" value="1.00" />
                               <input type="button" name="submit" value="Add to cart" class="button" onclick="addToCart('.$product->id.')" />
                            </fieldset>
                            </form>
						</div>';
		    $productsData .= '</div>
                  </div>
              </div>
              </figure>
            </div>
          </div>
          </div>
            <script type="text/javascript">
            $(document).ready(function () {
                var id = '.$product->id.';
                $("#priceSpecification"+'.$product->id.').val('.$minSpec->id.');
                changeSize('.$product->id.');
            });
        </script>';
        		//$product->hasDiscount = $hasDiscount;
        		
    		    
    		}
    	return $productsData;
    }
	
    return view('frontEnd.home.products',['CatName' => $request->CatName, 'lastPage'=>$products->lastPage()]);

  }
  public function sCatProductsFrontEnd(Request $request){
	$category = $request->sCatName;
	$settings = ShopSetting::find(1);
      $productsData = '';
	if($category != ""){
		$products = DB::table('products')
		->join('categories', 'products.tbl_categoryId', '=', 'categories.id')
		->join('sub_categories', 'products.tbl_subCategoryId', '=', 'sub_categories.id')
		->join('manufacturers', 'products.tbl_manufacturerId', '=', 'manufacturers.id')
		//->leftJoin('product_special_offers', 'product_special_offers.tbl_productId', '=', 'products.id')
		//->leftJoin('product_hot_offers', 'product_hot_offers.tbl_productId', '=', 'products.id')
			// ->whereNull('product_special_offers.tbl_productId')
		->where('sub_categories.subCategoryName', '=', $category)
		->where([['sub_categories.deleted','=','No'],['products.deleted', '=' ,'no']])
		//->select('products.id', 'products.productName', 'products.productImage', 'products.amount', 'products.created_at', 'categories.categoryName', 'sub_categories.subCategoryName', 'manufacturers.manufacturerName','product_special_offers.offerPrice','product_hot_offers.offerPrice')
		->select('products.id', 'products.productName','products.in_offer', 'products.productImage', 'products.amount', 'products.created_at', 'categories.categoryName', 'sub_categories.subCategoryName', 'manufacturers.manufacturerName')
		->orderBy('products.id', 'desc')
		->paginate(12);
	}else{
		$products = DB::table('products')
		->join('categories', 'products.tbl_categoryId', '=', 'categories.id')
		->join('sub_categories', 'products.tbl_subCategoryId', '=', 'sub_categories.id')
		->join('manufacturers', 'products.tbl_manufacturerId', '=', 'manufacturers.id')
		//->leftJoin('product_special_offers', 'product_special_offers.tbl_productId', '=', 'products.id')
		//->leftJoin('product_hot_offers', 'product_hot_offers.tbl_productId', '=', 'products.id')
					// ->whereNull('product_special_offers.tbl_productId')
		->where([['sub_categories.deleted','=','No'],['products.deleted', '=' ,'no']])
		//->select('products.id', 'products.productName', 'products.productImage', 'products.amount', 'products.created_at', 'categories.categoryName', 'sub_categories.subCategoryName', 'manufacturers.manufacturerName','product_special_offers.offerPrice','product_hot_offers.offerPrice')
		->select('products.id', 'products.productName', 'products.in_offer', 'products.productImage', 'products.amount', 'products.created_at', 'categories.categoryName', 'sub_categories.subCategoryName', 'manufacturers.manufacturerName')
		->orderBy('products.id', 'desc')
		->paginate(12);
	}
	if ($request->ajax()) {
        foreach ($products as $product)
    	{
    	    $priceSpecification = '';
    	    $specPrice = '';
    	    $discountPriceData = '';
    		$specifications = DB::table('productspecifications')
                        ->leftJoin('product_special_offers', function($join)
                             {
                                 $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
                                 $join->on('product_special_offers.startDate','<=',DB::raw("'".date('Y-m-d')."'"));
                                 $join->on('product_special_offers.endDate','>=',DB::raw("'".date('Y-m-d')."'"));
                             })
                        ->where('tbl_productsId','=',$product->id)
    					->where('productspecifications.deleted','=','No')
    					->select('productspecifications.*', 'product_special_offers.offerPrice')
    					->get();
    		//$product->spec = $specifications;
    		
    		$hasDiscount = "No";
    		
    		    //$productsData .= $product->productName.'<br>';
        		foreach($specifications as $spec){
        		    $priceSpecification .= '<option value="'.$spec->id.'">'.$spec->specificationName.'</option>';
        		    $specPrice .= '<option value="'.$spec->id.'">'.$spec->specPrice.'</option>';
        		    if($spec->offerPrice != ""){
        		        $hasDiscount = "Yes";
        		        Break;
        		    }else{
        		        $hasDiscount = "No";
        		    }
        		    if ($spec->offerPrice != ''){
        		        $lastChar = substr($spec->offerPrice, -1); 
        	            if($lastChar != '%'){
        	                $discountPrice = $spec->specPrice - $spec->offerPrice;
        	            }else{
        	                $discountPrice = $spec->specPrice - ($spec->specPrice * (substr($spec->offerPrice, 0, -1) / 100));
        	            }
        	            
        	           $discountPriceData .= '<option value="'.$spec->id.'">'.$discountPrice.'</option>';
        		    }else{
        		       $discountPriceData .= '<option value="'.$spec->id.'">'.$spec->specPrice.'</option>';
        		    }
        		}
        		
        		$productsData .= '<div class="col-md-2 col-xs-6 w31_fresh_margin_top_sub_cat">
                                <div class="hover14 column">
                                <div class="agile_top_brand_left_grid">
                                    <div class="agile_top_brand_left_grid_pos">';
                
            if($product->in_offer == "yes"){
                $productsData .= '<img src="'.asset('frontEnd/images/tag.png').'" alt=" " class="img-responsive" />';
            }
            elseif($hasDiscount == "Yes"){
                $productsData .= '<img src="'.asset('frontEnd/images/offer.png').'" alt=" " class="img-responsive" />';
            }            
           
            $productsData .= '</div>
                <div class="agile_top_brand_left_grid1">
                <figure>
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb">
                            <p class="overFlowP">'.$product->productName.'</a></p>'; 
            
            if(file_exists(public_path('productImage/'.$product->productImage))){
                $productsData .= '<a href="'.route('product-details',['id'=>$product->id]).'"><img title=" " alt=" " src="'.asset('productImage/'.$product->productImage).'" width="150" height="150" /></a>';
            }
            else{
                $productsData .= '<a href="'.route('product-details',['id'=>$product->id]).'"><img title=" " alt=" " src="'.asset('productImage/product.jpg').'" width="150" height="150" /></a>';
            }
            $discount_amount='';
            $regular_price = 0;
            $minSpec = $specifications->where('specPrice', $specifications->min('specPrice'))->first();
            $productsData .= '<div class="ratingDiv">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    <div class="cartLower">';
            $productsData .= '<h4 style="margin: 1.3%;"><span id="currency'.$product->id.'" style="display:none;"><b>'.$settings->currency.'</b></span> <b id="price'.$product->id.'"></b><span id="regPrice'.$product->id.'"></span>
                        </h4>';
           
            $productsData .= '<select name="priceSpecification" class="chooseSizeSub" id="priceSpecification'.$product->id.'" onchange="changeSize('.$product->id.')">'.$priceSpecification.'</select>
						<select id="specPrice'.$product->id.'" style="display:none;">'.$specPrice.'</select>';
		    $productsData .= '<select id="discount'.$product->id.'" style="display:none;">'.$discountPriceData.'</select>';
		    $productsData .= '<input type="number" min="1" class="chooseSizeSub" onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;" id="quantity_'.$product->id.'" name="quantity" value="1" style="width:50px;" />';
		    $productsData .= '<div class="snipcart-details">
                            <form action="#" method="post">
                              <fieldset>
                               <input type="hidden" name="item_id" id="item_id_'.$product->id.'" value="'.$product->id.'" />
                               <input type="hidden" name="item_name" id="item_name_'.$product->id.'" value="'.$product->productName.'" />
                               <input type="hidden" name="item_image" id="item_image_'.$product->id.'" value="'.$product->productImage.'" />';
                               if ($discount_amount==null){
                                    $productsData .= '<input type="hidden" name="amount" id="amount_'.$product->id.'" value="'.$regular_price.'" />';
                               } else{
                                    $productsData .= '<input type="hidden" name="amount" id="amount_'.$product->id.'" value="'.$after_discount_price.'" />';
                               }
                               $productsData .= '<input type="hidden" name="discount_amount" id="discount_amount_'.$product->id.'" value="1.00" />
                               <input type="button" name="submit" value="Add to cart" class="button" onclick="addToCart('.$product->id.')" />
                            </fieldset>
                            </form>
						</div>';
		    $productsData .= '</div>
                  </div>
              </div>
              </figure>
            </div>
          </div>
          </div>
            <script type="text/javascript">
            $(document).ready(function () {
                var id = '.$product->id.';
                $("#priceSpecification"+'.$product->id.').val('.$minSpec->id.');
                changeSize('.$product->id.');
            });
        </script>';
        		//$product->hasDiscount = $hasDiscount;
        		
    		    
    		}
    	return $productsData;
    }
    return view('frontEnd.home.subProducts',['sCatName' => $request->sCatName, 'lastPage'=>$products->lastPage()]);
  }

  public function addToCart(Request $request){
    if(Session::get("cart_array")!=null){
     $is_available = 0;
     foreach(Session::get("cart_array") as $keys => $values){
      if(Session::get("cart_array")[$keys]['product_id'] == $request->itemId){
       $is_available++;
       session()->put("cart_array.".$keys.".product_quantity", Session::get("cart_array")[$keys]['product_quantity'] + $request->quantity);
     }
   }
   if($is_available == 0){
    $item_array = [
      'product_id'               =>     $request->itemId,  
      'product_name'             =>     $request->itemName, 
      'product_image'             =>     $request->itemImage,  
      'product_price'            =>     $request->amount,				
      'product_quantity'         =>     $request->quantity,
      'product_discount'         =>     $request->discount_amount
    ];
    Session::push('cart_array', $item_array);
  }
}else{
 $item_array = [
  'product_id'               =>     $request->itemId,  
  'product_name'             =>     $request->itemName,  
  'product_image'             =>     $request->itemImage, 
  'product_price'            =>     $request->amount,				
  'product_quantity'         =>     $request->quantity,
  'product_discount'         =>     $request->discount_amount,
  
];
Session::push('cart_array', $item_array);
}
$data = "Success";
return $data;
}

public function reOrder($id){

  Session::forget('cart_array');

  $orders = DB::table('orders')
              ->join('order_details','orders.id','=','order_details.order_id')
              ->join('products','order_details.products_id','=','products.id')
              ->join('productspecifications','order_details.specification_id','=','productspecifications.id')
              ->leftJoin('product_special_offers', function($join)
                         {
                             $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
                             $join->on('product_special_offers.startDate','<=',DB::raw("'".date('Y-m-d')."'"));
                             $join->on('product_special_offers.endDate','>=',DB::raw("'".date('Y-m-d')."'"));
                         })
              //->leftJoin('product_hot_offers','product_hot_offers.tbl_productId','=','products.id')
              //->leftJoin('product_special_offers','product_special_offers.tbl_productId','=','products.id')
              ->where('orders.id',$id)
              ->SELECT('orders.*','order_details.products_id', 'order_details.specification_id','productspecifications.specificationName','order_details.quantity','order_details.salesAmount','products.productName','products.productImage','productspecifications.specPrice','product_special_offers.offerPrice')
              ->get();
//dd($orders);
  //return $orders;
  //$item_array = array();
  $discountPrice = 0;
  foreach ($orders as $order) {
        if ($order->offerPrice != ''){
	        $lastChar = substr($order->offerPrice, -1); 
            if($lastChar != '%'){
                $discountPrice = $order->specPrice - $order->offerPrice;
            }else{
                $discountPrice = $order->specPrice - ($order->specPrice * (substr($order->offerPrice, 0, -1) / 100));
            }
	    }else{
	       $discountPrice = $order->specPrice;
	    }
    $item_array = [
      'product_id'               =>     $order->specification_id,  
      'product_name'             =>     $order->productName.' - '.$order->specificationName,  
      'product_image'            =>     $order->productImage, 
      'product_price'            =>     $order->specPrice,       
      'product_quantity'         =>     $order->quantity,
      'product_discount'         =>     $discountPrice

      // session()->put("cart_array.".$keys.".product_id", $keys->products_id),
      // session()->put("cart_array.".$keys.".product_name", $keys->productName),
      // session()->put("cart_array.".$keys.".product_image", $keys->productImage),
      // session()->put("cart_array.".$keys.".product_price", $keys->amount),
      // session()->put("cart_array.".$keys.".product_quantity", $keys->quantity),
      // session()->put("cart_array.".$keys.".product_discount", "1.00")

    ];

    Session::push('cart_array', $item_array);
  }


  

  //return Session::get('cart_array');
  //var_dump( Session::get('cart_array'));
  //return print_r(Session::get('cart_array'));

  if(isset(auth()->user()->id)){
   $userId = auth()->user()->id;
   $users = Users:: find($userId);
   $carringCostList = LocationCarringCost::all();
   //dd($carringCostList);
   $userList = Users::where('utype','USR')->get();
   return view('frontEnd.home.checkout',['users'=>$userList,'user_Address'=>$users,'carringCostList'=>$carringCostList]);
 }
 else{
   $users = null;
   return view('frontEnd.home.checkout',['user_Address'=>$users,'carringCostList'=>$carringCostList]);


 }
}

public function updateCart(Request $request){
  $data = "";
    if(Session::get("cart_array")!=null){
        foreach(Session::get("cart_array") as $keys => $values){
            if(Session::get("cart_array")[$keys]['product_id'] == $request->id){
                session()->put("cart_array.".$keys.".product_quantity", $request->quantity);
                $data = "Success";
            }
        }
    }else{
        $data = "";
    }
    return $data;
}
public function toggleStatus($id)
{
    $productImage = ProductImage::find($id);

    // Toggle the status between 'Active' and 'Inactive'
    $productImage->status = ($productImage->status == 'Active') ? 'Inactive' : 'Active';
    $productImage->save();

    // Return back with a message
    return back()->with('message', 'Product image status updated successfully.');
}
/* //function for frontEnd panel*/ 
public function removeCartProduct(Request $request){
  $id = $request->id;
  $data = '';
  $cartData = Session::get('cart_array');
  foreach(Session::get("cart_array") as $keys => $values)
  {
   if(Session::get("cart_array")[$keys]['product_id'] == $id)
   {
    unset($cartData[$keys]);
    Session::put('cart_array', $cartData);
    $data = "Success";
    break;
  }
}
$data = "Success";
return $data;
}

public function clearCart(Request $request){
  Session::forget('cart_array');
  $data = "Success";
  return $data;
}
public function viewCart(Request $request){
    if($request->_page == "model"){
        $data = '';
        $i = 0;
        $totalPrice = 0;
        if(Session::get('cart_array')!=null){
            foreach(Session::get('cart_array') as $keys => $values){
                $i++;
                $imageUrl = 'product-thumbnail-image/'.Session::get("cart_array")[$keys]["product_image"];
                $data .='<tr><td>
                        <span><a onclick="qtyUp('.Session::get("cart_array")[$keys]["product_id"].')"><i class="fa fa-plus"></i></a></span><br>
                        <span id="'.Session::get("cart_array")[$keys]["product_id"].'">'.Session::get("cart_array")[$keys]["product_quantity"].'</span><br>
                        <span><a onclick="qtyDown('.Session::get("cart_array")[$keys]["product_id"].')"><i class="fa fa-minus"></i></a></span></td>
                        <td><img src="'.asset($imageUrl).'" style="width: 30px;" alt="No Image"/></td>';
                if(Session::get("cart_array")[$keys]["product_price"] != Session::get("cart_array")[$keys]["product_discount"]){
                    $productPrice = Session::get("cart_array")[$keys]["product_discount"];
                    $totalProductPrice = Session::get("cart_array")[$keys]["product_quantity"]*$productPrice;
                    $data .='<td>'.Session::get("cart_array")[$keys]["product_name"].'<br>'.Session::get("currency").' '.$productPrice.' <strike>'.Session::get("currency").Session::get("cart_array")[$keys]["product_price"].'</strike> / Uint</td>';
                    $data .='<td>'.Session::get("currency").$totalProductPrice.' <br><strike>'.Session::get("currency").Session::get("cart_array")[$keys]["product_quantity"]*Session::get("cart_array")[$keys]["product_price"].'</strike></td>';
                }else{
                    $productPrice = Session::get("cart_array")[$keys]["product_price"];
                    $totalProductPrice = Session::get("cart_array")[$keys]["product_quantity"]*$productPrice;
                    $data .='<td>'.Session::get("cart_array")[$keys]["product_name"].'<br>'.Session::get("currency").' '.$productPrice.' / Unit</td>';
                    $data .='<td>'.Session::get("currency").$totalProductPrice.'</td>';
                }
                
                $totalPrice += $totalProductPrice;
                $data .='<td><a onclick="removeCartProduct('.Session::get("cart_array")[$keys]["product_id"].')"><i class="fa fa-trash" style="cursor:pointer; color:red;"></i></a></td></tr>';
            
            }
        $result = array( 
                        'cartData'=>$data, 
                        'noOfProducts'=>$i, 
                        'totalAmount'=>round($totalPrice,2)); 
    	return json_encode($result);
       //return $data; 
        }else{
        // return 'Empty Cart';
            $result = array( 
                            'cartData'=>'<h5 style="text-align: center;">Empty Cart</h5>', 
                            'noOfProducts'=>0, 
                            'totalAmount'=>0); 
            return json_encode($result);
        }
    }else if($request->_page == "checkout"){
        $i = 0;
        $grandTotal = 0;
        $data = "";
        $strikePrice=0;
        $totalStrike=0;
        $totalProductPrice=0;
        $productPrice=0;
     
        if(Session::get('cart_array')!=null){
            foreach(Session::get('cart_array') as $keys => $values){	
                //$total_amount = Session::get("cart_array")[$keys]["product_price"]*Session::get("cart_array")[$keys]["product_quantity"];
                //$grandTotal = $grandTotal + $total_amount;
                $i++;
                $imageUrl = 'product-thumbnail-image/'.Session::get("cart_array")[$keys]["product_image"];
            
            
                if(Session::get("cart_array")[$keys]["product_price"] != Session::get("cart_array")[$keys]["product_discount"]){
                    $productPrice = Session::get("cart_array")[$keys]["product_discount"];
                    $strikePrice = Session::get("cart_array")[$keys]["product_price"];
                    $totalStrike = Session::get("currency").' <strike>'.(Session::get("cart_array")[$keys]["product_quantity"]*$strikePrice).'</strike>';
                    $strikePrice = Session::get("currency").' <strike>'.$strikePrice.'</strike>';
                }else{
                    $productPrice = Session::get("cart_array")[$keys]["product_price"];
                    $strikePrice = '';
                    $totalStrike = '';
                }
                $totalProductPrice = (Session::get("cart_array")[$keys]["product_quantity"]*$productPrice);
                $grandTotal += $totalProductPrice;
                $productPrice = Session::get("currency").' '.$productPrice;
                $totalProductPrice = Session::get("currency").' '.$totalProductPrice;
                                                    
            
                $data .= '<tr class="rem1">
                <td class="invert">'.$i.'</td>
                <td class="invert invert-image"><a href="#"><img src="'.asset($imageUrl).'" alt="hlo" class="img-responsive"></a><br>'.Session::get("cart_array")[$keys]["product_name"].' </td>                                   
                <td class="invert checkoutincrement">
                    <div class="quantity checkoutincrementMobile"> 
                        <div class="quantity-select">                           
                            <a href="#/" class="entry value-minus" onclick="buttonClickDOWN('.Session::get("cart_array")[$keys]["product_id"].');">&nbsp;</a>
                            <input class="entry value" id="'.Session::get("cart_array")[$keys]["product_id"].'" value="'.Session::get("cart_array")[$keys]["product_quantity"].'"></input>
                            <a href="#/" class="entry value-plus" onclick="buttonClickUP('.Session::get("cart_array")[$keys]["product_id"].');">&nbsp;</a>
                        </div>
                    </div>
                </td>
                <td class="invert checkoutPrice" id="td_produtPrice_'.Session::get("cart_array")[$keys]["product_id"].'">'.$productPrice.'<br>'.$strikePrice.'</td>
                <td class="invert checkoutTotalPrice" id="td_produtTotal_'.Session::get("cart_array")[$keys]["product_id"].'">'.$totalProductPrice.'<br>'.$totalStrike.'</td>
                <td class="invert checkoutRemove">
                    <div class="rem">
                    <a onclick="removeCartProduct('.Session::get('cart_array')[$keys]['product_id'].')"><i class="fa fa-trash" style="font-size:16px;color:red"></i></a>
                </div>
                
                </td>
                </tr>';
            
            }
            $data .= '<tr>
            <td colspan="2"></td><td colspan="2">Grand Total  </td>
            <td>'.Session::get("currency").' <span id="grandTotalTemp">'.$grandTotal.'</span></td>
            <td></td>
            </tr>
            <tr>
            <td colspan="2"></td><td colspan="2">Carring Cost </td>
            <td><span id="carringCostCurrency" style="display:none;">'.Session::get("currency").'</span> <input type="text" Readonly id = "carringCostId" name="carringCost" style="width:50%;"/></td>
            <td></td>
            </tr> 
            <tr>
            <td colspan="2"></td><td colspan="2">Net Payable  </td>
            <td><span id="netPayableCurrency" style="display:none;">'.Session::get("currency").'</span>  <input type="text" Readonly id = "netPayableId" name="netPayable" style="width:50%;"/></td>
            <td></td>
            </tr>    ';    
            $result = array( 
                            'cartData'=>$data, 
                            'noOfProducts'=>$i, 
                            'totalAmount'=>$grandTotal); 
                return json_encode($result);
            }else{
                $result = array( 
                            'cartData'=>'Empty Cart', 
                            'noOfProducts'=>0, 
                            'totalAmount'=>0); 
                return json_encode($result);
            }
    }
}
public function productAdd(Request $request) {
        //$categoryById = $this->productFetchData($request);
    
  $categories = Category::where('categoryStatus', 'Available')->where('deleted','no')->get();
  $manufacturer = manufacturer::where('manufacturerStatus', 'Available')->where('deleted','no')->orderBy('manufacturerName', 'asc')->get();
  return view('admin.home.products.createProduct', ['categories' => $categories, 'manufacturers' => $manufacturer]);
}

public function fetch(Request $request) {
  $value = $request->get('value');
        //$dependent = $request->get('dependent');


  $data = DB::table('categories')
  ->join('sub_categories', 'sub_categories.tbl_CategoryID', '=', 'categories.id')
  ->SELECT('sub_categories.id', 'sub_categories.subCategoryName')
  ->where('categories.id', $value)
  ->get();
  $output = '<option value="">~~ Select Sub-Category ~~</option>';
  foreach ($data as $row) {
    $output .= '<option value="' . $row->id . '">' . $row->subCategoryName . '</option>';
  }
  echo $output;





}

public function productSave(Request $request) {
        //return $Request->all(); /* Data pass check like echo */
      /*$this->validate($request, [
        'Productname' => 'required',
        'CategoryName' => 'required',
        'subCategoryName' => 'required',
        'manufactureName' => 'required',
        //'Productprice' => 'required',
        //'Productquantity' => 'required',
        'availability' => 'required',
      ]);*/
  
  
        $messages = [
            'The :attribute size must be under 200kb.',
        ];
        $rules=[
            //'name'=>'required|min:5',
            //'email'=>'nullable|unique:profile,email',
            //'phone'=>'required|regex:/(0)[0-9]{9}/|max:15|unique:profile,phone',
            //'alt_phone'=>'nullable|regex:/(0)[0-9]{9}/|max:15',
            
            'CategoryName' => 'required',
            'subCategoryName' => 'required',
            'Productname'=>'required|regex:/^[a-zA-Z0-9_\-\.\-\s\,\;\:\/\&\$\%\(\)]*$/|min:5|max:255',
            'manufactureName' => 'required',
            'availability' => 'required',
            'ProductStatus' => 'required',
            'in_offer' => 'required',
            'ProductDefaultimage' => 'nullable|mimes:jpeg,bmp,png',
            'productSortDescription'=>'nullable|regex:/^[a-zA-Z0-9_\-\.\-\s\,\;\:\/\&\$\%\(\)]*$/|min:5|max:255',
            'productLongDescription'=>'nullable|regex:/^[a-zA-Z0-9_\-\.\-\s\,\;\:\/\&\$\%\(\)]*$/|min:5|max:1000',
            
            //'amount'=>'nullable|regex:/^\d+(\.\d{1,2})?$/|min:2',
            //'education_info'=>'nullable|min:3|max:255',
            //'preferable_time'=>'nullable',
            //'courses'=>'nullable',
            
        ];
        
        $this->validate($request,$rules);
  
  
        //dd($request);
    if($request->hasFile('ProductDefaultimage')){
            /*$request->validate([
                'image'   =>  'image|max:2048'
              ]);*/

        	$productImage = $request->file('ProductDefaultimage');
            $name = $productImage->getClientOriginalName();
            $uploadPath = 'productImage/';
            $uploadPathThumbnail = 'product-thumbnail-image/';
            $imageName = time().$name;
            $imageUrl = $uploadPath.$imageName;
            $imageThumbnailUrl = $uploadPathThumbnail.$imageName;
            Image::make($productImage)->resize(360,360)->save($imageUrl);
            Image::make($productImage)->resize(100,100)->save($imageThumbnailUrl);
        } else{
            $imageName = "no_image.png";
            //$imageThumbnailUrl = "shopLogo/no_image.png";
        }

        /*$productImage = $request->file('ProductDefaultimage');
        $name = $productImage->getClientOriginalName();
        $uploadPath = 'productImage/';
        $uploadPathThumbnail = 'product-thumbnail-image/';
		$imageName = time().$name;
        $imageUrl = $uploadPath.$imageName;
        $imageThumbnailUrl = $uploadPathThumbnail.time().$name;
        Image::make($productImage)->resize(360,360)->save($imageUrl);
        Image::make($productImage)->resize(100,100)->save($imageThumbnailUrl);*/
        //$productImage->move($uploadPath, $name);

        // beginTransaction();
        /* Eloquent ORM process */
        $products = new product();
        $products->productName = $request->Productname;
        $products->tbl_categoryId = $request->CategoryName;
        $products->tbl_subCategoryId = $request->subCategoryName;
        $products->tbl_manufacturerId = $request->manufactureName;
        $products->amount = $request->Productprice;
        $products->productQuantity = $request->Productquantity;
        $products->productShortDescription = $request->productSortDescription;
        $products->productLongDescription = $request->productLongDescription;
        $products->productImage = $imageName;
        $products->productStatus = $request->ProductStatus;
        $products->availability = $request->availability;
        $products->createdBy = auth()->user()->id;
        $products->deleted = 'No';
        $products->in_offer = $request->in_offer;
        $products->save();
        $productId = $products->id;

        $spacName = $request->spacName;
        $spacValue = $request->spacValue;
        $spacPrice = $request->spacPrice;
        for ($i = 0; $i < count($spacName); $i++) {
          $payment = new productspecification();
          $payment->specificationName = $spacName[$i];
          $payment->specificationValue = $spacValue[$i];
          $payment->tbl_productsId = $productId;
          $prePayment = $spacPrice[$i];
          $payment->specPrice = str_replace(',', '', $prePayment);
          $payment->save();
        }

        /*$productImage = $request->file('productImage');
        $name = $productImage->getClientOriginalName();
        $uploadPath = 'productImage/';
        $uploadPathThumbnail = 'product-thumbnail-image/';
        $imageUrl = $uploadPath.$name;
        $imageThumbnailUrl = $uploadPathThumbnail.$name;
        Image::make($productImage)->resize(360,360)->save($imageUrl);
        Image::make($productImage)->resize(100,100)->save($imageThumbnailUrl);*/


        if($request->hasFile('productImage')){
            $multiImage = $request->file('productImage');
            $imageSerial = 1;
            foreach ($multiImage as $m){
              $name    = $m->getClientOriginalName();
              $uploadPath = 'productImage/';
              $uploadPathThumbnail = 'product-thumbnail-image/';
    		  $imageName = time().$name;
              $imageUrl = $uploadPath.$imageName;
              $imageThumbnailUrl = $uploadPathThumbnail.$imageName;
              Image::make($m)->resize(360,360)->save($imageUrl);
              Image::make($m)->resize(100,100)->save($imageThumbnailUrl);
    
    
              $image = new ProductImage();
    
    
              $image->productImage = $imageName;
              $image->productId = $productId;
              $image->createdBy = auth()->user()->id;
              $image->image_serial = $imageSerial;
              $image->save();
              $imageSerial++;
    
            }
        }

        // commitTransaction();
        return redirect('/products/view')->with('message', 'Products save secessfully');
      }

      public function productEdit($id) {

      $productById = DB::table('tbl_products')
        ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
        ->select('tbl_products.id', 'tbl_products.productName','tbl_products.productImage', 'tbl_products.status','tbl_category.categoryName')
        ->where('tbl_products.id', $id)
        ->first();
      $productImages = ProductImage::where('productId',$id)->get();
        return view('admin.home.products.manageProduct', ['productById' => $productById,'productImages' => $productImages]);
      }

      // public function deleteProductImage($id){
      //   $productImage = ProductImage::find($id);
      //   unlink($productImage->productImage);
      //   $productImage->delete();
      //   return redirect()->back()->with('message','Image Deleted Successfully');
      // }
      public function deleteProductSpec($id){
        $spec = productSpecification::find($id);
        $spec->deleted='Yes';
        $spec->deletedBy =auth()->user()->id;
        $spec->deletedDate =Carbon::now();
        $spec->save();
        return redirect()->back()->with('message','Image Deleted Successfully');
      }

      public function productUpdate(Request $request) {
      
      if($request->hasFile('productImage')){
        $productimg = $request->file('productImage');
       $name = $productimg->getClientOriginalName();
       $uploadPath = 'website\images\products';
         $imageUrl = $uploadPath.$name;
       $imageName = time().$name;
       Image::make($productimg)->resize(360,360)->save($imageUrl);
      
        $productimg->move($uploadPath, $imageName);
      }
    
    $image = new ProductImage();
    $image->productImage=$imageName;
    $image->productId = $request->id;
    $image->createdBy = auth()->user()->id;
    $image->created_date = date('Y-m-d');
    $image->save();

    return back()->with('message', 'Product updated successfully');

  }

     

      private function imageExitStatus($request) {
         
        $productById = product::where('id', $request->id)->first();
      
        $productImage = $request->file('Productimage');
      
        if ($productImage) {
          if($productImage!='no_image.png'){
              
          }else{  
            unlink('productImage/' . $productById->productImage);
          }
          
            $name = $productImage->getClientOriginalName();
            $uploadPath = 'productImage/';
            $uploadPathThumbnail = 'product-thumbnail-image/';
            $imageName = time().$name;
            $imageUrl = $imageName;
            $imageUrl1 = $uploadPath.$imageName;
            $imageThumbnailUrl1 = $uploadPathThumbnail.$imageName;
            Image::make($productImage)->resize(360,360)->save($imageUrl1);
            Image::make($productImage)->resize(100,100)->save($imageThumbnailUrl1);
          
          
        } else {
          $imageUrl = $productById->productImage;
        }
        return $imageUrl;
      }

      public function productDelete($id) {
        $products = product:: find($id);
        $products->deleted = 'Yes';
        $products->deletedBy = auth()->user()->id;
        $products->deletedDate = date('Y-m-d H:i:s');
        $products->save();
        return redirect('/products/view/')->with('message', 'Products deleted secessfully');
      }

      public function productViewProfile($id) {

        $productById = DB::table('products')
        ->join('categories', 'products.tbl_categoryId', '=', 'categories.id')
        ->join('sub_categories', 'products.tbl_subCategoryId', '=', 'sub_categories.id')
        ->join('manufacturers', 'products.tbl_manufacturerId', '=', 'manufacturers.id')
        ->select('products.id', 'products.tbl_subCategoryId', 'products.productName', 'products.amount', 'products.productQuantity', 'products.productShortDescription', 'products.productLongDescription', 'products.productImage', 'products.productStatus', 'products.tbl_categoryId', 'categories.categoryName', 'products.tbl_manufacturerId', 'manufacturers.manufacturerName')
        ->where('products.id', $id)
        ->first();
        return view('admin.home.products.productsViewProfile', ['productById' => $productById]);
      }

      /* Categegory Wise products*/
      public function productCategoryWiseView($categoryName){
        return view('frontEnd.home.productsCategory',['categoryName'=>$categoryName]);
      }

    }
