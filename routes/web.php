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



// Route::get('/admin', function () {
//     return view('admin');
// });




// Category Route
Route::get('/app/all_category', "CategoryController@allCategory");
Route::post('/app/add_category', "CategoryController@storeCategory");
Route::post('/app/edit_category', "CategoryController@updateCategory");
Route::post('/app/delete_category', "CategoryController@deleteCategory");

// City Route
Route::get('/app/all_city', "CityController@allCity");
Route::post('/app/add_city', "CityController@storeCity");
Route::post('/app/upload', "CityController@upload");
Route::post('/app/edit_city', "CityController@updateCity");
Route::post('/app/delete_city', "CityController@deleteCity");
Route::post( 'app/getUserImage', 'CityController@getUserImage');

// Area Route
Route::get('/app/all_area', "AreaController@allArea");
Route::post('/app/add_area', "AreaController@storeArea");
Route::post('/app/edit_area', "AreaController@updateArea");
Route::post('/app/delete_area', "AreaController@deleteArea");

// Restaurant Route
Route::get('/app/all_restaurant', "RestaurantController@allRestaurant");
Route::post('/app/add_restaurant', "RestaurantController@storeRestaurant");
Route::post('/app/edit_restaurant', "RestaurantController@updateRestaurant");
Route::post('/app/delete_restaurant', "RestaurantController@deleteRestaurant");
Route::post('/app/changeIt', "RestaurantController@changeIt");

//Auth::routes();


Route::post('/app/registration', "UserController@registration");


Route::post('/app/login', "UserController@login");

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/logout', function () {
    Auth::logout();
    Session::flush();
    Auth::check();
    return redirect("/login");
});


Route::any('{slug}', 'HomeController@home')->where('slug', '([A-z\d-\/_.]+)?');