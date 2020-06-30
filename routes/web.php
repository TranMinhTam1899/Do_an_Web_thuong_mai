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
Route::get('/', 'PagesController@index')->name('client.index');

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

        // sub_category

        // setting
        Route::get('/setting', function () {
            return view('admin.pages.setting.setting');
        })->name('setting');

    });
});

// user
Route::prefix('user')->group(function(){
    Route::name('user.')->group(function(){
        Route::get('/','UserController@index')->name('listUser');
        Route::get('add-User','UserController@create')->name('them-moi');
        Route::post('add-User/create','UserController@store')->name('xu-ly-them-moi');
        Route::get('cap-nhap/{id}','UserController@edit')->name('cap-nhat');
        Route::post('cap-nhap/{id}','UserController@update')->name('xu-ly-cap-nhat');
        Route::get('xoa/{id}', 'UserController@destroy')->name('xoa');
    });
});


// category
Route::prefix('category')->group(function(){
    Route::name('category.')->group(function(){
        Route::get('/','CategoryController@index')->name('listCategory');
        Route::get('add-category','CategoryController@create')->name('them-moi');
        Route::post('add-category/create','CategoryController@store')->name('xu-ly-them-moi');
        Route::get('cap-nhap/{id}','CategoryController@edit')->name('cap-nhat');
        Route::post('cap-nhap/{id}','CategoryController@update')->name('xu-ly-cap-nhat');
        Route::get('xoa/{id}', 'CategoryController@destroy')->name('xoa');
    });
});

//produce
Route::prefix('product')->group(function(){
    Route::name('product.')->group(function(){
        Route::get('/','ProduceController@index')->name('listProduct');
        Route::get('add-product','ProduceController@create')->name('them-moi');
        Route::post('add-product/create','ProduceController@store')->name('xu-ly-them-moi');
        Route::get('cap-nhap/{id}','ProduceController@edit')->name('cap-nhat');
        Route::post('cap-nhap/{id}','ProduceController@update')->name('xu-ly-cap-nhat');
        Route::get('xoa/{id}', 'ProduceController@destroy')->name('xoa');
    });
});

// vendor
Route::prefix('vendor')->group(function(){
    Route::name('vendor.')->group(function(){
        Route::get('/','VendorController@index')->name('listVendor');
        Route::get('add-vendor','VendorController@create')->name('them-moi-vendor');
        Route::post('add-vendor/create','VendorController@store')->name('xu-ly-them-moi-vendor');
        Route::get('cap-nhap/{id}','VendorController@edit')->name('cap-nhat-vendor');
        Route::post('cap-nhap/{id}','VendorController@update')->name('xu-ly-cap-nhat-vendor');
        Route::get('xoa/{id}', 'VendorController@destroy')->name('xoa');
    });
});




// sub_category
Route::prefix('sub_category')->group(function(){
    Route::name('sub_category.')->group(function(){
        Route::get('/', function () {return view('admin.pages.sub_category.list-sub_category');})->name('listSubCategory');
        Route::get('/add-sub_category', function () {return view('admin.pages.sub_category.add-sub_category');})->name('them-moi-sub-category');
 
    });
});

// customer
// sub_category
Route::prefix('customer')->group(function(){
    Route::name('customer.')->group(function(){
        Route::get('/', 'CustomerController@index')->name('listCustomer');
        Route::get('add-customer','CustomerController@create')->name('them-moi-customer');
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
Route::get('/client/list-product','ProduceController@select')->name('client.list-product');

// 404
Route::get('/404', function () {
    return view('client.pages.404');
})->name('client.404');


