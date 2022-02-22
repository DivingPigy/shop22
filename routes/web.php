<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/login', function () {
    return view('login.admin.login');
}) -> name('admin.login');

Route::post('/admin/login', 'Auth\admin\LoginController@login');
Route::get('/admin/logout', 'Auth\admin\LoginController@logout') -> name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['manager:manager']], function () {

    Route::get('/', function () {
        return view('manage.dashboard');
    }) -> name('admin.index');

    Route::resource('/plateforms', 'Admin\PlateformController');
    Route::resource('/exchanges', 'Admin\ExchangeController');
    Route::resource('/games', 'Admin\GameController');
    Route::resource('/inventories', 'Admin\InventoryController');

    Route::get('/inventories/import/{id}', 'Admin\InventoryController@showImport') -> name('inventories.import');
    Route::post('/inventories/import/{id}', 'Admin\InventoryController@saveImport') -> name('inventories.saveImport');
});

Route::get('/checkout', 'CheckoutController@index') -> name('checkout');

Route::get('/login', 'Auth\Front\LoginController@index') -> name('login');
Route::post('/login', 'Auth\Front\LoginController@login') -> name('loginuser');

Route::resource('/cart', 'Front\CartController') -> middleware(['auth' , 'login']);

Route::get('/register', 'Auth\Front\RegisterController@index') -> name('register');
Route::post('/register', 'Auth\Front\RegisterController@register') -> name('registeruser');
Route::get('/logout', 'Auth\Front\LoginController@logout') -> name('logout');

Route::get('/', 'Front\HomeController@index') -> name('home');

Route::get('/about', 'Front\AboutController@index') -> name('about');

Route::get('/contact', 'Front\ContactController@index') -> name('contact');
Route::post('/contact', 'Front\ContactController@post') -> name('contact.post');

Route::get('/{id}', 'Front\HomeController@show') -> where('id' , '[0-9]+') -> name('show');
Route::get('/{plateform}', 'Front\HomeController@game') -> where('plateform' , '[A-Za-z]+') -> name('game');