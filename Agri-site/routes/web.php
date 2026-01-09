<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Main Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/service', function () {
    return view('pages.service');
})->name('service');

Route::get('/shop', function () {
    return view('pages.shop');
})->name('shop');

Route::get('/portfolio', function () {
    return view('pages.portfolio');
})->name('portfolio');

Route::get('/team', function () {
    return view('pages.team');
})->name('team');

Route::get('/contact', function () {
    return view('pages.contact-page');
})->name('contact');


/*
|--------------------------------------------------------------------------
| Blog Pages
|--------------------------------------------------------------------------
*/

Route::get('/blog', function () {
    return view('pages.Recent');
})->name('blog.recent');

Route::get('/blog-single', function () {
    return view('pages.Blog-Single');
})->name('blog.single');


/*
|--------------------------------------------------------------------------
| Utility Pages
|--------------------------------------------------------------------------
*/

Route::get('/404', function () {
    return view('pages.Utility-Pages.error');
})->name('error.page');

Route::get('/password-protected', function () {
    return view('pages.Utility-Pages.Password-Protect');
})->name('password.protect');

Route::get('/licenses', function () {
    return view('pages.Utility-Pages.Licences');
})->name('licenses');

Route::get('/changelog', function () {
    return view('pages.Utility-Pages.Changelog');
})->name('changelog');
