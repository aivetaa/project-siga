<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TotalusiasekolahController;


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

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', 'HomeController@index')->name('home.index');

    Route::get('data-usiasekolah', 'UsiasekolahController@index')->name('usiasekolah.index');

    Route::get('/detailgender/{id}', 'HomeController@show')->name('datagender.show');
    /**
     * Register Routes
     */
    Route::get('/register', 'RegisterController@show')->name('register.show');
    Route::post('/register', 'RegisterController@register')->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');
});

Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Routes
     */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    //dashboard
    Route::get('/dashboard', 'DashboardController@index')->name("dashboard");
    //import-data-excel
    Route::get('/import-excel', 'DatagenderanakController@index')->name("importgenderanak");
});


Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/getData', [ItemController::class, 'getData'])->name('items.getData');

Route::get('totalusiasekolah', [TotalusiasekolahController::class, 'index'])->name('totalusiasekolah.index');
Route::get('totalusiasekolah/list', [TotalusiasekolahController::class, 'getTotalusiasekolah'])->name('totalusiasekolah.list');