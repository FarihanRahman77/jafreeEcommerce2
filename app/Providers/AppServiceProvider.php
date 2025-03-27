<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use View;
use Illuminate\Support\Facades\View;
use App\Category;
use App\product;
use App\Brand;
use App\masterOffer;
use App\productSpecialOffer;
use App\subCategory;
use App\Models\ShopSetting;
use App\Models\BrandOffer;
use Illuminate\Support\Facades\Session;
use App\productspecification;
use Illuminate\Pagination\Paginator;
use DB;
use App\Models\Content;


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
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $settings = ShopSetting::where('status', 'Active')->where('deleted', 'No')->first();
            
            $categories = Category::select('id', 'categoryName', 'status', 'createdDate', 'logo', 'image')
                    ->with(['subCategories:id,category_id,name']) 
                    ->where('deleted', 'No')
                    ->where('is_website', 'Yes')
                    ->whereHas('printBookCategories', function ($query) {
                        $query->where('is_website', 'Yes')->where('deleted', 'No');
                    })
                    ->orderBy('categoryName', 'ASC')
                    ->get();


            $bigSpecialOffer=BrandOffer::where('status','Active')
                        ->where('offer_type','Special')
                        ->where('priority','1')
                        ->where('deleted','No')
                        ->first();
            $smallSpecialOffer1=BrandOffer::where('status','Active')
                        ->where('offer_type','Special')
                        ->where('priority','2')
                        ->where('deleted','No')
                        ->first();
            $smallSpecialOffer2=BrandOffer::where('status','Active')
                        ->where('offer_type','Special')
                        ->where('priority','3')
                        ->where('deleted','No')
                        ->first();
            // $brands = DB::table('tbl_printbook_category')
            //             ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
            //             ->select('tbl_brands.id', 'tbl_brands.brandName', 'tbl_brands.brand_logo', 'tbl_brands.is_agent', 'tbl_brands.status')
            //             ->where('tbl_printbook_category.is_website', 'Yes')
            //             ->where('tbl_printbook_category.deleted', 'No')
            //             ->where('tbl_brands.deleted', 'No')
            //             ->distinct()
            //             ->get();
            $brands = Brand::select('id', 'brandName', 'brand_logo', 'is_agent', 'status')
                        ->where('deleted', 'No')
                        ->whereHas('printBookCategories', function ($query) {
                            $query->where('is_website', 'Yes')
                                  ->where('deleted', 'No');
                        })
                        ->distinct()
                        ->get();    
            // $products = DB::table('tbl_print_book_product')
            //             ->select(
            //                 'tbl_products.*',
            //                 'tbl_print_book_product.is_featured',
            //                 'tbl_print_book_product.id as book_product_id',
            //                 'tbl_brands.brandName',
            //                 'tbl_brands.brand_logo',
            //                 'tbl_category.categoryName',
            //                 DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
            //             )
            //             ->distinct()
            //             ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
            //             ->join('tbl_printbook', 'tbl_printbook_category.tbl_printbook_id', '=', 'tbl_printbook.id')
            //             ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
            //             ->join('tbl_category', 'tbl_printbook_category.tbl_category_id', '=', 'tbl_category.id')
            //             ->join('tbl_products', 'tbl_print_book_product.tbl_product_id', '=', 'tbl_products.id')
            //             ->where('tbl_products.deleted', 'No')
            //             ->where('tbl_print_book_product.status', 'Active')
            //             ->where('tbl_print_book_product.deleted', 'No')
            //             ->where('tbl_printbook_category.is_website', 'Yes')
            //             ->where('tbl_printbook_category.status', 'Active')
            //             ->where('tbl_printbook_category.deleted', 'No')
            //             ->where('tbl_printbook.status', 'Active')
            //             ->where('tbl_printbook.deleted', 'No')
            //             ->orderBy('random_number', 'desc')
            //             ->paginate(56);

            $products = Product::with([
                'printBookProduct.printBookCategory.brand:id,brandName,brand_logo', 
                'printBookProduct.printBookCategory.category:id,categoryName', 
                'printBookProduct.printBookCategory.printBook:id,status,deleted'
            ])
            ->where('deleted', 'No')
            ->whereHas('printBookProduct', function ($query) {
                $query->where('status', 'Active')
                      ->where('deleted', 'No')
                      ->whereHas('printBookCategory', function ($query) {
                          $query->where('is_website', 'Yes')
                                ->where('status', 'Active')
                                ->where('deleted', 'No')
                                ->whereHas('printBook', function ($query) {
                                    $query->where('status', 'Active')
                                          ->where('deleted', 'No');
                                });
                      });
            })
            ->selectRaw('tbl_products.*, FLOOR(1 + (RAND() * 100)) as random_number')
            ->orderBy('random_number', 'desc')
            ->paginate(56);

            


            $latestproducts = DB::table('tbl_print_book_product')
                        ->select(
                            'tbl_products.*',
                            'tbl_print_book_product.is_featured',
                            'tbl_print_book_product.id as book_product_id',
                            'tbl_brands.brandName',
                            'tbl_brands.brand_logo',
                            'tbl_category.categoryName'
                        )
                        ->distinct()
                        ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
                        ->join('tbl_printbook', 'tbl_printbook_category.tbl_printbook_id', '=', 'tbl_printbook.id')
                        ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
                        ->join('tbl_category', 'tbl_printbook_category.tbl_category_id', '=', 'tbl_category.id')
                        ->join('tbl_products', 'tbl_print_book_product.tbl_product_id', '=', 'tbl_products.id')
                        ->where('tbl_products.deleted', 'No')
                        ->where('tbl_print_book_product.status', 'Active')
                        ->where('tbl_print_book_product.deleted', 'No')
                        ->where('tbl_printbook_category.is_website', 'Yes')
                        ->where('tbl_printbook_category.status', 'Active')
                        ->where('tbl_printbook_category.deleted', 'No')
                        ->where('tbl_printbook.status', 'Active')
                        ->where('tbl_printbook.deleted', 'No')
                        ->orderBy('tbl_products.id', 'desc')
                        ->take(6)
                        ->get();
                
            $importers = DB::table('tbl_printbook_category')
                        ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
                        ->select('tbl_brands.id', 'tbl_brands.brandName', 'tbl_brands.brand_logo', 'tbl_brands.is_importer')
                        ->where('tbl_printbook_category.is_website', 'Yes')
                        ->where('tbl_printbook_category.deleted', 'No')
                        ->distinct()
                        ->get();

            $featuredProducts = DB::table('tbl_print_book_product')
                        ->select(
                            'tbl_products.*',
                            'tbl_print_book_product.is_featured',
                            'tbl_print_book_product.id as book_product_id',
                            'tbl_brands.brandName',
                            'tbl_brands.brand_logo',
                            'tbl_category.categoryName'
                        )
                        ->join('tbl_products', 'tbl_print_book_product.tbl_product_id', '=', 'tbl_products.id')
                        ->join('tbl_printbook_category', 'tbl_print_book_product.tbl_print_book_category_id', '=', 'tbl_printbook_category.id')
                        ->join('tbl_printbook', 'tbl_printbook_category.tbl_printbook_id', '=', 'tbl_printbook.id')
                        ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
                        ->join('tbl_category', 'tbl_printbook_category.tbl_category_id', '=', 'tbl_category.id')
                        ->where('tbl_products.website_featured','=','Yes')
                        ->distinct()
                        ->where('tbl_products.deleted', 'No')
                        ->where('tbl_print_book_product.status', 'Active')
                        ->where('tbl_print_book_product.deleted', 'No')
                        ->where('tbl_printbook_category.status', 'Active')
                        ->where('tbl_printbook_category.deleted', 'No')
                        ->where('tbl_printbook.status', 'Active')
                        ->where('tbl_printbook.deleted', 'No')
                        ->orderBy('tbl_products.id', 'desc')
                        ->get();

            $bestSellingProducts = DB::table('tbl_products')
                        ->select(
                            'tbl_products.*',
                            'tbl_brands.brandName',
                            'tbl_brands.brand_logo',
                            'tbl_category.categoryName'
                        )
                        ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
                        ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
                        ->where('tbl_products.website_best_selling','=','Yes')
                        ->distinct()
                        ->where('tbl_products.deleted', 'No')
                        ->where('tbl_brands.deleted', 'No')
                        ->where('tbl_category.deleted', 'No')
                        ->orderBy('tbl_products.id', 'desc')
                        ->get();

            $newArrivalProducts = DB::table('tbl_products')
                        ->select(
                            'tbl_products.*',
                            'tbl_brands.brandName',
                            'tbl_brands.brand_logo',
                            'tbl_category.categoryName'
                        )
                        ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
                        ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
                        ->where('tbl_products.website_new_arrival','=','Yes')
                        ->distinct()
                        ->where('tbl_products.deleted', 'No')
                        ->where('tbl_brands.deleted', 'No')
                        ->where('tbl_category.deleted', 'No')
                        ->orderBy('tbl_products.id', 'desc')
                        ->get();
            $topRatedProducts = DB::table('tbl_products')
                        ->select(
                            'tbl_products.*',
                            'tbl_brands.brandName',
                            'tbl_brands.brand_logo',
                            'tbl_category.categoryName'
                        )
                        ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
                        ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
                        ->where('tbl_products.website_toprated','=','Yes')
                        ->distinct()
                        ->where('tbl_products.deleted', 'No')
                        ->where('tbl_brands.deleted', 'No')
                        ->where('tbl_category.deleted', 'No')
                        ->orderBy('tbl_products.id', 'desc')
                        ->get();            
            $threeTopRatedProducts = DB::table('tbl_products')
                        ->select(
                            'tbl_products.*',
                            'tbl_brands.brandName',
                            'tbl_brands.brand_logo',
                            'tbl_category.categoryName'
                        )
                        ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
                        ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
                        ->where('tbl_products.website_toprated','=','Yes')
                        ->distinct()
                        ->where('tbl_products.deleted', 'No')
                        ->where('tbl_brands.deleted', 'No')
                        ->where('tbl_category.deleted', 'No')
                        ->orderBy('tbl_products.id', 'desc')
                        ->take('3')
                        ->get();
            $specialOfferProducts = DB::table('tbl_products')
                        ->select(
                            'tbl_products.*',
                            'tbl_brands.brandName',
                            'tbl_brands.brand_logo',
                            'tbl_category.categoryName'
                        )
                        ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
                        ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
                        ->where('tbl_products.website_special_offer','=','Yes')
                        ->distinct()
                        ->where('tbl_products.deleted', 'No')
                        ->where('tbl_brands.deleted', 'No')
                        ->where('tbl_category.deleted', 'No')
                        ->orderBy('tbl_products.id', 'desc')
                        ->get();
                
            $blogs = Content::orderBy('sequence', 'asc')->where('deleted', 'No')->where('status', 'On')->get();

            $view->with([
                'settings' => $settings, 
                'categories' => $categories, 
                'brands' => $brands, 
                'products' => $products,
                'importers'=>$importers,
                'latestproducts'=>$latestproducts,
                'featuredProducts'=>$featuredProducts,
                'bestSellingProducts'=>$bestSellingProducts,
                'newArrivalProducts'=>$newArrivalProducts,
                'topRatedProducts'=>$topRatedProducts,
                'specialOfferProducts'=>$specialOfferProducts,
                'threeTopRatedProducts'=>$threeTopRatedProducts,
                'bigSpecialOffer'=>$bigSpecialOffer,
                'smallSpecialOffer1'=>$smallSpecialOffer1,
                'smallSpecialOffer2'=>$smallSpecialOffer2,
                'blogs'=>$blogs
            ]);
        });
    }
}
