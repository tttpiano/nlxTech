<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', function () {
    $pageTitle = "nlxTech";
    return view('front.index', ['pageTitle' => $pageTitle]);
});
Route::get('/blog', function () {
    $pageTitle = "Tin Tức";
    return view('front.blog', ['pageTitle' => $pageTitle]);
});
Route::get('/blog/1', function () {
    $pageTitle = "Bài Viết";
    return view('front.blog_detail', ['pageTitle' => $pageTitle]);
});
Route::get('/contact', function () {
    $pageTitle = "Liên Hệ";
    return view('front.contact', ['pageTitle' => $pageTitle]);
});
//Route::get('', [ProductController::class, 'showProduct'])->name('home');
