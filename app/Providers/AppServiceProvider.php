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
            $view->with(['settings' => $settings]);
        });


    }
}
