<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Vendor\HomeController as VendorHomeController;

use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Vendor\BrandsController;
use App\Http\Controllers\Vendor\CategoriesController;
use App\Http\Controllers\Vendor\ProductsController;

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

Auth::routes();


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/product/details/{product}',[FrontController::class, 'product_details'])->name('product.details');
Route::get('/product/categories/{category}',[FrontController::class, 'category_details'])->name('products.category');
Route::get('/shop',[FrontController::class, 'shop'])->name('shop');
Route::get('/contact',[FrontController::class, 'contact'])->name('contact');
Route::get('/refund',[FrontController::class, 'refund'])->name('refund');
Route::get('/terms',[FrontController::class, 'terms'])->name('terms');
Route::get('/faqs',[FrontController::class, 'faqs'])->name('faqs');
Route::get('/about',[FrontController::class, 'about'])->name('about');
Route::post('/about',[CustomerController::class, 'store'])->name('customer.message.store');
    


Route::middleware('auth')->group(function () {
    Route::get('cart', [CustomerController::class, 'cart'])->name('cart');
    Route::post('cart/product/{product}', [CustomerController::class, 'add_to_cart'])->name('add.to.cart');
    Route::delete('cart/{cart}', [CustomerController::class, 'destroy'])->name('delete.cart.item');
    Route::delete('wishlist/{wishlist}', [CustomerController::class, 'destroy_wishlist'])->name('delete.wishlist.item');
    Route::get('wishlish', [CustomerController::class, 'wishlist'])->name('wishlist');
    Route::get('wishlish/product/{product}', [CustomerController::class, 'add_to_wishlist'])->name('add.to.wishlist');
    Route::get('checkout', [CustomerController::class, 'checkout'])->name('checkout');
    Route::get('details', [CustomerController::class, 'details'])->name('customer.details');
    Route::post('order/details', [CustomerController::class, 'store_order'])->name('order.store');
    Route::get('order/pay/{order}', [CustomerController::class, 'order_payment'])->name('order.payment');
    Route::post('order/{order}', [CustomerController::class, 'payment'])->name('process.payment');
    Route::get('order/payment/success', [CustomerController::class, 'payment_success'])->name('payment.success');
    Route::get('order/payment', [CustomerController::class, 'payment_cancel'])->name('payment.cancel');
    Route::get('payment/reciept/{payment}', [CustomerController::class, 'payment_reciept'])->name('payment.reciept');

});

Route::name('admin.')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('messages', MessagesController::class);
    Route::resource('payments', PaymentsController::class);
    Route::resource('orders', OrdersController::class);
    
    

    });

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('admin/profile', [HomeController::class, 'profile'])->name('profile');
    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');

    // Roles
    Route::delete('roles/destroy', [RolesController::class,'massDestroy'])->name('roles.massDestroy');

    // Users
    Route::delete('users/destroy', [UsersController::class,'massDestroy'])->name('users.massDestroy');
    Route::post('users/media', [UsersController::class,'storeMedia'])->name('users.storeMedia');
    Route::post('users/ckmedia', [UsersController::class,'storeCKEditorImages'])->name('users.storeCKEditorImages');


});

Route::name('vendor.')->group( function () {
    Route::get('/vendor/home', [VendorHomeController::class, 'index'])->name('dashboard');
    Route::get('vendor/profile', [VendorHomeController::class, 'profile'])->name('profile');
    Route::resource('products', ProductsController::class);
    Route::resource('brands', BrandsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::get('categories/show/{id}', [CategoriesController::class,'show'])->name('category.show');

    Route::post('products/media', [UsersController::class,'storeMedia'])->name('products.storeMedia');
    Route::post('products/ckmedia', [UsersController::class,'storeCKEditorImages'])->name('users.storeCKEditorImages');

});


