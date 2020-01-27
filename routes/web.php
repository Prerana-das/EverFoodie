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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return view('admin');
});




// Category Route
Route::get('/app/all_category', "CategoryController@allCategory");
Route::post('/app/add_category', "CategoryController@storeCategory");
Route::post('/app/edit_category', "CategoryController@updateCategory");
Route::post('/app/delete_category', "CategoryController@deleteCategory");


Route::get('/app/all_city', "CityController@allCity");
Route::post('/app/add_city', "CityController@storeCity");
Route::post('/app/upload', "CityController@upload");


//Auth::routes();


Route::post('/app/registration', "UserController@registration");
Route::post('/app/login', "UserController@login");

Route::get('/logout', function () {
    Auth::logout();
    Session::flush();
    return redirect("/");

});

Route::any('{slug}', 'HomeController@home')->where('slug', '([A-z\d-\/_.]+)?');  //