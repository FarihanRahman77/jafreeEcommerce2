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
       
        View::composer('*', function($view) {
            $settings = ShopSetting::where('status','Active')->where('deleted','No')->first();

            $categories = Category::select('tbl_category.id', 
                                    'tbl_category.categoryName',
                                    'tbl_category.status',
                                    'tbl_category.createdDate',
                                    'tbl_category.logo',
                                    'tbl_category.image')
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
                    ->select('tbl_brands.id', 'tbl_brands.brandName', 'tbl_brands.brand_logo', 'tbl_brands.is_agent','tbl_brands.status')
                    ->where('tbl_printbook_category.is_website', 'Yes')
                    ->where('tbl_printbook_category.deleted', 'No')
                    ->where('tbl_brands.deleted', 'No')
                    ->distinct()
                    ->get();

            $view->with(['settings' => $settings,'categories'=>$categories,'brands'=>$brands]);
        });



    }
}
