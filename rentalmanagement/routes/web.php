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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin dashboard landlord
Route::get('/landlord','landlordcontroller@index')->name('admin.landlord.index');
Route::get('/landlord/create','landlordcontroller@create')->name('admin.landlord.create');
Route::post('/landlord/store','landlordcontroller@store')->name('admin.landlord.store');
Route::get('/landlord/view/{id}','landlordcontroller@show')->name('admin.landlord.show');
Route::get('/landlord/edit/{id}','landlordcontroller@edit')->name('admin.landlord.edit');
Route::post('/landlord/update/{id}','landlordcontroller@update')->name('admin.landlord.update');
Route::post('/landlord/delete','landlordcontroller@destroy')->name('admin.landlord.destory');

//admin dashboard house
Route::get('/house','housecontroller@index')->name('admin.house.index');
Route::get('/house/create','housecontroller@create')->name('admin.house.create');
Route::post('/house/store','housecontroller@store')->name('admin.house.store');
Route::get('/house/view/{id}','housecontroller@show')->name('admin.house.show');
Route::get('/house/edit/{id}','housecontroller@edit')->name('admin.house.edit');
Route::post('/house/update/{id}','housecontroller@update')->name('admin.house.update');
Route::post('/house/delete','housecontroller@destroy')->name('admin.house.destory');

