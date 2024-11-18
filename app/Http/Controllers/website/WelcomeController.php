<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
      public function Index(){
        return view('website.pages.home');
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
      public function products(){
        return view('website.pages.products');
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
      public function cart(){
        return view('website.pages.cart');
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
}
