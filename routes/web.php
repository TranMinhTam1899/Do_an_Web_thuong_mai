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
// LOGIN
Route::get('/login', function () {
    return view('client.pages.login');
})->name('client.login');
// CLIENT
Route::get('/', function () {
    return view('client.pages.index');
})->name('client.index');

// kenh nguoi ban
Route::get('/seller', function () {
    return view('shop.pages.index');
})->name('client.seller');

// ADMIN
Route::get('/admin', function () {
    return view('admin.pages.index');
})->name('admin.index');

// group admin
Route::prefix('admin')->group(function(){
    Route::name('admin.')->group(function(){
        // sản phẩm
        Route::get('/add-product', function () {
            return view('admin.pages.product.add-product');
        })->name('add-product');

        Route::get('/list-product', function () {
            return view('admin.pages.product.list-product');
        })->name('list-product');
        // shop
        Route::get('/add-shop', function () {
            return view('admin.pages.shop.add-shop');
        })->name('add-shop');

        Route::get('/list-shop', function () {
            return view('admin.pages.shop.list-shop');
        })->name('list-shop');
    
        // user
        Route::get('/add-user', function () {
            return view('admin.pages.user.add-user');
        })->name('add-user');

        Route::get('/list-user', 'UserController@index')->name('list-user');


        // Route::prefix('linh-vuc')->group(function(){
        //     Route::name('linh-vuc.')->group(function(){
        //         Route::get('/','LinhVucController@index')->name('danh-sach');
        //         Route::get('them-moi','LinhVucController@create')->name('them-moi');
        //         Route::post('them-moi','LinhVucController@store')->name('xu-ly-them-moi');
        //         Route::get('cap-nhap/{id}','LinhVucController@edit')->name('cap-nhat');
        //         Route::post('cap-nhap/{id}','LinhVucController@update')->name('xu-ly-cap-nhat');
        //         Route::get('xoa/{id}', 'LinhVucController@destroy')->name('xoa');
        //     });
        // });

        // category
        Route::get('/add-category', function () {
            return view('admin.pages.category.add-category');
        })->name('add-category');

        Route::get('/list-category', 'CategoryController@index')->name('list-category');




        // statistical

        Route::get('/add-statistical', function () {
            return view('admin.pages.statistical.add-statistical');
        })->name('add-statistical');

        Route::get('/list-statistical', function () {
            return view('admin.pages.statistical.list-statistical');
        })->name('list-statistical');

        // post

        Route::get('/add-post', function () {
            return view('admin.pages.post.add-post');
        })->name('add-post');

        Route::get('/list-post', function () {
            return view('admin.pages.post.list-post');
        })->name('list-post');

        // setting
        Route::get('/setting', function () {
            return view('admin.pages.setting.setting');
        })->name('setting');
    });
});

// group shop
Route::prefix('shop')->group(function(){
    Route::name('shop.')->group(function(){
        Route::get('/adver', function () {
            return view('shop.pages.adver');
        })->name('adver');
        
        Route::get('/bill', function () {
            return view('shop.pages.bill');
        })->name('bill');
        
        Route::get('/product', function () {
            return view('shop.pages.product_shop.add-product-shop');
        })->name('product');
        Route::get('/list-product', function () {
            return view('shop.pages.product_shop.list-product-shop');
        })->name('list-product');
        
        Route::get('/report', function () {
            return view('shop.pages.shop_mana.report');
        })->name('report');
        Route::get('/review', function () {
            return view('shop.pages.shop_mana.review');
        })->name('review');
        Route::get('/setting', function () {
            return view('shop.pages.shop_mana.setting_shop');
        })->name('setting_shop');
        Route::get('/update-shop', function () {
            return view('shop.pages.shop_mana.update-shop');
        })->name('update-shop');
        Route::get('/update-user', function () {
            return view('shop.pages.shop_mana.update-user');
        })->name('update-user');
    });
});

// group client
// Route::prefix('shop')->group(function(){
//     Route::name('shop.')->group(function(){

//     });
// });

Route::get('/client/about', function () {
    return view('client.pages.about');
})->name('client.about');
Route::get('/client/cart', function () {
    return view('client.pages.cart');
})->name('client.cart');
Route::get('/client/contact', function () {
    return view('client.pages.contact');
})->name('client.contact');
Route::get('/client/detail', function () {
    return view('client.pages.detail');
})->name('client.detail');
Route::get('/client/list-product','ProduceController@index')->name('client.list-product');

// 404
Route::get('/404', function () {
    return view('client.pages.404');
})->name('client.404');


