<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use App\product;
use App\masterOffer;
use App\productSpecialOffer;
use App\subCategory;
use App\Models\ShopSetting;
use Illuminate\Support\Facades\Session;
use App\productspecification;
use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //View::share('name','shoaib'); /* global view share*/

        /* start Menue pass in specefic page */
        View::composer('frontEnd.includes.menue', function($view) {
            $shopSetting = ShopSetting::first();
            // if (Session::get("currency") == null) {
            //     session()->put('currency', $shopSetting->currency);
            // }
            $menu_data = '';
            $publishCategries = Category::where('status', 'Active')->where('deleted', 'No')->get();
            // foreach ($publishCategries as $publishCategry) {
            //     $publishSubCategories = subCategory::where(['tbl_categoryId' => $publishCategry->id, 'status' => 'Active', 'deleted' => 'No'])->get();
            //     $menu_data .= "<li class='sub-menu'><a href='#'>$publishCategry->categoryName<span class='caret'></span></a>
            //     <ul>  
            //     ";
            //     /* foreach($publishSubCategories as $publishSubCategory){
            //       $menu_data .= "<li>
            //       <a href='".url("/categoryView/".$publishSubCategory->subCategoryName)."'>$publishSubCategory->subCategoryName</a>
            //       </li>";
            //       } */
            //     $menu_data .="</ul>
            //     </li>";
            // }
            $view->with(['publishCategries' => $publishCategries, 'shopSetting' => $shopSetting]);
        });
        /* End local value pass in specefic page */


        /* start Menue pass in specefic page */
        View::composer('frontEnd.home.bannerLeftCategory', function($view) {
            $menu_data = '';
            $publishCategries = Category::where('categoryStatus', 'Available')->where('deleted', 'No')->take(10)->get();
            foreach ($publishCategries as $publishCategry) {
                $publishSubCategories = subCategory::where(['tbl_categoryId' => $publishCategry->id, 'status' => 'Active', 'deleted' => 'No'])->get();
                $menu_data .= "<li class='sub-menu'><a href='#'>$publishCategry->categoryName<span class='caret'></span></a>
                <ul>";
                $menu_data .= "<li class='sub-menu alitechMenue'>
                        <a href='" . url("/catProducts/" . $publishCategry->categoryName) . "'> All Products</a>
                    </li>";
                foreach ($publishSubCategories as $publishSubCategory) {
                    $menu_data .= "<li class='sub-menu alitechMenue'>
                        <a href='" . url("/sCatProducts/" . $publishSubCategory->subCategoryName) . "'> $publishSubCategory->subCategoryName</a> 
                    </li>";
                }
                $menu_data .="</ul>
                </li>";
            }
            $view->with(['publishMenues' => $menu_data, 'publishCategries' => $publishCategries]);
        });
        
        
        /* start Menue pass in specefic page */
        View::composer('frontEnd.home.topLeftCategory', function($view) {
            $menu_data = '';
            $publishCategries = Category::where('categoryStatus', 'Available')->where('deleted', 'No')->take(10)->get();
            foreach ($publishCategries as $publishCategry) {
                $publishSubCategories = subCategory::where(['tbl_categoryId' => $publishCategry->id, 'status' => 'Active', 'deleted' => 'No'])->get();
                $menu_data .= "<li class='sub-menu'><a href='#'>$publishCategry->categoryName<span class='caret'></span></a>
                <ul>";
                $menu_data .= "<li class='sub-menu alitechMenue'>
                        <a href='" . url("/catProducts/" . $publishCategry->categoryName) . "'> All Products</a>
                    </li>";
                foreach ($publishSubCategories as $publishSubCategory) {
                    $menu_data .= "<li class='sub-menu alitechMenue'>
                        <a href='" . url("/sCatProducts/" . $publishSubCategory->subCategoryName) . "'> $publishSubCategory->subCategoryName</a> 
                    </li>";
                }
                $menu_data .="</ul>
                </li>";
            }
            $view->with(['publishMenues' => $menu_data, 'publishCategries' => $publishCategries]);
        });
        
        
        /* start Menue pass in specefic page */
        View::composer('frontEnd.home.topMainCategory', function($view) {
            $menu_data = '';
            $publishCategries = Category::where('categoryStatus', 'Available')->where('deleted', 'No')->take(10)->get();
            foreach ($publishCategries as $publishCategry) {
                $publishSubCategories = subCategory::where(['tbl_categoryId' => $publishCategry->id, 'status' => 'Active', 'deleted' => 'No'])->get();
                $menu_data .= "<li class='liTopKey'><a href='" . url("/catProducts/" . $publishCategry->categoryName) . "'>$publishCategry->categoryName</a></li>";
            }
            $view->with(['publishMinCategory' => $menu_data, 'publishCategries' => $publishCategries]);
        });
        
        /* End local value pass in specefic page */

        /* Banner Offer view in frontEnd page */
        View::composer('frontEnd.home.banner', function($view) {
            $banners = DB::table('banners')
                    ->select('banners.id', 'banners.bannerImage', 'banners.carousal_caption_description')
                    ->where('banners.status', '=', 'Active')
                    ->where('banners.deleted', '=', 'No')
                    ->get();
            $view->with('fronEndTopBanners', $banners);
        });
        /* End Banner Offer view in frontEnd page */


        /* Brand view in frontEnd page */
        View::composer('frontEnd.home.brands', function($view) {

            $brands = DB::table('manufacturers')
                    ->select('manufacturers.*')
                    ->where('manufacturers.deleted', '=', 'No')
                    ->get();
            $view->with('brands', $brands);
        });
        /* End Brand view in frontEnd page */


        /* Hot Offer view in frontEnd page */
        View::composer('frontEnd.home.hotOffers', function($view) {

            $products = DB::table('products')
                    ->join('product_hot_offers', 'product_hot_offers.tbl_productId', '=', 'products.id')
                    ->select('products.*', 'product_hot_offers.offerPrice')
                    ->where('products.availability', '!=', 'off')
                    ->where('products.deleted', '=', 'No')
                    ->get();
            $view->with('products', $products);
        });
        /* End Hot Offer view in frontEnd page */



        /* Banner Offer view in frontEnd page */
        View::composer('frontEnd.home.topProducts2', function($view) {

            $view->with('topProducts', product::where('is_top', 'on')->where('availability', '!=', 'off')->where('deleted', 'No')->get());
        });
        /* End Banner Offer view in frontEnd page */


        /* Banner Offer view in frontEnd page */
        View::composer('frontEnd.home.topProducts', function($view) {
            $fronEndTopProducts = DB::table('sub_categories')
                    ->leftJoin('products', 'products.tbl_subCategoryId', '=', 'sub_categories.id')
                    ->select('sub_categories.id', 'sub_categories.subCategoryName')
                    ->where('products.is_top', '=', 'on')
                    ->where('products.deleted', '=', 'No')
                    ->distinct()
                    ->take(7)
                    ->get();

            $topProducts = product::where('is_top', 'on')
                    ->where('availability', '!=', 'off')
                    ->where('deleted', '=', 'No')
                    ->get();

            foreach ($topProducts as $topProduct) {
                /* $specifications = productspecification::where('tbl_productsId','=',$topProduct->id)
                  ->where('deleted','=','No')
                  ->select('*')
                  ->get(); */
                $specifications = DB::table('productspecifications')
                        ->leftJoin('product_special_offers', function($join) {
                            $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
                            $join->on('product_special_offers.startDate', '<=', DB::raw("'" . date('Y-m-d') . "'"));
                            $join->on('product_special_offers.endDate', '>=', DB::raw("'" . date('Y-m-d') . "'"));
                        })
                        ->where('tbl_productsId', '=', $topProduct->id)
                        ->where('productspecifications.deleted', '=', 'No')
                        ->select('productspecifications.*', 'product_special_offers.offerPrice')
                        ->get();
                $topProduct->spec = $specifications;
            }
            $settings = ShopSetting::find(1);
            $view->with(['fronEndTopProducts' => $fronEndTopProducts, 'topProducts' => $topProducts, 'currency' => $settings->currency]);
        });



        /* Banner Offer view in frontEnd page */
        View::composer('frontEnd.home.bestSlidProducts', function($view) {

            /*$deals = DB::table('products')
                    ->where([['deleted', '=', 'No'], ['in_offer', '=', 'yes']])
                    ->select('products.*')
                    ->take(20)
                    ->get();*/
                    
            $deals = DB::table('products')
                    ->join('productspecifications','productspecifications.tbl_productsId','=','products.id')
                    ->join('product_special_offers', function($join) {
                            $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
                            $join->on('product_special_offers.startDate', '<=', DB::raw("'" . date('Y-m-d') . "'"));
                            $join->on('product_special_offers.endDate', '>=', DB::raw("'" . date('Y-m-d') . "'"));
                        })
                    ->where([['products.deleted', '=', 'No'], ['productspecifications.deleted', '=', 'No'], ['product_special_offers.deleted', '=', 'No']])
                    ->select('products.*','product_special_offers.offerPrice','productspecifications.specificationName','productspecifications.id as specId','productspecifications.specPrice')
                    ->take(20)
                    ->get();

            foreach ($deals as $deal) {
                /* $specifications = productspecification::where('tbl_productsId','=',$topProduct->id)
                  ->where('deleted','=','No')
                  ->select('*')
                  ->get(); */

                /*$specifications = DB::table('productspecifications')
                        ->leftJoin('product_special_offers', function($join) {
                            $join->on('productspecifications.id', '=', 'product_special_offers.product_spec_id');
                            $join->on('product_special_offers.startDate', '<=', DB::raw("'" . date('Y-m-d') . "'"));
                            $join->on('product_special_offers.endDate', '>=', DB::raw("'" . date('Y-m-d') . "'"));
                        })
                        ->where('tbl_productsId', '=', $deal->id)
                        ->where('productspecifications.deleted', '=', 'No')
                        ->select('productspecifications.*', 'product_special_offers.offerPrice')
                        ->get();
                $deal->spec = $specifications;*/
                $deal->id = $deal->id . 'd';
            }
            $settings = ShopSetting::find(1);
            $view->with(['deals' => $deals, 'currency' => $settings->currency]);
        });
        /* End Banner Offer view in frontEnd page */

        /* Special Offer pass in specefic page */
        /* View::composer('frontEnd.home.specialOffers',  function($view){
          $productSpecialOffer = DB::table('product_special_offers')
          ->join('products', 'products.id', '=', 'product_special_offers.tbl_productId')
          ->join('master_offers','master_offers.id','=','product_special_offers.tbl_masterOfferId')
          ->select('product_special_offers.id','product_special_offers.status','products.productName','products.amount','products.productImage','product_special_offers.tbl_productId','master_offers.master_offerName','product_special_offers.offerPrice','product_special_offers.startDate','product_special_offers.endDate','product_special_offers.created_at')
          ->where('product_special_offers.status','=','Active')
          ->where('master_offers.master_offerName','=','Special Offer')
          ->get();
          $view->with('productSpecialOffer',$productSpecialOffer);

          }); */
        /* Special Offer pass in specefic page */
    

    }
}
