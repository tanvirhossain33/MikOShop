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

Route::get('/','WelcomeController@index');
Route::get('/contact','WelcomeController@contact');
Route::get('/userLogin','WelcomeController@login');
Route::post('/newCustomer','WelcomeController@newLogCustomer');
Route::get('/user-logout','WelcomeController@userLogout');
Route::post('/newUserLogin','WelcomeController@userLogin');

Route::get('/category-view/{id}','WelcomeController@category');
Route::get('/product-details/{id}','WelcomeController@productDetalis');
Route::post('/add-to-cart','CartController@index');
Route::get('/show-cart','CartController@cartView');
Route::post('/update-cart','CartController@updateCart');
Route::get('/remove-cart-product/{rowId}','CartController@removeCartProduct');


Route::get('/checkout','CheckoutController@index');
Route::post('/new-customer','CheckoutController@newCustomer');
Route::get('/shipping-info','CheckoutController@shippingInfo');
Route::get('/user-logout','CheckoutController@userLogout');
Route::post('/new-shipping','CheckoutController@newShipping');
Route::get('/payment-info','CheckoutController@paymentInfo');
Route::post('/user-login','CheckoutController@userLogin');

Route::post('/new-order','CheckoutController@saveOrderInfo');

Route::get('/order','OrderController@index');

Route::get('/customer-home','CustomerController@customerHome');
Auth::routes();
Route::get('/dashboard','HomeController@index')->name('home');




Route::group(['middleware' => ['AuthenticateMiddleware']], function () {
    /*Category/add Info*/
Route::get('/category/add', 'CategoryController@createCategory');
Route::post('/category/save', 'CategoryController@storeCategory')->name('home');
Route::get('/category/manage', 'CategoryController@manageCategory')->name('home');
Route::get('/category/edit/{id}', 'CategoryController@editCategory')->name('home');
Route::post('/category/update', 'CategoryController@updateCategory')->name('home');
Route::get('/category/delete/{id}', 'CategoryController@deleteCategory')->name('home');

/*Category Info */

/*Manufacturer/add Info */
Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer')->name('home');
Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer')->name('home');
Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer')->name('home');
Route::get('/manufacturer/edit/{id}', 'ManufacturerController@editManufacturer')->name('home');
Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer')->name('home');
Route::get('/manufacturer/delete/{id}', 'ManufacturerController@deleteManufacturer')->name('home');
/*Manufacturer Info */

/*Product/add Info */
Route::get('/product/add', 'ProductController@createProduct')->name('home');
Route::post('/product/save', 'ProductController@storeProduct')->name('home');
Route::get('/product/manage', 'ProductController@manageProduct')->name('home');
Route::get('/product/view/{id}', 'ProductController@viewProduct')->name('home');
Route::get('/product/edit/{id}', 'ProductController@editProduct')->name('home');
Route::post('/product/update', 'ProductController@updateProduct')->name('home');
Route::get('/product/delete/{id}', 'ProductController@deleteProduct')->name('home');
/*product Info */
});

