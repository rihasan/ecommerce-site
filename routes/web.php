
<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

//  Route::get('/', function () {
//    return view('index');
// });

use Illuminate\Support\Facades\Route;

/*
 * Welcome Controller start
 */

Route::get('/', 'App\Http\Controllers\WelcomeController@index');
Route::get('/flowers-category/{id}', 'App\Http\Controllers\WelcomeController@flowers_category');
Route::get('/flowers-sub-category/{id}', 'App\Http\Controllers\WelcomeController@flowers_sub_category');
// Route::get('flowers-category/{sub-category}/{id}', 'App\Http\Controllers\WelcomeController@flowers_sub_category')
//     ->where('categories','^[a-zA-Z0-9-_\/]+$');
Route::get('/404', 'App\Http\Controllers\WelcomeController@fourzerofour');
Route::get('/contact-us', 'App\Http\Controllers\WelcomeController@contact_us');
Route::get('/shop', 'App\Http\Controllers\WelcomeController@shop');
Route::get('/cart', 'App\Http\Controllers\WelcomeController@cart');
Route::get('/checkout', 'App\Http\Controllers\WelcomeController@checkout');
Route::get('/product-details/{id}', 'App\Http\Controllers\WelcomeController@product_details');
Route::get('/terms-conditions', 'App\Http\Controllers\WelcomeController@terms_conditions');
Route::get('/faq', 'App\Http\Controllers\WelcomeController@faq');

Route::post('/price-range-search', 'App\Http\Controllers\WelcomeController@price_range_search');
Route::get('/search-result', 'App\Http\Controllers\WelcomeController@search_result');

/*
 * Welcome Controller End
 */


/////////////////////////////////////_Cart Controller Start_///////////////////////////////////////////////
// Route::get('/add-to-cart/{id}', 'App\Http\Controllers\CartController@add_to_cart');
Route::match(['get', 'post'], '/add-to-cart/{id}', 'App\Http\Controllers\CartController@add_to_cart');
Route::get('/show-cart', 'App\Http\Controllers\CartController@show_cart');
Route::get('/delete-from-cart/{id}', 'App\Http\Controllers\CartController@delete_from_cart');
Route::post('/update-cart-item/', 'App\Http\Controllers\CartController@update_cart_item');
Route::get('/update-cart/', 'App\Http\Controllers\CartController@update_cart_item_js');

/////////////////////////////////////_Cart Controller End_/////////////////////////////////////////////////
/////////////////////////////////////_Checkout Controller Start_///////////////////////////////////////////
// Route::match(['get', 'App\Http\Controllers\post'],'/add-to-cart/{id}', 'App\Http\Controllers\CartController@add_to_cart');
Route::get('/check-out-details', 'App\Http\Controllers\CheckoutController@check_out_details');
Route::get('/billing', 'App\Http\Controllers\CheckoutController@billing');
Route::post('/save-billing', 'App\Http\Controllers\CheckoutController@save_billing');
Route::post('/update-billing', 'App\Http\Controllers\CheckoutController@update_billing');
/////////////////////////////////////_Checkout Controller End_//////////////////////////////////////////////
/////////////////////////////////////_Payment-method Controller Start///////////////////////////////////////
Route::get('/payment-method', 'App\Http\Controllers\PaymentController@payment_method');
Route::get('/pay-with-visa', 'App\Http\Controllers\PaymentController@pay_with_visa');
Route::get('/pay-with-mcard', 'App\Http\Controllers\PaymentController@pay_with_mcard');
Route::get('/pay-with-dbblnexus', 'App\Http\Controllers\PaymentController@pay_with_dbblnexus');
Route::get('/pay-with-telecash', 'App\Http\Controllers\PaymentController@pay_with_telecash');
Route::get('/pay-with-fastcash', 'App\Http\Controllers\PaymentController@pay_with_fastcash');
Route::get('/pay-with-qcash', 'App\Http\Controllers\PaymentController@pay_with_qcash');
Route::get('/pay-with-bkash', 'App\Http\Controllers\PaymentController@pay_with_bkash');
Route::get('/pay-with-rocket', 'App\Http\Controllers\PaymentController@pay_with_rocket');
Route::get('/pay-with-surecash', 'App\Http\Controllers\PaymentController@pay_with_surecash');
Route::get('/pay-with-mycash', 'App\Http\Controllers\PaymentController@pay_with_mycash');
// Route::get('/pay-with-cod', 'App\Http\Controllers\PaymentController@pay_with_cod');

Route::post('/save-transection', 'App\Http\Controllers\PaymentController@save_trxId');

/////////////////////////////////////_Payment-method Controller End_////////////////////////////////////////
/////////////////////////////////////_Order Controller Start////////////////////////////////////////////////
Route::get('/manage-order', 'App\Http\Controllers\OrderController@manage_order');
Route::get('/view-invoice', 'App\Http\Controllers\OrderController@Oview_invoice');
Route::get('/view-invoice/{id}', 'App\Http\Controllers\OrderController@view_invoice_by_id');
Route::get('/edit-order/{id}', 'App\Http\Controllers\OrderController@edit_order');
Route::post('/update-order', 'App\Http\Controllers\OrderController@update_order');
Route::get('/delete-order/{id}', 'App\Http\Controllers\OrderController@delete_order');

/////////////////////////////////////_Order Controller End_/////////////////////////////////////////////////
/////////////////////////////////_product review Controller Start///////////////////////////////////////////
Route::post('/product-review', 'App\Http\Controllers\ProductReviewController@product_review');

/////////////////////////////////_product review Controller End///////////////////////////////////////////
/////////////////////////////////_product review Controller End///////////////////////////////////////////
Route::get('/merchant-profile/{id}', 'App\Http\Controllers\MerchantController@index');
Route::get('/product-by-merchant/{id}', 'App\Http\Controllers\MerchantController@product_by_merchant');

/////////////////////////////////_product review Controller End///////////////////////////////////////////

/*
 * Customer Controller start
 */
Route::get('/customer-login-panel', 'App\Http\Controllers\UserController@index');
Route::get('/customer-register-panel', 'App\Http\Controllers\UserController@register');
Route::post('/save-customer', 'App\Http\Controllers\UserController@save_customer');
Route::get('/customer-profile', 'App\Http\Controllers\UserController@customer_profile');
Route::post('/customer-login-check', 'App\Http\Controllers\UserController@customer_login_check');

Route::get('/customer-logout-panel', 'App\Http\Controllers\UserController@logout');


Route::get('/customer-order', 'App\Http\Controllers\UserController@customer_order');

/*
 * Customer Controller End
 */

/*
 * DynamicPDFController Start
 */
Route::get('/dynamic_pdf', 'App\Http\Controllers\DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'App\Http\Controllers\DynamicPDFController@pdf');

/*
 * DynamicPDFController End
 */

/*
 * Admin Controller start
 */
Route::get('/admin-panel', 'App\Http\Controllers\AdminController@index');
Route::post('/admin-login-check', 'App\Http\Controllers\AdminController@admin_login_check');

/*
 * Admin Controller End
 */

/*
 * SuperAdmin Controller start
 */
Route::get('/dashboard', 'App\Http\Controllers\SuperAdminController@index');
/////////////////////////////////////_Category Start_///////////////////////////////////////
Route::get('/add-category', 'App\Http\Controllers\SuperAdminController@add_category');
Route::post('/save-category', 'App\Http\Controllers\SuperAdminController@save_category');
Route::get('/manage-category', 'App\Http\Controllers\SuperAdminController@manage_category');
Route::get('/published-category/{id}', 'App\Http\Controllers\SuperAdminController@published_category');
Route::get('/unpublished-category/{id}', 'App\Http\Controllers\SuperAdminController@unpublished_category');
Route::get('/edit-category/{id}', 'App\Http\Controllers\SuperAdminController@edit_category');
Route::post('/update-category', 'App\Http\Controllers\SuperAdminController@update_category');
Route::get('/delete-category/{id}', 'App\Http\Controllers\SuperAdminController@delete_category');
/////////////////////////////////////_Category End_///////////////////////////////////////
/////////////////////////////////////_Sub Category Start_///////////////////////////////////////
Route::get('/add-sub-category', 'App\Http\Controllers\SuperAdminController@add_sub_category');
Route::post('/save-sub-category', 'App\Http\Controllers\SuperAdminController@save_sub_category');
Route::get('/manage-sub-category', 'App\Http\Controllers\SuperAdminController@manage_sub_category');
Route::get('/published-sub-category/{id}', 'App\Http\Controllers\SuperAdminController@published_sub_category');
Route::get('/unpublished-sub-category/{id}', 'App\Http\Controllers\SuperAdminController@unpublished_sub_category');
Route::get('/edit-sub-category/{id}', 'App\Http\Controllers\SuperAdminController@edit_sub_category');
Route::post('/update-sub-category', 'App\Http\Controllers\SuperAdminController@update_sub_category');
Route::get('/delete-sub-category/{id}', 'App\Http\Controllers\SuperAdminController@delete_sub_category');
/////////////////////////////////////_Sub Category End_///////////////////////////////////////
/////////////////////////////////////_Merchant start_///////////////////////////////////////
Route::get('/add-merchant', 'App\Http\Controllers\SuperAdminController@add_merchant');
Route::get('/manage-merchant', 'App\Http\Controllers\SuperAdminController@manage_merchant');
Route::post('/save-merchant', 'App\Http\Controllers\SuperAdminController@save_merchant');
Route::get('/published-merchant/{id}', 'App\Http\Controllers\SuperAdminController@published_merchant');
Route::get('/unpublished-merchant/{id}', 'App\Http\Controllers\SuperAdminController@unpublished_merchant');
Route::get('/edit-merchant/{id}', 'App\Http\Controllers\SuperAdminController@edit_merchant');
Route::post('/update-merchant', 'App\Http\Controllers\SuperAdminController@update_merchant');
Route::get('/delete-merchant/{id}', 'App\Http\Controllers\SuperAdminController@delete_merchant');
/////////////////////////////////////_Merchant End_///////////////////////////////////////
/////////////////////////////////////_Product start_///////////////////////////////////////
Route::get('/add-product', 'App\Http\Controllers\SuperAdminController@add_product');
Route::get('/manage-product', 'App\Http\Controllers\SuperAdminController@manage_product');
Route::post('/save-product', 'App\Http\Controllers\SuperAdminController@save_product');
Route::get('/published-product/{id}', 'App\Http\Controllers\SuperAdminController@published_product');
Route::get('/unpublished-product/{id}', 'App\Http\Controllers\SuperAdminController@unpublished_product');
Route::get('/edit-product/{id}', 'App\Http\Controllers\SuperAdminController@edit_product');
Route::get('/view-product/{id}', 'App\Http\Controllers\SuperAdminController@view_product');
Route::post('/update-product', 'App\Http\Controllers\SuperAdminController@update_product');
Route::get('/delete-product/{id}', 'App\Http\Controllers\SuperAdminController@delete_product');
/////////////////////////////////////_Product End_///////////////////////////////////////
/////////////////////////////////////Picture Change Start_///////////////////////////////////////
Route::get('/change-picture/{id}', 'App\Http\Controllers\SuperAdminController@change_picture');
/////////////////////////////////////Picture Change End_///////////////////////////////////////
/////////////////////////////////////_Logout Start_///////////////////////////////////////
Route::get('/logout', 'App\Http\Controllers\SuperAdminController@logout');
/////////////////////////////////////_Logout End_///////////////////////////////////////


/*
 * SuperAdmin Controller End
 */




// Auth::routes();

// Route::get('/', 'App\Http\Controllers\WelcomeController@index');
