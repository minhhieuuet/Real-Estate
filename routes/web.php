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

Route::get('san-pham','HomeController@productsAll');
Route::get('/san-pham/{slug}/{id}','HomeController@product');

Route::get('danh-muc/{slug}/{id}','HomeController@productsByCategory');
Route::get('/tim-kiem','HomeController@productsByQuery');


Route::get('/about', function () {
    return view('client.about');
});
Route::get('/lien-he', function () {
    return view('client.contact');
});




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
