<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function () {
	Route::get('/', 'home')->name('home');
	Route::get('/about', 'about')->name('about');
	Route::get('/services', 'services')->name('services');
	Route::get('/services/single', 'serviceSingle')->name('services.single');
	Route::get('/shop', 'shop')->name('shop');
	Route::get('/shop/{slug}', 'shopSingle')->name('shop.single');
	Route::get('/contact', 'contact')->name('contact');
	Route::get('/blog/single', 'blogSingle')->name('blog.single');
	Route::get('/blog/{slug}', 'blogShow')->name('blog.show');
	Route::get('/news', 'news')->name('news');
	Route::get('/team', 'team')->name('team');
	Route::get('/error', 'errorPage')->name('error');
    Route::post('/newsletter/subscribe', 'newsletterSubscribe')->name('newsletter.subscribe');
});

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('/profile/password', [AuthController::class, 'updatePassword'])->middleware('auth')->name('profile.password');
Route::get('/password/forgot', [AuthController::class, 'showForgotPassword'])->name('password.forgot');
Route::post('/password/forgot', [AuthController::class, 'resetPassword'])->name('password.reset');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{slug}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{slug}', [CartController::class, 'update'])->middleware('auth')->name('cart.update');
Route::post('/cart/remove/{slug}', [CartController::class, 'remove'])->middleware('auth')->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->middleware('auth')->name('cart.clear');

// Wishlist routes
Route::get('/wishlist', [WishlistController::class, 'index'])->middleware('auth')->name('wishlist.index');
Route::post('/wishlist/add/{slug}', [WishlistController::class, 'add'])->middleware('auth')->name('wishlist.add');
Route::post('/wishlist/remove/{slug}', [WishlistController::class, 'remove'])->middleware('auth')->name('wishlist.remove');

// Checkout routes
Route::get('/checkout', [CartController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::post('/checkout/process', [CartController::class, 'processCheckout'])->middleware('auth')->name('checkout.process');
Route::get('/order/{order}/confirmation', [CartController::class, 'showConfirmation'])->middleware('auth')->name('order.confirmation');
Route::get('/order/{order}/print', [CartController::class, 'printBill'])->middleware('auth')->name('order.print');

// Debug route
Route::get('/debug', function() {
    return view('pages.debug');
})->name('debug');

// Admin panel routes (single separate admin panel)
Route::prefix('admin')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
	// Simple admin profile page
	Route::get('/profile', function () {
		return view('admin.profile');
	})->name('admin.profile');
    Route::resource('products', AdminProductController::class, ['as' => 'admin']);
    Route::resource('orders', OrderController::class, ['as' => 'admin', 'only' => ['index', 'show']]);
    Route::resource('customers', CustomerController::class, ['as' => 'admin', 'only' => ['index', 'show']]);
});