<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\WelcomeController;
use App\Http\Controllers\Brandcontroller;
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

Route::get('/shop/data', [WelcomeController::class, 'shop_grid_3_columns_sidebar'])->name('/shop_grid_3_columns_sidebar');
Route::get('/shop_grid_4_column_full', [WelcomeController::class, 'shop_grid_4_column_full'])->name('/shop_grid_4_column_full');
Route::get('/shop_grid_5_column', [WelcomeController::class, 'shop_grid_5_column'])->name('/shop_grid_5_column');
Route::get('/shoplist', [WelcomeController::class, 'shoplist'])->name('/shoplist');
Route::get('/shop_right_side_bar', [WelcomeController::class, 'shop_right_side_bar'])->name('/shop_right_side_bar');
Route::get('/product_sidebar', [WelcomeController::class, 'product_sidebar'])->name('/product_sidebar');
Route::get('/card', [WelcomeController::class, 'card'])->name('/card');
Route::get('/checkoutcard', [WelcomeController::class, 'checkoutcard'])->name('/checkoutcard');
Route::get('/products/details/{id}', [WelcomeController::class, 'productDetails'])->name('product.details');
Route::get('/wishlist', [WelcomeController::class, 'wishlist'])->name('/wishlist');
Route::get('/compare', [WelcomeController::class, 'compare'])->name('/compare');
 Route::get('/categorywiseproduct/{id}', [WelcomeController::class, 'viewcategoryproduct'])->name('categorywiseproduct');
 Route::get('/brandwiseproduct/{id}', [WelcomeController::class, 'viewbrandproduct'])->name('brandwiseproduct');


 //cart data
 Route::get('/product-addToCart', [WelcomeController::class, 'addToCart'])->name('product.addToCart');
Route::get('/product-fetchCart', [WelcomeController::class, 'fetchCart'])->name('product.fetchCart');
Route::get('/product-updateCart', [WelcomeController::class, 'updateCart'])->name('product.updateCart');
Route::get('/product-deleteCart', [WelcomeController::class, 'deleteCart'])->name('product.deleteCart');
Route::get('/product-clearCart', [WelcomeController::class, 'clearCart'])->name('product.clearCart');
Route::post('/product-checkOutCart', [WelcomeController::class, 'checkOutCart'])->name('product.checkOutCart');

// Route::get('/', 'App\Http\Controllers\welcomeController@Index')->name('/');
//old code

// Route::get('/aboutUs', 'App\Http\Controllers\welcomeController@aboutUs');
// Route::get('/termsCondition', 'App\Http\Controllers\welcomeController@termsCondition');
// Route::get('/campaign', 'App\Http\Controllers\welcomeController@campaign');
// Route::get('/bestDeals', 'App\Http\Controllers\welcomeController@bestDeals');
// Route::get('/service', 'App\Http\Controllers\welcomeController@service');
// Route::get('/faqs', 'App\Http\Controllers\welcomeController@faqs');
// Route::get('/privacy', 'App\Http\Controllers\welcomeController@privacy');
// Route::get('/contactUs', 'App\Http\Controllers\welcomeController@contactUs');
// Route::post('/contactUs/submit', 'App\Http\Controllers\welcomeController@submitContactUs')->name('submit-contact-us');
// Route::post('/autocomplete/fetch', 'App\Http\Controllers\welcomeController@fetch')->name('autocomplete.fetch');
// Route::post('/searched-products', 'App\Http\Controllers\welcomeController@searchedProducts')->name('search-products');
// Route::get('/search/{searchProduct}', 'App\Http\Controllers\welcomeController@searchGetProducts');
// Route::get('/catProducts/{CatName}', 'App\Http\Controllers\productController@productViewFrontEnd');
// Route::get('/sCatProducts/{sCatName}', 'App\Http\Controllers\productController@sCatProductsFrontEnd');
// Route::POST('/sCatProducts/addToCart', 'App\Http\Controllers\productController@addToCart')->name('addToCart');
// Route::POST('/sCatProducts/updateCart', 'App\Http\Controllers\productController@updateCart')->name('updateCart');
// Route::POST('/sCatProducts/removeCartProduct', 'App\Http\Controllers\productController@removeCartProduct')->name('removeCartProduct');
// Route::POST('/sCatProducts/clearCart', 'App\Http\Controllers\productController@clearCart')->name('clearCart');
// Route::POST('/sCatProducts/viewCart', 'App\Http\Controllers\productController@viewCart')->name('viewCart');

// Route::get('/product/details/{id}', 'App\Http\Controllers\welcomeController@productDetails')->name('product-details');

/* //Corporate Information */

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');







  


  /* Corporate Information*/
  Route::get('/websiteCookie', 'App\Http\Controllers\corporateController@websiteCookie');





  // For user

  Route::get('/checkout', 'App\Http\Controllers\welcomeController@checkout');
  Route::POST('/payment', 'App\Http\Controllers\welcomeController@payment');
  Route::POST('/order/place', 'App\Http\Controllers\welcomeController@orderPlacement');



  Route::get('/userDashboard', 'App\Http\Controllers\userController@Index')->name('user-dashboard');
  Route::get('/user/order-list/{id}', 'App\Http\Controllers\userController@allOrders')->name('user-order-list');
  Route::get('/user/order-invoice/{id}', 'App\Http\Controllers\userController@orderInvoice')->name('user-order-invoice');
  Route::get('/user/completed-orders', 'App\Http\Controllers\userController@completedOrders')->name('user-completed-orders');
  Route::get('/user/change-password', 'App\Http\Controllers\userController@changePassword')->name('user-change-password');
  Route::post('/user-password/update', 'App\Http\Controllers\userController@updatePassword')->name('user-update-password');
  Route::get('/user/view-profile', 'App\Http\Controllers\userController@viewProfile')->name('user-profile-view');
  Route::get('/user/edit-profile', 'App\Http\Controllers\userController@editProfile')->name('user-profile-edit');
  Route::post('/user/update-profile', 'App\Http\Controllers\userController@updateProfile')->name('user-profile-update');
  Route::post('/user/cancel-order/', 'App\Http\Controllers\userController@cancelOrder')->name('user-cancel-order');
  Route::get('/user/re-order/{id}', 'App\Http\Controllers\productController@reOrder')->name('user-re-order');
  Route::get('/user/message-portal', 'App\Http\Controllers\userController@messagePortal')->name('user-message-portal');
  Route::get('/user/payment-history', 'App\Http\Controllers\userController@paymentHistory')->name('user-payment-history');

  // for admin

  Route::get('/dashboard', 'App\Http\Controllers\HomeController@Index')->name('dashboard');

  //update profile
  Route::post('/profile/update', 'App\Http\Controllers\Admin\AdminController@updateProfile')->name('admin-update-profile');

  /* Category Info Admin panel */
  Route::get('/category/view', 'App\Http\Controllers\categoryController@categoryView');
  Route::get('/category/add', 'App\Http\Controllers\categoryController@categoryAdd');
  Route::get('/category/edit/{id}', 'App\Http\Controllers\categoryController@categoryEdit');
  Route::post('/category/save', 'App\Http\Controllers\categoryController@categorySave');
  Route::post('/category/update', 'App\Http\Controllers\categoryController@updateCategory');
  /* end Categroy */
	//Brand Routes
	Route::name('brands.')->prefix('brands')->group(function () {
		Route::get('/view', [BrandController::class, 'index'])->name('view');
		Route::get('/viewBrands', [BrandController::class, 'getBrands'])->name('getBrands');
		Route::post('/store', [BrandController::class, 'store'])->name('store');
		Route::get('/edit', [BrandController::class, 'edit'])->name('edit');;
		Route::post('/update', [BrandController::class, 'update'])->name('update');
		Route::post('/delete', [BrandController::class, 'delete'])->name('delete');
	});
	
	Route::post('brands/categoryWiseView', [BrandController::class, 'categoryWiseBrands'])->name('categoryWiseBrands');
  /* Sub-Category Info Admin panel */
  Route::get('/sub-category/view', 'App\Http\Controllers\subCategoryController@subCategoryView');
  Route::get('/sub-category/add', 'App\Http\Controllers\subCategoryController@subCategoryAdd');
  Route::get('/sub-category/edit/{id}', 'App\Http\Controllers\subCategoryController@subCategoryEdit');
  Route::post('/sub-category/save', 'App\Http\Controllers\subCategoryController@subCategorySave');
  Route::post('/sub-category/update', 'App\Http\Controllers\subCategoryController@updateSubCategory');
  Route::get('/sub-category/delete/{id}', 'App\Http\Controllers\subCategoryController@deleteSubCategory');
  /* end Sub-Categroy */

  /* Unit Info Admin panel */
  Route::get('/unit/view/{type}', 'App\Http\Controllers\unitController@unitView');
  Route::get('/unit/add/{type}', 'App\Http\Controllers\unitController@unitAdd');
  Route::post('/unit/save', 'App\Http\Controllers\unitController@unitSave');
  Route::get('/unit/edit/{type}/{id}', 'App\Http\Controllers\unitController@unitEdit');
  Route::post('/unit/update', 'App\Http\Controllers\unitController@updateUnit');
  Route::get('/unit/delete/{type}/{id}', 'App\Http\Controllers\unitController@deleteUnit');
  /* end Categroy */

  /* Manufaturer Info Admin panel */
  Route::get('/manufacturer/view', 'App\Http\Controllers\manufacturerController@manufacturerView');
  Route::get('/manufacturer/add', 'App\Http\Controllers\manufacturerController@manufacturerAdd');
  Route::post('/manufacturer/save', 'App\Http\Controllers\manufacturerController@manufacturerSave');
  Route::get('/manufacturer/edit/{id}', 'App\Http\Controllers\manufacturerController@manufacturerEdit');
  Route::post('/manufacturer/update', 'App\Http\Controllers\manufacturerController@manufacturerUpdate');
  Route::get('/manufacturer/delete/{id}', 'App\Http\Controllers\manufacturerController@manufacturerDelete');
  /* end Manufaturer */

  /* Products Info Admin panel */
  Route::get('/products/view', 'App\Http\Controllers\productController@productView');
  Route::get('/products/add', 'App\Http\Controllers\productController@productAdd')->name('dynamicValue.fetch');
  Route::post('/products/save', 'App\Http\Controllers\productController@productSave');
  Route::get('/products/edit/{id}', 'App\Http\Controllers\productController@productEdit');
  Route::post('/products/update', 'App\Http\Controllers\productController@productUpdate');
  Route::post('products/videoUrl/update', 'App\Http\Controllers\productController@productVideoUrlUpdate');
  Route::get('/products/delete/{id}', 'App\Http\Controllers\productController@productDelete');
  Route::post('/dynamic_dependent/fetch', 'App\Http\Controllers\productController@fetch')->name('dynamicdependent.fetch');
  Route::get('/products/viewProfile/{id}', 'App\Http\Controllers\productController@productViewProfile');
  Route::get('/product-image/delete/{id}', 'App\Http\Controllers\productController@deleteProductImage')->name('delete-product-image');
  Route::get('/product-spec/delete/{id}', 'App\Http\Controllers\productController@deleteProductSpec')->name('delete-product-price');
  Route::get('/categoryView/{categoryName}', 'App\Http\Controllers\productController@productCategoryWiseView');
  /* end Products */

  /* Top Products Info Admin panel */
  Route::get('/manage/top-products', 'App\Http\Controllers\Admin\TopProductsController@manageProducts')->name('manage-top-products');
  Route::post('/manage/top-products/update', 'App\Http\Controllers\Admin\TopProductsController@topProductUpdate')->name('update-top-product');
  Route::post('/manage/remove-top-product', 'App\Http\Controllers\Admin\TopProductsController@removeTopProduct')->name('remove-top-product');
  /* end  Top Products */

  /* Start Products offer */
  Route::get('/master/masterOfferView', 'App\Http\Controllers\offerController@masterOfferView');
  Route::get('/master/masterOfferAdd', 'App\Http\Controllers\offerController@masterOfferAdd');
  Route::post('/master/masterOffersave', 'App\Http\Controllers\offerController@masterOfferSave');
  Route::post('/master/masterOfferDelete', 'App\Http\Controllers\offerController@masterOfferDelete')->name('deleteOffer');

  Route::get('/products/specialOfferView', 'App\Http\Controllers\offerController@productsSpecialOfferView');
  Route::post('/products/specialOfferProductWeight', 'App\Http\Controllers\offerController@specialOfferProductWeight')->name('productWeight.productId');
  Route::get('/products/specialOfferView/{status}', 'App\Http\Controllers\offerController@productsSpecialOfferView2')->name('specialOfferView');
  Route::post('/products/specialOfferView/', 'App\Http\Controllers\offerController@productsSpecialOfferView3')->name('specialOfferView2');
  Route::get('/products/specialOfferAdd', 'App\Http\Controllers\offerController@productSpecialOfferAdd');
  Route::post('/productsSpecialOffer/save', 'App\Http\Controllers\offerController@productSpecialOfferSave');
  Route::get('/productsSpecialOffer/delete/{id}', 'App\Http\Controllers\offerController@productSpecialOfferDelete');
  Route::get('/bestDeals/view', 'App\Http\Controllers\offerController@viewBestDeals');
  Route::get('/products/hotOfferView', 'App\Http\Controllers\offerController@productsHotOfferView');
  Route::get('/products/hotOfferView/{status}', 'App\Http\Controllers\offerController@productsHotOfferView2')->name('hotOfferView');
  Route::post('/products/hotOfferView', 'App\Http\Controllers\offerController@productsHotOfferView3')->name('hotOfferView2');
  Route::get('/products/hotOfferAdd', 'App\Http\Controllers\offerController@productHotOfferAdd');
  Route::post('/productsHotOffer/save', 'App\Http\Controllers\offerController@productHotOfferSave');
  Route::get('/productsHotOffer/delete/{id}', 'App\Http\Controllers\offerController@productHotOfferDelete');

  Route::get('/products/specialDealsView', 'App\Http\Controllers\offerController@productsSpecialDealsView');
  Route::get('/products/specialDealsAdd', 'App\Http\Controllers\offerController@productSpecialDealsAdd');
  Route::post('/products/SpecialDealsSave', 'App\Http\Controllers\offerController@productSpecialDealsSave');
  Route::get('/productsSpecialDeals/delete/{id}', 'App\Http\Controllers\offerController@productSpecialDealsDelete');

  Route::get('/product-image/toggle-status/{id}', 'App\Http\Controllers\productController@toggleStatus')->name('toggle-product-image-status');

  Route::get('/coupon/view/{type}', 'App\Http\Controllers\offerController@couponView');
  Route::get('/coupon/add/{type}', 'App\Http\Controllers\offerController@couponAdd');
  Route::post('/coupon/generatecouponcode', 'App\Http\Controllers\offerController@generateCouponCode')->name('generateCouponCode');
  Route::post('/coupon/save', 'App\Http\Controllers\offerController@couponSave');
  /* end Products offer */

  /* Banner Info Admin panel */
  Route::get('/banner/frontEndView', 'App\Http\Controllers\bannerController@forntEndBannerView');
  Route::get('/banner/frontEndAdd', 'App\Http\Controllers\bannerController@forntEndBannerAdd');
  Route::post('/banner/frontEndSave', 'App\Http\Controllers\bannerController@forntEndBannerSave');
  Route::get('/banner/frontEndDelete/{id}', 'App\Http\Controllers\bannerController@forntEndBannerDelete');
  Route::get('/banner/change-status/{id}', 'App\Http\Controllers\bannerController@changeStatus');
  /* end Banner */


  /* Order Info Admin panel */
  Route::get('/order-list', 'App\Http\Controllers\Admin\OrderController@orderList')->name('order-list');
  Route::get('/order-invoice/{id}', 'App\Http\Controllers\Admin\OrderController@orderInvoice')->name('order-invoice');
  //Route::get('/order-invoice/{id}', 'App\Http\Controllers\userController@orderInvoice')->name('order-invoice');
  Route::get('/invoice/pdf/{id}', 'App\Http\Controllers\Admin\OrderController@createPDF')->name('pdf-invoice');
  Route::get('/admin/confirm-order/{id}', 'App\Http\Controllers\Admin\OrderController@confirmOrder')->name('admin-order-confirm');
  Route::get('/admin/cancel-order/{id}', 'App\Http\Controllers\Admin\OrderController@cancelOrder')->name('admin-order-cancel');
  Route::get('/admin/complete-order/{id}', 'App\Http\Controllers\Admin\OrderController@completeOrder')->name('admin-order-complete');
  Route::get('/admin/order-payment/{id}', 'App\Http\Controllers\Admin\OrderController@orderPayment')->name('admin-order-payment');

  /* end Order */

  /* Carring Cost Info Admin panel */
  Route::get('/manage/carring-cost', 'App\Http\Controllers\Admin\CarringCostController@carringCostList')->name('manage-carring-cost');
  Route::get('/carring-cost/add', 'App\Http\Controllers\Admin\CarringCostController@carringCostAdd')->name('add-carring-cost');
  Route::post('/carring-cost/save', 'App\Http\Controllers\Admin\CarringCostController@carringCostSave');
  Route::get('/carring-cost/edit/{id}', 'App\Http\Controllers\Admin\CarringCostController@carringCostEdit')->name('carring-cost-edit');
  Route::post('/carring-cost/update', 'App\Http\Controllers\Admin\CarringCostController@carringCostUpdate');
  Route::get('/carring-cost/delete/{id}', 'App\Http\Controllers\Admin\CarringCostController@carringCostDelete')->name('carring-cost-delete');

  /* end  Carring Cost */

  /* User List Info Admin panel */
  Route::get('/manage/user-list', 'App\Http\Controllers\Admin\UsersController@userList')->name('manage-user-list');
  Route::get('/activate-user/{id}', 'App\Http\Controllers\Admin\UsersController@activateUser')->name('activate-user');
  Route::get('/inactivate-user/{id}', 'App\Http\Controllers\Admin\UsersController@inactivateUser')->name('inactivate-user');
  Route::get('/reset-password-user/{id}', 'App\Http\Controllers\Admin\UsersController@resetPasswordUser')->name('reset-password-user');


  /* end  User List */

  /* Content Management Info Admin panel */
  Route::get('/manage/content', 'App\Http\Controllers\Admin\ContentController@contentList')->name('manage-content');

  Route::get('/manage/content/create', 'App\Http\Controllers\Admin\ContentController@addContent')->name('create-content');

  Route::post('/content/save', 'App\Http\Controllers\Admin\ContentController@contentSave');

  Route::get('/content/edit/{id}', 'App\Http\Controllers\Admin\ContentController@editContent')->name('edit-content');

  Route::post('/content/update', 'App\Http\Controllers\Admin\ContentController@updateContent');

  Route::get('/content/delete/{id}', 'App\Http\Controllers\Admin\ContentController@deleteContent')->name('delete-content');

  /* end  User List */

  /* Message Portal Info Admin panel */
  Route::get('/manage/message-portal', 'App\Http\Controllers\Admin\MessagePortalController@messageList')->name('manage-message-portal');
  Route::post('/admin/message-reply', 'App\Http\Controllers\Admin\MessagePortalController@messageReply')->name('admin-message-reply');
  /* end Message Portal */


  /* Shop Setting Info Admin panel */
  Route::get('/manage/shop-setting', 'App\Http\Controllers\Admin\ShopSettingController@settingList')->name('manage-shop-setting');
  Route::get('/manage/shop-setting/create', 'App\Http\Controllers\Admin\ShopSettingController@addSetting')->name('create-shop-setting');
  Route::post('/setting/save', 'App\Http\Controllers\Admin\ShopSettingController@settingSave');

  Route::get('/shop-setting/edit', 'App\Http\Controllers\Admin\ShopSettingController@editSetting')->name('edit-shop-setting');

  Route::post('/setting/update', 'App\Http\Controllers\Admin\ShopSettingController@updateSetting');

  Route::get('/shop-setting/delete/{id}', 'App\Http\Controllers\Admin\ShopSettingController@deleteSetting')->name('delete-shop-setting');
  /* end Message Portal */


  /* Manage Reports Info Admin panel */
  Route::get('/manage-reports', 'App\Http\Controllers\Admin\ManageReportsController@reportList')->name('manage-reports');
  Route::post('/searched-order-list', 'App\Http\Controllers\Admin\ManageReportsController@searchedOrderList')->name('searched-order-list');
  Route::post('/order-report-pdf', 'App\Http\Controllers\Admin\ManageReportsController@createPDF')->name('order-report-pdf');
});

require __DIR__ . '/auth.php';


  // Route::get('/manage/shop-setting/create', 'App\Http\Controllers\Admin\ShopSettingController@addSetting')->name('create-shop-setting');
  // Route::post('/setting/save', 'App\Http\Controllers\Admin\ShopSettingController@settingSave');

  // Route::get('/shop-setting/edit/{id}', 'App\Http\Controllers\Admin\ShopSettingController@editSetting')->name('edit-shop-setting');

  // Route::post('/setting/update', 'App\Http\Controllers\Admin\ShopSettingController@updateSetting');

  // Route::get('/shop-setting/delete/{id}', 'App\Http\Controllers\Admin\ShopSettingController@deleteSetting')->name('delete-shop-setting');
  /* end Manage Reports */
