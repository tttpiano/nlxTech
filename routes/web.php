<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PartyRelationshipController;
use App\Http\Controllers\ProductController;
use App\Models\Party;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Renderable;
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

//Post Admin


Route::post('/posts/{postId}/update-status', [PostController::class, 'updateStatus']);

///-------------------------------------------------------------------------------------------------------------------------
/// ----------------------------------- ADMIN NLXTech ------------------------------------------
///---------------------------------------------------------------------------------------------------------------------------------
Route::get('/admin', function () {
    $pageTitle = "admin";
    return view('front.admins.index',   ['pageTitle' => $pageTitle]);
});
Route::get('/admin/product',[ProductController::class, 'getAllProductAdmin'])->name('admin_product');

//// -------------------------------------- ADMIN -> PRODUCT -----------------------------------------
Route::get('/admin/product/add', [ProductController::class, 'productAdd'])->name('product_add');
Route::get('/admin/product/edit/{id}', [ProductController::class, 'productEdit'])->name('product_edit');
Route::post('/admin/product/add', [ProductController::class, 'insert'] )->name('product.add');
Route::post('upload-images',[ProductController::class, 'storeImage'])->name('image_pro.store');
Route::put('/admin/product/edit', [ProductController::class, 'update'] )->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/admin/product/search', [ProductController::class, 'search'])->name('search.product');


//// -------------------------------------- ADMIN -> POST -----------------------------------------

/// hien thi form
Route::get('/admin/post/edit/{id}', [PostController::class, 'postEdit'])->name('post_edit');
Route::get('/admin/post/add', [PostController::class, 'postAdd'])->name('post_add');
Route::post('/admin/add', [PostController::class, 'insert'] )->name('post.add');
Route::put('/admin/edit', [PostController::class, 'update'] )->name('post.edit');
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/admin/post', [PostController::class, 'index'])->name('admin_post');
Route::post('/admin/post/insert', [PostController::class, 'insert'])->name('admin_post_insert');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/admin/post/search', [PostController::class, 'search'])->name('search.post');

//// -------------------------------------- ADMIN -> PARTY_RELATIONSHIP  -----------------------------------------
Route::get('/admin/party_relationship', [PartyRelationshipController::class, 'viewPartyRelationship'])->name('admin_party_relationship');
Route::get('/admin/party_relationship/add', [PartyRelationshipController::class, 'partyAdd'])->name('party_relationship_add');
Route::get('/admin/party_relationship/{id}', [PartyRelationshipController::class, 'partyEdit'])->name('party_relationship_edit');
Route::get('/admin/party_relationship2/{id}', [PartyRelationshipController::class, 'partyEdit2'])->name('party_relationship_edit2');
Route::post('/admin/party_relationship', [PartyRelationshipController::class, 'insert'] )->name('party_relationship.addcategory');
Route::post('/admin/party_relationship2', [PartyRelationshipController::class, 'insert2'] )->name('party_relationship.addcategorychild');
Route::delete('/party_relationship/{id}', [PartyRelationshipController::class, 'destroy_category'])->name('party_relationship.destroy1');
Route::delete('/party_relationship2/{id}', [PartyRelationshipController::class, 'destroy_category_child'])->name('party_relationship.destroy2');
Route::put('/admin/party_relationship/edit', [PartyRelationshipController::class, 'updatetCategory'])->name('party_relationship_category_update');
Route::put('/admin/party_relationship2/edit', [PartyRelationshipController::class, 'updatetCategory2'])->name('party_relationship_category_update2');

//// -------------------------------------- ADMIN -> PARTY -----------------------------------------
/// //// -------------------------------------- PARTY -> Categotry_Child  -----------------------------------------
Route::get('/admin/category_child', [PartyController::class, 'indexCategory_child'])->name('category_child');
Route::get('/admin/category_child_add', [PartyController::class, 'addCategory_child'])->name('category_child_add');
Route::get('/admin/category_child_edit/{id}',[PartyController::class, 'editCategory_child'])->name('category_child_edit');
Route::post('/admin/category_child/add', [PartyController::class, 'insertCategory_child'] )->name('category_child.add');
Route::put('/admin/category_child_edit/edit', [PartyController::class, 'updatetCategory_child'])->name('category_child_update');
Route::delete('/categorys_child/{id}', [PartyController::class, 'destroy_category_child'])->name('category_child.destroy');
Route::get('/admin/category_child/search', [PartyController::class, 'search_category_child'])->name('search.category_child');
Route::get('/admin/category_child/pagin/{id}', [PartyController::class, 'pagin_category_child'])->name('pagin.category_child');
Route::get('/ajax/category_childs', [PartyController::class, 'ajaxPaginationCategory_child'])->name('ajax.category_childs');

/// //// -------------------------------------- PARTY -> Brand  -----------------------------------------
Route::get('/admin/brand',[PartyController::class, 'indexBrand'])->name('brand');
Route::get('/admin/brand_add',[PartyController::class, 'addBrand'])->name('brand_add');
Route::get('/admin/brand_edit/{id}',[PartyController::class, 'editBrand'])->name('brand_edit');
Route::post('/admin/brand/add', [PartyController::class, 'insertBrand'] )->name('brand.add');
Route::put('/admin/brand_edit/edit', [PartyController::class, 'updatetBrand'])->name('brand_update');
Route::delete('/brands/{id}', [PartyController::class, 'destroy_brand'])->name('brand.destroy');
Route::get('/admin/brand/search', [PartyController::class, 'search_brand'])->name('search.brand');
Route::get('/admin/brand/pagin/{id}', [PartyController::class, 'pagin_brand'])->name('pagin.brand');
Route::get('/ajax/brands', [PartyController::class, 'ajaxPaginationBrand'])->name('ajax.brands');


/// //// -------------------------------------- PARTY -> Wattage  -----------------------------------------

Route::get('/admin/wattage', [PartyController::class, 'indexWattage'])->name('wattage');
Route::get('/admin/wattage_add',[PartyController::class, 'addWattage'])->name('wattage_add');
Route::get('/admin/wattage_edit/{id}', [PartyController::class, 'editWattage'])->name('wattage_edit');
Route::post('/admin/wattage/add', [PartyController::class, 'insertWattage'] )->name('wattage.add');
Route::put('/admin/wattage_edit/edit', [PartyController::class, 'updatetWattage'])->name('wattage_update');
Route::delete('/wattage/{id}', [PartyController::class, 'destroy_wattage'])->name('wattage.destroy');
Route::get('/admin/wattage/search', [PartyController::class, 'search_wattage'])->name('search.wattage');
Route::get('/admin/wattage/pagin/{id}', [PartyController::class, 'pagin_wattage'])->name('pagin.wattage');
Route::get('/ajax/wattages', [PartyController::class, 'ajaxPaginationWattage'])->name('ajax.wattages');

/// //// -------------------------------------- PARTY -> Category  -----------------------------------------
Route::get('/admin/category', [PartyController::class, 'indexCategory'])->name('category');
Route::get('/admin/category_add',[PartyController::class, 'addCategory'])->name('category_add');
Route::get('/admin/category_edit/{id}', [PartyController::class, 'editCategory'])->name('category_edit');
Route::post('/admin/category/add', [PartyController::class, 'insertCategory'] )->name('category.add');
Route::put('/admin/category_edit/edit', [PartyController::class, 'updatetCategory'])->name('category_update');
Route::delete('/categorys/{id}', [PartyController::class, 'destroy_category'])->name('category.destroy');
Route::get('/admin/category/search', [PartyController::class, 'search_category'])->name('search.category');
Route::get('/admin/category/pagin/{id}', [PartyController::class, 'pagin_category'])->name('pagin.category');
Route::get('/ajax/categorys', [PartyController::class, 'ajaxPaginationCategory'])->name('ajax.categorys');

/// ----------------------------------- UPLOAD_IMG -----------------------------------------------
///
Route::post('/upload/image', [PostController::class, 'upload'])->name('upload.image');
Route::post('upload-image',[PostController::class, 'storeImage'])->name('image.store');
Route::post('/upload', [PostController::class, 'uploadBanner'])->name('upload.banner');
Route::post('/upload/image', [PostController::class, 'upload'])->name('upload.image');

//Banner
Route::get('admin/banners', [BannerController::class, 'index'])->name('admin.banners.index');
Route::get('banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
Route::post('banners', [BannerController::class, 'store'])->name('admin.banners.store');
Route::get('banners/{banner}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
Route::put('banners/{banner}', [BannerController::class, 'update'])->name('admin.banners.update');
Route::delete('banners/{banner}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
