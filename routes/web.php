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
Route::get('/products/{primary_category}/{secondary_category}', 'productsController@index');
Route::get('/products/{id}', 'productsController@view');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/products/store', 'productsController@store');



Route::group(['middleware'=>'trackUser'], function(){

});


Route::group(['middleware'=>'authenticated'], function(){

});
Route::group(['middleware'=>'AdminAccessLevel3'], function(){


});
Route::group(['middleware'=>'AdminAccessLevel2'], function(){

});

Route::group(['middleware'=>'AdminAccessLevel1'], function(){
  Route::get('/products/create', 'productsController@create');
  Route::get('/administrator/manage', 'administratorController@manage');
  Route::post('/administrator/store', 'administratorController@store');
  Route::post('/administrator/update', 'administratorController@update');
});
