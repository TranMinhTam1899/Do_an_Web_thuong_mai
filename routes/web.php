<?php

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


Route::get('/', function () {
    return view('client.pages.index');
});

// kenh nguoi ban
Route::get('/seller', function () {
    return view('client.pages.shop');
})->name('client.seller');


// sản phẩm
Route::get('/admin/add-product', function () {
    return view('admin.pages.product.add-product');
})->name('admin.add-product');

Route::get('/admin/list-product', function () {
    return view('admin.pages.product.list-product');
})->name('admin.list-product');

// shop

Route::get('/admin/add-shop', function () {
    return view('admin.pages.shop.add-shop');
})->name('admin.add-shop');

Route::get('/admin/list-shop', function () {
    return view('admin.pages.shop.list-shop');
})->name('admin.list-shop');

// user
Route::get('/admin/add-user', function () {
    return view('admin.pages.user.add-user');
})->name('admin.add-user');

Route::get('/admin/list-user', function () {
    return view('admin.pages.user.list-user');
})->name('admin.list-user');

// category
Route::get('/admin/add-category', function () {
    return view('admin.pages.category.add-category');
})->name('admin.add-category');

Route::get('/admin/list-category', function () {
    return view('admin.pages.category.list-category');
})->name('admin.list-category');

// statistical

Route::get('/admin/add-statistical', function () {
    return view('admin.pages.statistical.add-statistical');
})->name('admin.add-statistical');

Route::get('/admin/list-statistical', function () {
    return view('admin.pages.statistical.list-statistical');
})->name('admin.list-statistical');

// post

Route::get('/admin/add-post', function () {
    return view('admin.pages.post.add-post');
})->name('admin.add-post');

Route::get('/admin/list-post', function () {
    return view('admin.pages.post.list-post');
})->name('admin.list-post');

// setting
Route::get('/admin/setting', function () {
    return view('admin.pages.setting.setting');
})->name('admin.setting');