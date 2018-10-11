<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category','CategoryController@index');
Route::group(['prefix'=>'product'],function(){
  Route::get('hot','ProductController@hotProduct');
  Route::get('new','ProductController@newProduct');
});

Route::group(['prefix'=>'admin'],function(){
  Route::group(['prefix'=>'category'],function(){
      Route::resource('/','CategoryController');
      Route::post('edit','CategoryController@editCategory')->name('category.edit');
      Route::post('toogle','CategoryController@toogleShowHide');
  });

  Route::group(['prefix'=>'product'],function(){
    Route::resource('/','ProductController');
  });
});
