<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\product;
use App\banner;
use App\Models\BrandOffer;
use App\Models\ShopSetting;
use App\Models\WebsiteOrder;
use App\Models\WebsiteOrderDetails;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
      public function index(){
        $banners = banner::where('banners.deleted', '=', 'No')
                ->where('banners.status', '=', 'Active')
                ->where('banner_type','Homepage')
                ->get();
       $topThreeBrands= BrandOffer::select('brand_offers.*')
                        ->where('brand_offers.offer_type','Brand')
                        ->where('brand_offers.deleted','No')
                        ->where('brand_offers.status','Active')
                        ->orderBy('brand_offers.priority','asc')
                        ->get();
        return view('ecomas.pages.homepage',['banners'=>$banners,'topThreeBrands'=>$topThreeBrands]);
      }
    
      public function aboutus(){
        return view('website.pages.aboutus');
      }
      public function contactus(){
        return view('ecomas.pages.contactus');
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
        return view('ecomas.pages.blog',['blogs'=>$blogs]);
      }

      public function shopData(){
        $shopBanners=banner::where('banners.status', '=', 'Active')
                      ->where('banner_type','=','Shop')
                      ->get();
        return view('ecomas.pages.shop',['shopBanners'=>$shopBanners]);
      }


      public function blog_grid(){
        return view('website.pages.blog_grid');
      }
      public function blog_list(){
        return view('website.pages.blog_list');
      }
      public function blog_left_sidebar(){
        return view('ecomas.pages.blog');
      }
      public function post(){
        return view('website.pages.post');
      }

      public function post_without_sidebar(){
        return view('website.pages.post_without_sidebar');
      }
      public function termscondition(){
        return view('ecomas.pages.terms-conditions');
      }
      public function privacyPolicy(){
        return view('ecomas.pages.privacy-policy');
      }
      public function faq(){
        return view('ecomas.pages.faq');
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


      // public function productDetails($id){
      //  $product=product::leftjoin('tbl_brands','tbl_brands.id','=','tbl_products.tbl_brandsId')
      //                     ->leftjoin('tbl_category','tbl_category.id','=','tbl_products.categoryId')
      //             ->select('tbl_products.*','tbl_brands.*','tbl_category.*')
      //             ->where('tbl_products.id','=',$id)
      //             ->where('tbl_category.deleted','=','No' )
      //             ->where('tbl_brands.deleted','=','No')
      //             ->where('tbl_products.deleted','=','No')
      //             ->where('tbl_category.status','=','Active' )
      //             ->where('tbl_brands.status','=','Active')
      //             ->where('tbl_products.status','=','Active')
      //             ->first();
                  
      //   $productspech = DB::table('tbl_productspecification')
      //             ->select(columns: 'tbl_productspecification.*')
      //             ->where('tbl_productspecification.tbl_productsId', '=', $id) 
      //             ->where('tbl_productspecification.deleted', '=', 'No')
      //             ->get();

      //   $productimages= DB::table('product_images')
      //   ->select('product_images.productImage')
      //   ->where('product_images.productId', '=', $id) 
      //   ->where('product_images.deleted', '=', 'No')
      //   ->where('product_images.status', '=', 'Active')
      //   ->get();
      //   $categoryId=$product->categoryId;
    
      //   $RelatedProducts = DB::table('tbl_products')
      //         ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
      //         ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
      //         ->whereIn('tbl_products.id', function ($query) use ($categoryId) {
      //           $query->select('tbl_product_id')
      //             ->distinct()
      //             ->from('tbl_print_book_product')
      //             ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
      //             ->where('tbl_printbook_category.is_website', 'Yes')
      //             ->where('tbl_printbook_category.tbl_category_id',$categoryId);
      //         })
      //         ->where('tbl_products.deleted', 'No')
      //         ->where('tbl_products.status', 'Active')
      //         ->select(
      //           'tbl_products.id',
      //           'tbl_products.productCode',
      //           'tbl_products.productName',
      //           'tbl_products.maxSalePrice',
      //           'tbl_products.productImage',
      //           'tbl_products.modelNo',
      //           'tbl_products.productDescriptions',
      //           'tbl_brands.brandName',
      //           'tbl_brands.brand_logo',
      //           'tbl_category.categoryName',
      //           DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
      //         )
      //         ->orderBy('random_number', 'desc')
      //         ->take(30)
      //         ->get();

      //   return view('website.pages.products',['product'=>$product,'productspech'=>$productspech,'productimages'=>$productimages,'categoryWiseProducts'=>$categoryWiseProducts]);
      // }


      public function productDetails($id)
      {
        $product = Product::with(['brand', 'category', 'specifications', 'images'])
              ->where('id', $id)
              ->where('deleted', 'No')
              ->whereHas('category', function ($query) {
                  $query->where('deleted', 'No')->where('status', 'Active');
              })
              ->whereHas('brand', function ($query) {
                  $query->where('deleted', 'No')->where('status', 'Active');
              })
              ->where('status', 'Active')
              ->firstOrFail();

          $categoryId = $product->categoryId;

          $relatedProducts = Product::with(['brand', 'category'])
              ->whereHas('printBookProduct.printBookCategory', function ($query) use ($categoryId) {
                  $query->where('tbl_category_id', $categoryId)
                      ->where('is_website', 'Yes');
              })
              ->where('deleted', 'No')
              ->where('status', 'Active')
              ->select(
                  'id',
                  'productCode',
                  'productName',
                  'maxSalePrice',
                  'productImage',
                  'modelNo',
                  'productDescriptions',
                  'tbl_brandsId',
                  'categoryId',
                  DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
              )
              ->orderBy('random_number', 'desc')
              ->take(30)
              ->get();

          $data=array(
              'product' => $product,
              'productspecs' => $product->specifications,
              'productimages' => $product->images,
              'relatedProducts' => $relatedProducts
          );
          return $data;
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
            $categoryWiseProducts = Product::select('tbl_products.*', DB::raw('FLOOR(1 + (RAND() * 100)) as random_number'))
                                  ->with([
                                      'brand:id,brandName,brand_logo',
                                      'category:id,categoryName',
                                      'printBookProduct.printBookCategory' => function ($query) use ($id) {
                                          $query->where('is_website', 'Yes')
                                                ->where('tbl_category_id', $id);
                                      }
                                  ])
                                  ->where('deleted', 'No')
                                  ->where('status', 'Active')
                                  ->where('tbl_products.categoryId',$id)
                                  ->whereHas('printBookProduct.printBookCategory', function ($query) use ($id) {
                                      $query->where('is_website', 'Yes')
                                            ->where('tbl_category_id', $id);
                                  })
                                  ->orderByRaw('RAND()')
                                  ->paginate(56);
              $categoryBanners=banner::where('banners.deleted', '=', 'No')
                              ->where('banners.status', '=', 'Active')
                              ->where('banner_type','=','Category')
                              ->where('category_id',$id)
                              ->get();
              $subCategories=SubCategory::where('category_id',$id)->where('deleted','No')->get();
          return view('ecomas.pages.shop', ['categoryWiseProducts' => $categoryWiseProducts,'categoryBanners'=>$categoryBanners,'subCategories'=>$subCategories]);
      }




    public function subCategoryWiseProduct($sub_category_id,$category_id){
               $categoryWiseProducts =  Product::select('tbl_products.*', DB::raw('FLOOR(1 + (RAND() * 100)) as random_number'))
                          ->with([
                              'category', 
                              'subcategory', 
                              'brand'
                          ])->where('categoryId', $category_id)
                            ->where('sub_category_id', $sub_category_id)
                            ->where('deleted', 'No')
                            ->where('status', 'Active')
                            ->orderBy('random_number', 'desc')
                            ->paginate(56);
                          
              $categoryBanners=banner::where('banners.deleted', '=', 'No')
                              ->where('banners.status', '=', 'Active')
                              ->where('banner_type','=','Category')
                              ->where('category_id',$category_id)
                              ->get();
              $subCategories=SubCategory::where('category_id',$category_id)->where('deleted','No')->get();
          return view('ecomas.pages.shop', ['categoryWiseProducts' => $categoryWiseProducts,'categoryBanners'=>$categoryBanners,'subCategories'=>$subCategories]);
          
    }

    public function viewbrandproduct($id){
        
        
          $brandWiseProducts = Product::select('tbl_products.*', DB::raw('FLOOR(1 + (RAND() * 100)) as random_number'))
                      ->with([
                          'brand:id,brandName,brand_logo',
                          'category:id,categoryName',
                          'printBookProduct.printBookCategory' => function ($query) use ($id) {
                              $query->where('is_website', 'Yes')
                                    ->where('tbl_brand_id', $id);
                          }
                      ])
                      ->where('deleted', 'No')
                      ->where('status', 'Active')
                      ->where('tbl_products.tbl_brandsId',$id)
                      ->whereHas('printBookProduct.printBookCategory', function ($query) use ($id) {
                          $query->where('is_website', 'Yes')
                                ->where('tbl_brand_id', $id);
                      })
                      ->orderByRaw('RAND()')
                      ->paginate(56);
        $brandBanners=banner::where('banners.deleted', '=', 'No')
                      ->where('banners.status', '=', 'Active')
                      ->where('banner_type','=','Brand')
                      ->where('brand_id',$id)
                      ->get();

      return view('ecomas.pages.shop', ['brandWiseProducts' => $brandWiseProducts,'brandBanners'=>$brandBanners]);

      }



      public function addToCart(Request $request){
        $data = '';
        $productId = null;
        $product_type = '';
        $cartCount=0;
        //return Session::forget('cart_array');
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
              'product_model'             =>     $productInfo->modelNo,
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
            'product_model'             =>     $productInfo->modelNo,
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

        $cartCount=0;
        if (Session::get('cart_array') != null) {

        $cart='<table class="cart__table cart-table">
                    <thead class="cart-table__head">
                        <tr class="cart-table__row  container">
                            <th class="text-center" width="30%">Image</th>
                            <th class="text-center" width="50%">Product</th>
                            <th class="text-center" width="10%">Quantity</th>
                            <th  class="text-center" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body">';
          $i = 1;
          $product_image='';
          foreach (Session::get('cart_array') as $keys => $values) {
            $productId = Session::get("cart_array")[$keys]["product_id"];
            $product_image ='<img class="img-fluid" src=" '.$settings->erp_baseurl.'/images/products/thumb/'.Session::get("cart_array")[$keys]["product_image"] .'" alt="">';
            $product_name=Session::get("cart_array")[$keys]["product_name"];
            $product_model=Session::get("cart_array")[$keys]["product_model"];
            $product_quantity=Session::get("cart_array")[$keys]["product_quantity"];
            $cart .= '<tr class="cart-table__row">
                          <td class="p-1" width="15%">
                            <input type="hidden" name="ids[]" id="id_' . $productId .  '" value="' . $productId . '" />
                            '.$product_image.'
                          </td>
                          <td class="p-1" width="35%">
                            '.$product_name.'<br> '.$product_model.' 
                          </td>
                          <td  width="18%">
                              <input type="text" class="form-control text-center" style="width:80%;" id="quantity_' . $productId .  '" name="quantity[]" onkeyup="updateCart(' . $productId .')"  value="' . $product_quantity . '" />
                          </td>
                          <td  width="2%">
                            <button type="button" class="btn btn-light btn-sm btn-svg-icon" onclick="deleteCart(' . $productId  . ')">
                              <i class="fa fa-trash text-danger"> </i>
                            </button></td>
                      </tr>';
              }
              $cart .='</tbody>
                </table>';
                $cartCount=count(Session::get("cart_array"));
          }else{
            $cart .= '<h5 class="text-danger">Cart is Empty!</h5>';
          }
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



    public function checkOutCart(Request $request){
      //return $request;
      $request->validate([
      'name' => 'required|max:255|regex:/^([a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+\s)*[a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+$/u',
      'mobile' =>'required|min:11|max:14|regex:/^([0-9\+]*)$/',
      'address' => 'nullable|max:1000|regex:/^([a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+\s)*[a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+$/u',
      'email' => 'nullable|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
      'note' => 'nullable|max:1000|regex:/^([a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+\s)*[a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+$/u'
    ]);
    
    if(Session::get("cart_array")){
        DB::beginTransaction();
        try {
          $orderNo = WebsiteOrder::max('order_no');
          $orderNo++;
          $orderNo = str_pad($orderNo, 6, '0', STR_PAD_LEFT);
          $order = new WebsiteOrder();
          $order->order_no=$orderNo;
          $order->name=$request->name;
          $order->mobile=$request->mobile;
          $order->email=$request->email;
          $order->address=$request->address;
          $order->note=$request->note;
          $order->order_datetime=date('Y-m-d h:i:s');
          $order->status='Pending';
          $order->deleted='No';
          $order->save();
          $orderId=$order->id;
          
          foreach (Session::get("cart_array") as $keys => $values) {
            $product_id = Session::get("cart_array")[$keys]["product_id"];
            $quantity = Session::get("cart_array")[$keys]["product_quantity"];
            
            $orderDetails = new WebsiteOrderDetails();
            $orderDetails->order_id = $orderId;
            $orderDetails->product_id = $product_id;
            $orderDetails->quantity = $quantity;
            $orderDetails->status = 'Pending';
            $orderDetails->deleted='No';
            $orderDetails->order_datetime=date('Y-m-d h:i:s');
            $orderDetails->save();
          }

          Session::forget('cart_array');
          $data = "Success";
              DB::commit();
          return response()->json(['data' => $data]);
        } catch (Exception $e) {
          DB::rollBack();
          return response()->json(['error' => 'Order rollBack!']);
        }
    }else{
        $data = "Empty";
        return response()->json(['data' => $data]);
    }
          
  }




  



  public function getSuggestions(Request $request)
      {
          $searchTerm = $request->input('search');
          $settings = ShopSetting::where('status', 'Active')->where('deleted', 'No')->first();

          if ($searchTerm) {
              $products = Product::with(['brand', 'category'])
                  ->where('deleted', 'No')
                  //->where('is_website','Yes')
                  ->whereHas('brand', function ($query) {
                      $query->where('deleted', 'No');
                  })
                  ->whereHas('category', function ($query) {
                      $query->where('deleted', 'No');
                  })
                  ->where(function ($query) use ($searchTerm) {
                      $query->where('productName', 'like', "%$searchTerm%")
                            ->orWhereHas('brand', function ($q) use ($searchTerm) {
                                $q->where('brandName', 'like', "%$searchTerm%");
                            })
                            ->orWhereHas('category', function ($q) use ($searchTerm) {
                                $q->where('categoryName', 'like', "%$searchTerm%");
                            });
                  })
                  ->orderBy('id', 'desc')
                  ->limit(40)
                  ->get();

              $html = '';
              foreach ($products as $product) {
                  // $imgUrl = $settings->erp_baseurl . '/images/products/big_product_img/' . $product->productImage;
                  $defaultImage = asset('ecomas/images/products/noimage.jpg');
                  $imgUrl = !empty($product->productImage) ? $settings->erp_baseurl . '/images/products/big_product_img/' . $product->productImage : $defaultImage;
                  $html .= '<div class="tf-loop-item">
                              <div class="image">
                                  <a href="#" onclick="productDetails(' . $product->id . ')">
                                      <img src="' .  $imgUrl  . '" alt="' . $product->productName . '">
                                  </a>
                              </div>
                              <div class="content">
                                  <a href="#" onclick="productDetails(' . $product->id . ')">' . $product->productName . ' - ' . $product->modelNo . '</a>
                                  <div class="tf-product-info-price">
                                      <div class="price-on-sale fw-6">' . $product->brand->brandName . '</div>
                                  </div>
                              </div>
                          </div>';
              }

              return response()->json([
                  'found' => count($products) > 0 ? 'Yes' : 'No',
                  'html' => $html
              ]);
          }
      }


    public function search(Request $request){
      $searchTerm = $request->input('search');
        if ($searchTerm) {
          $products = DB::table('tbl_products')
              ->select('tbl_products.*','tbl_brands.brandName','tbl_category.categoryName')
              ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
              ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
              ->distinct()
              ->where('tbl_products.deleted', 'No')
              ->where('tbl_brands.deleted', 'No')
              ->where('tbl_category.deleted', 'No')
              ->where(function ($query) use ($searchTerm) {
                  $query->where('tbl_products.productName', 'like', "%$searchTerm%")
                        ->orWhere('tbl_brands.brandName', 'like', "%$searchTerm%")
                        ->orWhere('tbl_category.categoryName', 'like', "%$searchTerm%");
              })
              ->orderBy('tbl_products.id', 'desc')
              ->paginate(100);
        }else{
          $products = DB::table('tbl_products')
              ->select('tbl_products.*',
                        'tbl_brands.brandName',
                        'tbl_category.categoryName',
                        DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
              )
              ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
              ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
              ->distinct()
              ->where('tbl_products.deleted', 'No')
              ->where('tbl_brands.deleted', 'No')
              ->where('tbl_category.deleted', 'No')
              ->orderBy('random_number', 'desc')
              ->paginate(100);
        }
        return view('website.pages.searchPage', ['searchProducts' => $products]);
    }






}
