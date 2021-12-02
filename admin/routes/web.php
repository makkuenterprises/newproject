<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login Page

// Route::get('/', function () {
//     return view('admin.login');
// });

Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('/', 'Admin\LoginController@showLoginForm');
Route::post('/', 'Admin\LoginController@login')->name('admin.login');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

// Category Module

Route::get('category', 'AdminController@category')->name('admin.category');
Route::get('add/category', 'AdminController@AddCategory')->name('add.category');
Route::post('category/store', 'Admin\CategoryController@store')->name('category.store');
Route::get('edit/category/{id}', 'Admin\CategoryController@edit');
Route::post('update/category/{id}', 'Admin\CategoryController@update');
Route::get('delete/category/{id}', 'Admin\CategoryController@remove');

// Users Module

Route::get('users', 'Admin\UserController@index')->name('admin.users');
Route::get('unactive/user/{id}', 'Admin\UserController@activateUser');
Route::get('active/user/{id}', 'Admin\UserController@unactivateUser');


// Product Module


Route::get('products', 'Admin\ProductController@index')->name('list.product');
Route::get('view/product/{id}', 'Admin\ProductController@viewProduct');
Route::get('add/product', 'Admin\ProductController@addProduct')->name('add.product');
Route::post('insert/product','Admin\ProductController@storeProduct')->name('insert.product');
Route::get('edit/product/{id}', 'Admin\ProductController@editProduct');
Route::post('update/product/{id}', 'Admin\ProductController@updateProduct');
Route::get('remove/product/{id}', 'Admin\ProductController@removeProduct');
Route::get('unactive/product/{id}', 'Admin\ProductController@activateProduct');
Route::get('active/product/{id}', 'Admin\ProductController@unactivateProduct');
Route::get('/employees/getEmployees/','Admin\ProductController@getEmployees')->name('employees.getEmployees');
Route::get('/searchCities', 'Admin\ProductController@autoComplete');
Route::post('product/store','Admin\ProductController@searchProduct')->name('product.search');

// Banner Module

Route::get('add/banner', 'Admin\BannerController@addBanner')->name('add.banner');
Route::get('list/banner', 'Admin\BannerController@index')->name('list.banner');
Route::post('store/banner', 'Admin\BannerController@storeBanner')->name('store.banner');
Route::get('add/banner', 'Admin\BannerController@addBanner')->name('add.banner');
Route::get('remove/banner/{id}', 'Admin\BannerController@removeBanner');


// Order Module

Route::get('pending/order', 'Admin\OrderController@pendingOrder')->name('admin.pending.order');
Route::get('view/order/{id}', 'Admin\OrderController@viewOrder');
Route::get('payment/accept/{id}', 'Admin\OrderController@paymentAccept');
Route::get('payment/cancel/{id}', 'Admin\OrderController@paymentCancel');
Route::get('accept/order', 'Admin\OrderController@acceptOrder')->name('admin.accept.order');
Route::get('cancel/order', 'Admin\OrderController@cancelOrder')->name('admin.cancel.order');
Route::get('process/order', 'Admin\OrderController@processOrder')->name('admin.process.order');
Route::get('deleivered/order', 'Admin\OrderController@deleiveredOrder')->name('admin.deleivered.order');
Route::get('process/delivery/{id}', 'Admin\OrderController@deleiveryProcess');
Route::get('product/delivered/{id}', 'Admin\OrderController@productDeleivered');

// Report Module

Route::get('today/orders', 'Admin\ReportController@todayOrder')->name('admin.today.report');
Route::get('today/delivery', 'Admin\ReportController@todayDelivery')->name('admin.delivery.report');
Route::get('monthly/report', 'Admin\ReportController@monthlyReport')->name('admin.month.report');
Route::get('search/report', 'Admin\ReportController@searchReport')->name('admin.search.report');
Route::post('search/by/year', 'Admin\ReportController@searchByYear')->name('search.by.year');
Route::post('search/by/month', 'Admin\ReportController@searchByMonth')->name('search.by.month');
Route::post('search/by/date', 'Admin\ReportController@searchByDate')->name('search.by.date');


// User Role

Route::get('users/lists', 'Admin\UserRoleController@AllUsers')->name('admin.user.all');
Route::get('add/users', 'Admin\UserRoleController@AddUsers')->name('admin.users.add');
Route::post('user/store', 'Admin\UserRoleController@storeUser')->name('admin.user.store');
Route::get('edit/admin/{id}','Admin\UserRoleController@editUser');
Route::get('remove/admin/{id}','Admin\UserRoleController@removeUser');
Route::post('user/update','Admin\UserRoleController@UpdateUser')->name('admin.update');

// Return Module


Route::get('return/requests', 'Admin\ReturnController@ReturnRequests')->name('admin.return.requests');
Route::get('approve/request/{id}', 'Admin\ReturnController@ApproveRequests');
Route::get('approved/request', 'Admin\ReturnController@ApprovedRequests')->name('admin.request.all');
Route::get('approve/payment/online/{id}', 'Admin\ReturnController@ApprovePaymentOnline');
Route::get('payment/cash/{id}', 'Admin\ReturnController@ApprovePaymentCash');
Route::get('bank/details/{id}', 'Admin\ReturnController@BankDetails');

// Prescription Module

Route::get('prescription/request', 'Admin\PrescriptionController@PrescriptionRequests')->name('admin.prescription.request');
Route::get('view/prescriptions/{id}', 'Admin\PrescriptionController@ViewPrescriptions');
Route::get('download/image/{id}', 'Admin\PrescriptionController@DownloadImage');
Route::get('prescription/review/{id}', 'Admin\PrescriptionController@UpdatePrescriptionReview');
Route::get('remove/prescriptions/{id}', 'Admin\PrescriptionController@RemovePrescription');
Route::get('prescription/accepted', 'Admin\PrescriptionController@AcceptedPrescription')->name('admin.prescription.accept');
Route::get('make/orders/{id}', 'Admin\PrescriptionController@MakeOrders');
Route::post('place/order','Admin\PrescriptionController@makeOrder')->name('admin.prescriptions.orders');
Route::get('prescription/process/deleivery', 'Admin\PrescriptionController@ProcessDeleivery')->name('admin.prescription.process.deleivery');
Route::get('view/prescriptions/orders/{id}', 'Admin\PrescriptionController@ViewPrescriptionsOrders');
Route::get('prescription/order/shipped/{id}', 'Admin\PrescriptionController@OrdersShipped');
Route::get('prescription/final/deleivery', 'Admin\PrescriptionController@FinalDeleivery')->name('admin.prescription.final.deleivery');
Route::get('prescription/order/delivered/{id}', 'Admin\PrescriptionController@UpdateDelivery');
Route::get('prescription/success/deleivery', 'Admin\PrescriptionController@SuccessDeleivery')->name('admin.prescription.success.deleivery');
Route::get('prescription/cancel/{id}', 'Admin\PrescriptionController@CancelDeleivery');
Route::get('order/cancel', 'Admin\PrescriptionController@orderCancel')->name('admin.prescription.cancel.order');
Route::post('place/order','Admin\PrescriptionController@searchOrder')->name('create.orders.med');
Route::post('make/carts','Admin\PrescriptionController@makeCart')->name('make.orders.med');
Route::get('view/carts','Admin\PrescriptionController@viewCart')->name('view.carts');
Route::get('update/qty/{id}', 'Admin\PrescriptionController@updateQty')->name('update.qty');
Route::post('update/cart/{id}','Admin\PrescriptionController@updateCart');
Route::post('/book/order', 'Admin\PrescriptionController@makePayment')->name('book.order');
Route::get('delete/medicine/{id}','Admin\PrescriptionController@removeMedicine');
Route::get('delete/cart/{id}','Admin\PrescriptionController@removeCart');
Route::get('clear/cart','Admin\PrescriptionController@clearCart')->name('clear.cart');



// Admin Profile Module

Route::get('admin/profile', 'Admin\ProfileController@viewProfile')->name('admin.profile');
Route::post('update/profile', 'Admin\ProfileController@updateProfile')->name('update.profile');
Route::get('change/password', 'Admin\ProfileController@changePassword')->name('change.password');
Route::post('user/password/update', 'Admin\ProfileController@update_password')->name('update.password');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
