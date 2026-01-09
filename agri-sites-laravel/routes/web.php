<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function () {
	Route::get('/', 'home')->name('home');
	Route::get('/about', 'about')->name('about');
	Route::get('/portfolio', 'portfolio')->name('portfolio');
	Route::get('/portfolio/single', 'portfolioSingle')->name('portfolio.single');
	Route::get('/services', 'services')->name('services');
	Route::get('/services/single', 'serviceSingle')->name('services.single');
	Route::get('/shop', 'shop')->name('shop');
	Route::get('/shop/{slug}', 'shopSingle')->name('shop.single');
	Route::get('/contact', 'contact')->name('contact');
	Route::get('/blog/single', 'blogSingle')->name('blog.single');
	Route::get('/news', 'news')->name('news');
	Route::get('/team', 'team')->name('team');
	Route::get('/style-guide', 'styleGuide')->name('style-guide');
	Route::get('/error', 'errorPage')->name('error');
	Route::get('/password', 'password')->name('password');
	Route::get('/licenses', 'licenses')->name('licenses');
	Route::get('/changelog', 'changelog')->name('changelog');
});
