<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\product;
use App\banner;
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
        return view('website.pages.blog_classic');
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
}
