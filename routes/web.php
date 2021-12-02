<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadPrescriptionfileController;
use App\Http\Controllers\UploadImage; 
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\upload_prescription;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\BookOrderController;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Session ;
//routing page (call pages like this )

Route::get('/', [HomePageController::class, 'index'])->name('home.page');


Route::get('about', [PagesController::class, 'about']);

Route::get('product_details/{id}', [ProductsController::class, 'productdetails']);

Route::get('categories', [CategoriesController::class, 'index']);

Route::get('category/{id}', [ProductsController::class, 'categoryProducts']);

Route::get('contact', [PagesController::class, 'contact']);

Route::get('login_register', [PagesController::class, 'loginRegister'])->name('user.login');

Route::post("/otp",[UsersController::class,'sendotp']);

Route::post("/register",[UsersController::class,'register']);

Route::post("/login_register",[UsersController::class,'login']);

Route::get('/logout', function(){
   Session::forget('user');
   
   $notification=array(
                'messege'=>'Logout SuccessFully',
                'alert-type'=>'success'
                 );
                 
   return redirect('/')->with($notification);
});

Route::get('products', [ProductsController::class, 'index']);

Route::get("search",[ProductsController::class,'search']);

Route::get("searchwithcatid",[ProductsController::class,'SearchWithCatid']);

Route::post("add_to_cart",[CartController::class,'addToCart']);

Route::post("move_wishlist_to_cart",[CartController::class,'moveWishlistoCart']);

Route::get("updatecartqty",[CartController::class,'updateCartqty']);

Route::post("remove_from_cart",[CartController::class,'removeFromCart']);

Route::get("remove_all_from_cart",[CartController::class,'removeallFromCart']);

Route::post("remove_from_wishlist",[WishlistController::class,'removeFromWishlist']);

Route::post("add_to_wishlist",[WishlistController::class,'addToWishlist']);

Route::get("updatewishlistqty",[WishlistController::class,'updateWishlistqty']);

Route::get('wishlistt', [WishlistController::class, 'wishList']);

Route::get('sidebar_cart', [PagesController::class, 'sidebarCart']);

Route::get('cartt', [CartController::class, 'cartList']);

Route::get('updatecart', [CartController::class, 'cartList']);

Route::get('checkout', [PagesController::class, 'checkOut']);
 
Route::get('test', [PagesController::class, 'test']);

Route::post('submit-prescription', [UploadImage::class, 'upload']);

Route::get('myaccount', [PagesController::class, 'myAccount'])->name('my.account');

Route::get('upload_prescription', [PagesController::class, 'upload_prescription']);

Route::get('imageUpload/{id}', [PagesController::class, 'imageUpload']);

Route::get('image-upload', [ PagesController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ PagesController::class, 'imageUploadPost' ])->name('image.upload.post');

Route::get('/upload_prescription', [PagesController::class, 'upload_prescription'])->name('upload.prescription');
//Route::post('submit-prescription', [UploadPrescriptionfileController::class], 'upload');

Route::post('/upload', [PrescriptionController::class, 'upload'])->name('prescription');

Route::post('/book/order', [BookOrderController::class, 'makePayment'])->name('book.order');

Route::post('/payment/status', [BookOrderController::class, 'paymentCallback'])->name('status');

Route::post('/add_new_address', [AddressController::class, 'add_address']);
Route::post('/profile/update', [ProfileController::class, 'update_profile'])->name('profile.update');

Route::post('/profile/address', [ProfileController::class, 'update_address'])->name('profile.address');
Route::post('/track/order', [ProfileController::class, 'track_order'])->name('order.tracking');
Route::get('user/address/view/{id}', [ProfileController::class, 'view_profile']);
Route::post('user/address/update', [ProfileController::class, 'update_address']);
Route::post('user/password/update', [ProfileController::class, 'update_password'])->name('password.update');


Route::get('user/order/view/{id}', [ProfileController::class, 'order_view']);

Route::post('confirm/return', [PagesController::class, 'confirm_return']);
Route::get('cancel/order/{id}', [PagesController::class, 'cancel_order']);


Route::post('subscribed_email', [PagesController::class, 'SubscribedEmail']);

Route::get('terms', [PagesController::class, 'terms']);

Route::get('payment', [PaymentController::class, 'payment']);

Route::get('payment',  [PaymentController::class, 'create'])->name('paywithrazorpay');

Route::get('sendbasicemail', [MailController::class,'basic_email']);

Route::get('/pdf/{id}', [InvoicesController::class, 'invoicePDF']);
// Route::post('response', [PagesController::class, 'response']);
// Route::post('payment-razorpay', [PaymentController::class, 'payment'])->name('payment');
 
