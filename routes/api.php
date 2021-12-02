<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookOrderController;
use App\Http\Controllers\UploadPrescriptionFileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\InvoicesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::post('login', [UsersController::class, 'apiloginlogin']);
   // Route::post('signup', 'AuthController@signup');
  
    // Route::group([
    //   'middleware' => 'auth:api'
    // ], function() {
    //     Route::get('logout', 'AuthController@logout');
    //     Route::get('user', 'AuthController@user');
    // });
// });


Route::post('login', [UsersController::class, 'apilogin']);

Route::get('products', [ProductsController::class, 'apiindex']);

Route::get('product_details', [ProductsController::class, 'apiproductdetails']);

Route::get('category', [ProductsController::class, 'categoryProductsapi']);

Route::get('categories', [CategoriesController::class, 'apiindex']);

Route::get('home', [HomePageController::class, 'apihome']);

Route::get('wishlist_list', [WishlistController::class, 'Wishlistapi']);

Route::post('add_to_wishlist', [WishlistController::class, 'addToWishlistapi']);
Route::post('delete_from_wishlist', [WishlistController::class, 'deleteFromWishlistapi']);

Route::post('add_to_cart', [CartController::class, 'addToCartapi']);

Route::post('cart_list', [CartController::class, 'Cartlistapi']);

Route::post('move_wishlist_to_cart', [CartController::class, 'moveWishlistoCartapi']);

Route::post('cart', [CartController::class, 'all_cart_function_api']);

Route::post('address', [ProfileController::class, 'address_api']);

Route::get("search",[ProductsController::class,'searchapi']);

Route::get("search_result",[ProductsController::class,'searchresultapi']);

Route::post("order_review",[CartController::class,'order_review_api']);

Route::post('create_order', [BookOrderController::class, 'makePaymentapi']);

Route::post('profile/update', [ProfileController::class, 'update_profile_api']);

Route::get('order_list', [ProfileController::class, 'order_list_api']);

Route::post('change_password', [ProfileController::class, 'update_password_api']);

Route::get('order_details', [ProfileController::class, 'order_view_api']);

Route::get('order_cancel', [ProfileController::class, 'cancelOrderApi']);

Route::post('order/create', [BookOrderController::class, 'create_order_api']);

Route::get('generate_order_token', [BookOrderController::class, 'generate_order_token_api']);

Route::get('paymentcallback', [BookOrderController::class, 'paymentCallback_api']);

Route::get("email_phone_verify",[UsersController::class,'mobile_and_email_api']);

Route::get("verify/phone",[UsersController::class,'verify_phone_api']);

Route::post('update/password', [UsersController::class, 'forget_password_api']);

Route::post("register",[UsersController::class,'register_api']);

Route::get("get_prescription_details",[UploadPrescriptionFileController::class, 'prescription_details_api']);

Route::post("upload_prescription",[UploadPrescriptionFileController::class, 'upload_prescription_api']);

Route::post('return', [PagesController::class, 'confirm_return_api']);

Route::get("user/order/invoice",[InvoicesController::class,'user_order_api']);