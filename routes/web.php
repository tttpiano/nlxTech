<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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


Route::get('', [ProductController::class, 'getProductsWithImages'])->name('home');
Route::get('/contact', function () {
    $pageTitle = "Liên Hệ";
    return view('front.contact', ['pageTitle' => $pageTitle]);
})->name('contact');
//Blog
Route::get('/blog', [PostController::class, 'getAllBlogs'])->name('blog');
Route::get('/blog/{url_seo}', [PostController::class, 'show'])->name('posts.show');


//admin
Route::get('/admin', function () {
    $pageTitle = "admin";
    return view('front.admins.index',   ['pageTitle' => $pageTitle]);
});
Route::get('/admin/product', function () {
    $pageTitle = "admin_product";
    return view('front.admins.product',   ['pageTitle' => $pageTitle]);
})->name('admin_product');
//Post Admin


Route::post('/posts/{postId}/update-status', [PostController::class, 'updateStatus']);

Route::get('/admin/post', [PostController::class, 'index'])->name('admin_post');



Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');


Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/admin/add', [PostController::class, 'insert'] )->name('cart.add');
Route::put('/admin/edit', [PostController::class, 'update'] )->name('post.edit');

/// hien thi form
Route::get('/admin/post/edit/{id}', [PostController::class, 'postEdit'])->name('post_edit');
Route::get('/admin/post/add', [PostController::class, 'postAdd'])->name('post_add');
Route::post('/upload/image', [PostController::class, 'upload'])->name('upload.image');


Route::post('/upload', [PostController::class, 'uploadBanner'])->name('upload.banner');



Route::post('/upload/image', [PostController::class, 'upload'])->name('upload.image');


Route::post('/admin/post/insert', [PostController::class, 'insert'])->name('admin_post_insert');






Route::post('upload-image',[PostController::class, 'storeImage'])->name('image.store');
