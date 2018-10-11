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
// Client
Route::get('/', function () {
    return view('client.home');
});
Route::get('/product/{id}','HomeController@product');
Route::get('/category', function () {
    return view('client.categories');
});
Route::get('/about', function () {
    return view('client.about');
});
Route::get('/contact', function () {
    return view('client.contact');
});
Route::get('/upload',function(){
  return view('upload');
});
Route::post('/details','HomeController@upload');

// Admin
Route::group(['prefix'=>'admin'],function(){
  Route::get('/', function () {
      return view('admin.dashboard');
  });

  Route::get('/profile', function () {
      return view('admin.profile');
  });
  Route::group(['prefix'=>'product'],function(){
    Route::get('/add', function () {
        return view('admin.product.add');
    });
  });
  Route::get('/category',function(){
    return view('admin.category.index');
  });


});
