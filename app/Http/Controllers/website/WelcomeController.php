<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\product;
use App\banner;
use App\Models\ShopSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function Index(){
      $banners = banner::where('banners.deleted', '=', 'No')
                ->where('banners.status', '=', 'Active')
                ->get();
        return view('website.pages.home',['banners'=>$banners]);
      }
    
      public function aboutus(){
        return view('website.pages.aboutus');
      }
      public function contactus(){
        return view('website.pages.contactus');
      }
      public function tractorder(){
        return view('website.pages.tractorder');
      }
      public function blog_classic(){
        $blogs =  DB::table('contents')
        ->select(columns: 'contents.*')
        ->where('contents.deleted', '=', 'No')
        ->where('contents.status', '=', 'On')
        ->get();
      
        return view('website.pages.blog_classic',['blogs'=>$blogs]);
      }
      public function blog_grid(){
        return view('website.pages.blog_grid');
      }
      public function blog_list(){
        return view('website.pages.blog_list');
      }
      public function blog_left_sidebar(){
        return view('website.pages.blog_left_sidebar');
      }
      public function post(){
        return view('website.pages.post');
      }

      public function post_without_sidebar(){
        return view('website.pages.post_without_sidebar');
      }
      public function termscondition(){
        return view('website.pages.termscondition');
      }
      public function faq(){
        return view('website.pages.faq');
      }
      public function login_register(){
        return view('website.pages.account');
      }
      public function shop_grid_3_columns_sidebar(){
        return view('website.pages.shop_grid_3_columns_sidebar');
      }
      public function shop_grid_4_column_full(){
        return view('website.pages.shop_grid_4_column_full');
      }
      public function shop_grid_5_column(){
        return view('website.pages.shop_grid_5_column');
      }
      public function productDetails($id){
       $product=product::leftjoin('tbl_brands','tbl_brands.id','=','tbl_products.tbl_brandsId')
                          ->leftjoin('tbl_category','tbl_category.id','=','tbl_products.categoryId')
                  ->select('tbl_products.*','tbl_brands.*','tbl_category.*')
                  ->where('tbl_products.id','=',$id)
                  ->where('tbl_category.deleted','=','No' )
                  ->where('tbl_brands.deleted','=','No')
                  ->where('tbl_products.deleted','=','No')
                  ->where('tbl_category.status','=','Active' )
                  ->where('tbl_brands.status','=','Active')
                  ->where('tbl_products.status','=','Active')
                  ->first();
        $productspech = DB::table('tbl_productspecification')
                  ->select(columns: 'tbl_productspecification.*')
                  ->where('tbl_productspecification.tbl_productsId', '=', $id) 
                  ->where('tbl_productspecification.deleted', '=', 'No')
                  ->get();

        $productimages= DB::table('product_images')
        ->select('product_images.productImage')
        ->where('product_images.productId', '=', $id) 
        ->where('product_images.deleted', '=', 'No')
        ->where('product_images.status', '=', 'Active')
        ->get();
        $categoryId=$product->categoryId;
    
        $categoryWiseProducts = DB::table('tbl_products')
              ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
              ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
              ->whereIn('tbl_products.id', function ($query) use ($categoryId) {
                $query->select('tbl_product_id')
                  ->distinct()
                  ->from('tbl_print_book_product')
                  ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
                  ->where('tbl_printbook_category.is_website', 'Yes')
                  ->where('tbl_printbook_category.tbl_category_id',$categoryId);
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
                'tbl_category.categoryName',
                DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
              )
              ->orderBy('random_number', 'desc')
              ->take(30)
              ->get();

        return view('website.pages.products',['product'=>$product,'productspech'=>$productspech,'productimages'=>$productimages,'categoryWiseProducts'=>$categoryWiseProducts]);
      }
      public function shoplist(){
        return view('website.pages.shoplist');
      }
      public function shop_right_side_bar(){
        return view('website.pages.shop_right_side_bar');
      }
      public function product_sidebar(){
        return view('website.pages.product_sidebar');
      }
      public function card(){
        return view('website.pages.card');
      }
      public function checkoutcard(){
        return view('website.pages.checkoutcard');
      }
      public function wishlist(){
        return view('website.pages.wishlist');
      }
      public function compare(){
        return view('website.pages.compare');
      }


   public function viewcategoryproduct($id){
        
    $categoryWiseProducts = DB::table('tbl_products')
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
      'tbl_category.categoryName',
      DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
    )
    ->orderBy('random_number', 'desc')
    ->paginate(54);


  return view('website.pages.shop_grid_3_columns_sidebar', ['categoryWiseProducts' => $categoryWiseProducts]);
      }

      public function viewbrandproduct($id){
        $brandWiseProducts = DB::table('tbl_products')
      
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
          'tbl_category.categoryName',
          DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
        )
        ->orderBy('random_number', 'desc')
        ->paginate(54);
  
  
      return view('website.pages.shop_grid_3_columns_sidebar', ['brandWiseProducts' => $brandWiseProducts]);
      }



      public function addToCart(Request $request){
        $data = '';
      $productId = null;
      $product_type = '';
      $cartCount=0;
      //Session::forget('cart_array');
      if (Session::get("cart_array") != null) {
        
        $is_available = 0;
        foreach (Session::get("cart_array") as $keys => $values) {
          if (Session::get("cart_array")[$keys]['product_id'] == $request->id ) {
            $is_available++;
            session()->put("cart_array." . $keys . ".product_quantity", Session::get("cart_array")[$keys]['product_quantity'] + $request->quantity);
            $productId = $request->id;
          }
        }  
        if ($is_available == 0) {
          $productInfo = product::where('status','Active')->where('id', $request->id)->first();
          $productId = $productInfo->id;
          $item_array = [
            'product_id'               =>     $productInfo->id,
            'product_name'             =>     $productInfo->productName,
            'product_image'             =>     $productInfo->productImage,
            'product_quantity'         =>     $request->quantity
            
          ];
          Session::push('cart_array', $item_array);
        }
      } else {
         $productInfo = product::where('status','Active')->where('id', $request->id)->first();
        $productId = $productInfo->id;
        $item_array = [
          'product_id'               =>     $productInfo->id,
          'product_name'             =>     $productInfo->productName,
          'product_image'             =>     $productInfo->productImage,
          'product_quantity'         =>     $request->quantity
        ];
        Session::push('cart_array', $item_array);
      }
    
      $data .= "Success";
      return response()->json(['data' => $data]);
    }
    
    public function fetchCart(){
        $grandTotal = 0;
        $cart = '';
        $settings = ShopSetting::where('status', 'Active')->where('deleted', 'No')->first();
        $cart='<table class="cart__table cart-table">
                    <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Sl</th>
                            <th class="cart-table__column cart-table__column--image">Image</th>
                            <th class="cart-table__column cart-table__column--product">Product</th>
                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body">';
                        
                      
        if (Session::get('cart_array') != null) {
          $i = 1;
          $product_image='';
          foreach (Session::get('cart_array') as $keys => $values) {
            
            $productId = Session::get("cart_array")[$keys]["product_id"];
            $product_image ='<img src=" '.$settings->erp_baseurl.'/images/products/thumb/'.Session::get("cart_array")[$keys]["product_image"] .'" alt="">';
            $product_name=Session::get("cart_array")[$keys]["product_name"];
            $product_quantity=Session::get("cart_array")[$keys]["product_quantity"];
            $cart .= '<tr class="cart-table__row">
                          <td class="cart-table__column cart-table__column--image">
                            ' . $i++ . '<input type="hidden" name="ids[]" id="id_' . $productId .  '" value="' . $productId . '" />
                          </td>
                          <td class="cart-table__column cart-table__column--image">
                            <a href="#">
                              '.$product_image.'
                            </a>
                          </td>
                          <td class="cart-table__column cart-table__column--product"><a href="#"
                                  class="cart-table__product-name">'.$product_name.'</a>
                              <ul class="cart-table__options  d-none">
                                  <li>Color: Yellow</li>
                                  <li>Material: Aluminium</li>
                              </ul>
                          </td>
                          <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                              <div class="input-number">
                              <input type="text" class="form-control text-center" style="width:80%;" id="quantity_' . $productId .  '" name="quantity[]" onkeyup="updateCart(' . $productId .')"  value="' . $product_quantity . '" />
                                  <div class="input-number__add d-none"></div>
                                  <div class="input-number__sub d-none"></div>
                              </div>
                          </td>
                          <td class="cart-table__column cart-table__column--remove">
                            <button type="button" class="btn btn-light btn-sm btn-svg-icon" onclick="deleteCart(' . $productId  . ')">
                              <i class="fa fa-trash text-danger"> </i>
                            </button></td>
                      </tr>';
            
          }
        }
        $cart .='</tbody>
            </table>';
            $cartCount=count(Session::get("cart_array"));
        $data = array(
          'cart' => $cart,
          'cartCount'=>$cartCount
        );
        return response()->json(['data' => $data]);
    }
    
    public function updateCart(Request $request){
      if (Session::get("cart_array") != null) {
        foreach (Session::get("cart_array") as $keys => $values) {
          if (Session::get("cart_array")[$keys]['product_id'] == $request->id) {
            session()->put("cart_array." . $keys . ".product_quantity", $request->quantity);
            $data = "Success";
          }
        }
      } else {
        $data = "";
      }
      return response()->json(['data' => $data]);
    }
    
    
    
    public function deleteCart(Request $request){
      $id = $request->id;
      $data = '';
      $cartData = Session::get('cart_array');
      foreach (Session::get("cart_array") as $keys => $values) {
        if (Session::get("cart_array")[$keys]['product_id'] == $id ) {
          unset($cartData[$keys]);
          Session::put('cart_array', $cartData);
          $data = "Success";
          break;
        }
      }
      $data = "Success";
      return response()->json(['data' => $data]);
    }
    public function clearCart(){
      Session::forget('cart_array');
      $data = "Success";
      return response()->json(['data' => $data]);
    }

}
