<?php

use App\Http\Controllers\website\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'Index'])->name('/');
Route::get('/home2', [WelcomeController::class, 'Index2'])->name('/home2');
Route::get('/aboutus', [WelcomeController::class, 'aboutus'])->name('/aboutus');
Route::get('/contactus', [WelcomeController::class, 'contactus'])->name('/contactus');
Route::get('/tractorder', [WelcomeController::class, 'tractorder'])->name('/tractorder');
Route::get('/blog_classic', [WelcomeController::class, 'blog_classic'])->name('/blog_classic');
Route::get('/blog_grid', [WelcomeController::class, 'blog_grid'])->name('/blog_grid');
Route::get('/blog_list', [WelcomeController::class, 'blog_list'])->name('/blog_list');
Route::get('/blog_left_sidebar', [WelcomeController::class, 'blog_left_sidebar'])->name('/blog_left_sidebar');
Route::get('/post', [WelcomeController::class, 'post'])->name('/post');
Route::get('/post_without_sidebar', [WelcomeController::class, 'post_without_sidebar'])->name('/post_without_sidebar');
Route::get('/termscondition', [WelcomeController::class, 'termscondition'])->name('/termscondition');
Route::get('/faq', [WelcomeController::class, 'faq'])->name('/faq');

Route::get('/shop_grid_3_columns_sidebar', [WelcomeController::class, 'shop_grid_3_columns_sidebar'])->name('/shop_grid_3_columns_sidebar');
Route::get('/shop_grid_4_column_full', [WelcomeController::class, 'shop_grid_4_column_full'])->name('/shop_grid_4_column_full');
Route::get('/shop_grid_5_column', [WelcomeController::class, 'shop_grid_5_column'])->name('/shop_grid_5_column');
Route::get('/shoplist', [WelcomeController::class, 'shoplist'])->name('/shoplist');
Route::get('/shop_right_side_bar', [WelcomeController::class, 'shop_right_side_bar'])->name('/shop_right_side_bar');
Route::get('/product_sidebar', [WelcomeController::class, 'product_sidebar'])->name('/product_sidebar');
Route::get('/card', [WelcomeController::class, 'card'])->name('/card');
Route::get('/checkoutcard', [WelcomeController::class, 'checkoutcard'])->name('/checkoutcard');
Route::get('/products', [WelcomeController::class, 'products'])->name('/products');
Route::get('/wishlist', [WelcomeController::class, 'wishlist'])->name('/wishlist');
Route::get('/compare', [WelcomeController::class, 'compare'])->name('/compare');


/* //Corporate Information */
