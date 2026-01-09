<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function () {
	Route::get('/', 'home')->name('home');
	Route::get('/about', 'about')->name('about');
	// portfolio routes moved to PortfolioController
	Route::get('/services', 'services')->name('services');
	Route::get('/services/single', 'serviceSingle')->name('services.single');
	Route::get('/shop', 'shop')->name('shop');
	Route::get('/shop/{slug}', 'shopSingle')->name('shop.single');
	Route::get('/contact', 'contact')->name('contact');
	Route::get('/blog/single', 'blogSingle')->name('blog.single');
	Route::get('/blog/{slug}', 'blogShow')->name('blog.show');
	Route::get('/news', 'news')->name('news');
	Route::get('/team', 'team')->name('team');
	Route::get('/style-guide', 'styleGuide')->name('style-guide');
	Route::get('/error', 'errorPage')->name('error');
	Route::get('/password', 'password')->name('password');
    Route::post('/password', 'passwordSubmit')->name('password.submit');
	Route::get('/licenses', 'licenses')->name('licenses');
	Route::get('/changelog', 'changelog')->name('changelog');
    Route::post('/newsletter/subscribe', 'newsletterSubscribe')->name('newsletter.subscribe');
});

// Dynamic portfolio routes
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{slug}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{slug}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{slug}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout routes
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('checkout.process');
Route::get('/order/{order}/confirmation', [CartController::class, 'showConfirmation'])->name('order.confirmation');
Route::get('/order/{order}/print', [CartController::class, 'printBill'])->name('order.print');

// Debug route
Route::get('/debug', function() {
    return view('pages.debug');
})->name('debug');
