<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use View;
use Illuminate\Support\Facades\View;
use App\Category;
use App\product;
use App\masterOffer;
use App\productSpecialOffer;
use App\subCategory;
use App\Models\ShopSetting;
use Illuminate\Support\Facades\Session;
use App\productspecification;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $settings = ShopSetting::where('status', 'Active')->where('deleted', 'No')->first();

            $categories = Category::select(
                'tbl_category.id',
                'tbl_category.categoryName',
                'tbl_category.status',
                'tbl_category.createdDate',
                'tbl_category.logo',
                'tbl_category.image'
            )
                ->where('tbl_category.deleted', 'No')
                ->whereIn('tbl_category.id', function ($query) {
                    $query->select('tbl_category_id')
                        ->distinct()
                        ->from('tbl_printbook_category')
                        ->where('tbl_printbook_category.is_website', 'Yes')
                        ->where('tbl_printbook_category.deleted', 'No');
                })
                ->orderBy('tbl_category.categoryName', 'ASC')
                //->take(10)
                ->get();

            $brands = DB::table('tbl_printbook_category')
                ->join('tbl_brands', 'tbl_printbook_category.tbl_brand_id', '=', 'tbl_brands.id')
                ->select('tbl_brands.id', 'tbl_brands.brandName', 'tbl_brands.brand_logo', 'tbl_brands.is_agent', 'tbl_brands.status')
                ->where('tbl_printbook_category.is_website', 'Yes')
                ->where('tbl_printbook_category.deleted', 'No')
                ->where('tbl_brands.deleted', 'No')
                ->distinct()
                ->get();
                
            $products = DB::table('tbl_print_book_product')
                ->select(
                    'tbl_products.*',
                    'tbl_print_book_product.is_featured',
                    'tbl_print_book_product.id as book_product_id',
                    'tbl_brands.brandName',
                    'tbl_brands.brand_logo',
                    'tbl_category.categoryName',
                    DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
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
                ->orderBy('random_number', 'desc')
                ->paginate(54);
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

            $view->with(['settings' => $settings, 'categories' => $categories, 'brands' => $brands, 'products' => $products,'importers'=>$importers,'latestproducts'=>$latestproducts]);
        });
    }
}
