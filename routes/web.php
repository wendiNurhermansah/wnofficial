<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('MasterRole')->namespace('masterRole')->name('MasterRole.')->group(function(){
    //role
    Route::get('addpermission/{id}', 'RoleController@permission')->name('role.addpermission');
    Route::post('storePermission', 'RoleController@storePermission')->name('storePermissions');

    Route::post('role/api', 'RoleController@api')->name('role.api');
    Route::get('getPermission/{id}', 'RoleController@getPermission')->name('getPermissions');
    Route::delete('destroyPermission/{name}', 'RoleController@destroyPermission')->name('destroyPermission');
    Route::resource('role', 'RoleController');


    //permissions
    Route::resource('permissions', 'PermissionsController');
    Route::post('permissions/api', 'PermissionsController@api')->name('permissions.api');

    //pengguna
    Route::resource('pengguna', 'PenggunaController');
    Route::post('pengguna/api', 'PenggunaController@api')->name('pengguna.api');
    Route::get('{id}/editPassword', 'PenggunaController@editPassword')->name('editPassword');
    Route::post('{id}/updatePassword', 'PenggunaController@updatePassword')->name('updatePassword');
});

Route::prefix('MasterPesanan')->namespace('masterPesanan')->name('MasterPesanan.')->group(function(){
    Route::resource('list_orderan', 'OrderanController');
    Route::get('orderan', 'OrderanController@order')->name('orderan.order');
    Route::get('pencarian', 'OrderanController@pencarian')->name('orderan.pencarian');
    // Route::get('detail/{id}', 'OrderanController@detail')->name('list_orderan.detail');

    //jenispesanan
    Route::get('jenis_pesanan/pesanan/{id}', 'JenisPesananController@pesanan')->name('jenis_pesanan.pesanan');
    Route::resource('jenis_pesanan', 'JenisPesananController');
    Route::post('jenis_pesanan/api', 'JenisPesananController@api')->name('jenis_pesanan.api');

 });




