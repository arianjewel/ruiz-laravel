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

Route::prefix('/')->group(function (){
    Route::get('/', 'RuizController@index')->name('/');


    Route::get('/shop', 'RuizController@shop')->name('shop');
    Route::get('/category-product/{id}', 'RuizController@catProduct')->name('cat-product');
    Route::get('/product-details/{id}', 'RuizController@productDetails')->name('product-details');
    Route::post('/search', 'RuizController@searchProducts')->name('product.search');


    Route::get('/blog', 'RuizController@blogShow')->name('blog');


    Route::resource('/contact', 'ContactController');


    Route::prefix('/my-account')->group(function (){
        Route::group(['middleware' => 'auth'], function (){
            Route::get('/', 'RuizController@myAccount')->name('my-account');
            Route::get('/address', 'AddressController@index')->name('address.index');
            Route::post('/store', 'AddressController@store')->name('address.store');
            Route::get('/view', 'AddressController@show')->name('address.show');
            Route::get('/edit/{id}', 'AddressController@edit')->name('address.edit');
            Route::post('/update/{id}', 'AddressController@update')->name('address.update');
            Route::get('/order/{id}', 'OrderController@frontOrderShow')->name('front.order.show');

        });
    });



    Route::prefix('/cart')->group(function (){
        Route::post('/', 'CartController@addToCart')->name('add-cart');
        Route::get('/', 'CartController@viewCart')->name('view-cart');
        Route::get('/{id}', 'CartController@deleteCart')->name('delete-cart');
        Route::post('/update', 'CartController@updateCart')->name('update-cart');
        Route::post('/coupon', 'CartController@applyCoupon')->name('coupon.apply')->middleware('auth');
    });

    Route::resource('/checkout', 'CheckoutController')->middleware('auth');

    Route::group(['middleware' => 'auth'], function (){
        Route::get('/stripe', 'StripeController@stripe');
        Route::post('/stripe', 'StripeController@stripePost')->name('stripe.post');
    });


    
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/admin')->group(function (){
    Route::group(['middleware' => ['auth', 'admin']], function (){
        Route::get('/', 'AdminController@index')->name('admin');

        Route::prefix('/category')->group(function () {
            Route::get('/add', 'CategoryController@addCategory')->name('category');
            Route::Post('/add', 'CategoryController@storeCategory')->name('store-category');
            Route::get('/', 'CategoryController@manageCategory')->name('manage-category');
            Route::post('/update', 'CategoryController@updateCategory')->name('update-category');
            Route::get('/unpublished/{id}', 'CategoryController@unpublishedCategory')->name('unpublished-category');
            Route::get('/published/{id}', 'CategoryController@publishedCategory')->name('published-category');
            Route::get('/delete/{id}', 'CategoryController@deleteCategory')->name('delete-category');
        });

        Route::prefix('/brand')->group(function (){
            Route::get('/add', 'BrandController@addBrand')->name('brand');
            Route::Post('/add', 'BrandController@storeBrand')->name('store-brand');
            Route::get('/','BrandController@manageBrand')->name('manage-brand');
        });

        Route::prefix('/product')->group(function (){
            Route::get('/add', 'ProductController@addProduct')->name('add-product');
            Route::post('/add', 'ProductController@storeProduct')->name('store-product');
            Route::get('/manage', 'ProductController@manageProduct')->name('manage-product');
            Route::get('/delete/{id}', 'ProductController@deleteProduct')->name('product.delete');
            Route::get('/unpublished/{id}', 'ProductController@unpublishedProduct')->name('product.unpublished');
            Route::get('/published/{id}', 'ProductController@publishedProduct')->name('product.published');
            Route::post('/update', 'ProductController@updateProduct')->name('product.update');
        });


        Route::resource('/coupon', 'CouponController');

        Route::prefix('/order')->group(function(){
            Route::get('/', 'OrderController@orderShow')->name('order.all');
            Route::get('/single/{id}', 'OrderController@orderSingle')->name('order.single');
            Route::get('/delete/{id}', 'OrderController@orderDelete')->name('order.delete');
            Route::post('/update', 'OrderController@orderUpdate')->name('order.update');
            Route::get('/pdf/{id}', 'OrderController@orderPdf')->name('order.pdf');
        });


        Route::prefix('/user')->group(function(){
            Route::get('/', 'UserController@userShow')->name('user.all');
            Route::get('/delete/{id}', 'UserController@userDelete')->name('user.delete');
            Route::post('/update', 'UserController@userUpdate')->name('user.update');
        });
    });
});

