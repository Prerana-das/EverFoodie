<?php


use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
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



// Route::get('/restaurantProfile', function () {
//     return view('restaurantProfile');
// });




// Category Route
Route::get('/app/all_category', "CategoryController@allCategory");
Route::post('/app/add_category', "CategoryController@storeCategory");
Route::post('/app/edit_category', "CategoryController@updateCategory");
Route::post('/app/delete_category', "CategoryController@deleteCategory");
Route::get('/app/all_category_pagi', "CategoryController@all_category_pagi");


// City Route
Route::get('/app/all_city', "CityController@allCity");
Route::post('/app/add_city', "CityController@storeCity");
Route::post('/app/upload', "CityController@upload");
Route::post('/app/edit_city', "CityController@updateCity");
Route::post('/app/delete_city', "CityController@deleteCity");
Route::post( 'app/getUserImage', 'CityController@getUserImage');
Route::get('/app/get_all_city', "CityController@get_all_city");

// Area Route
Route::get('/app/all_area', "AreaController@allArea");
Route::post('/app/add_area', "AreaController@storeArea");
Route::post('/app/edit_area', "AreaController@updateArea");
Route::post('/app/delete_area', "AreaController@deleteArea");
Route::get('/app/all_area_list', "AreaController@all_area_list");

// Restaurant
Route::get('/app/restaurant/{id}', "RestaurantController@singleRestaurant");
Route::get('/app/all_city_restaurant/{id}', "RestaurantController@all_city_restaurant");
Route::get('/app/all_restaurant', "RestaurantController@all_restaurant");
Route::get('/app/all_restaurant_pagi', "RestaurantController@all_restaurant_pagi");
Route::get('/app/all_subscription', "RestaurantController@all_subscription");

// Restaurant food Route  
Route::get('/app/all_food', "FoodController@allFood");
Route::post('/app/add_food', "FoodController@storeFood");
Route::post('/app/edit_food', "FoodController@updateFood");
Route::post('/app/delete_food', "FoodController@deleteFood");
Route::get('/app/all_food_of_this_res', "FoodController@all_food_of_this_res");
Route::get('/app/all_food_pagi', "FoodController@all_food_pagi");


//Auth::routes();

Route::post('/app/edit_user', "UserController@updateUser");
Route::post('/app/delete_user', "UserController@deleteUser");
Route::post('/app/registration', "UserController@registration");
Route::post('/app/res_registration', "UserController@res_registration");  
Route::post('/app/login', "UserController@login");
Route::get('/app/all_user', "UserController@all_user");
Route::post('/app/changePassword', 'UserController@changePassword');
Route::get('/app/getDataBySearch', "UserController@getDataBySearch");
Route::get('/app/restaurant_user', "UserController@restaurant_user");
Route::get('/app/all_user_pagi', "UserController@all_user_pagi");
Route::get('/app/total_user', "UserController@total_user");
Route::post('/app/update_res_status', "UserController@update_res_status");



// Route::post('/app/changeIt', "UserController@changeIt");
// Route::get('/login', function () {
//     return view('login');
// });

//Review
Route::get('/app/all_review', "ReviewController@all_review");
Route::post('/app/reviews', "ReviewController@reviews");

//Order
Route::post('/app/place_order', "OrderController@place_order");
Route::get('/app/get_all_order', "OrderController@get_all_order");
Route::post('/app/cancel_order', "OrderController@cancel_order");
Route::get('/app/get_user_order', "OrderController@get_user_order");
Route::post('/app/user_order_cancel', "OrderController@user_order_cancel");



//Checkout
Route::get('/checkout/stripe', "CheckoutController@stripe");
Route::post('/checkout/stripepayment', "CheckoutController@stripePayment");

//Subscription
Route::post('/app/newSubscription', "HomeController@newSubscription");


Route::get('/login', "UserController@login_check");
Route::get('/register', function () {
    return view('register');
});
Route::get('/logout', function () {
    Auth::logout();
    Session::flush();
    Auth::check();
    return redirect("/login");
});


//Email
// Route::get('app/testEimal','UserController@testEmail');
Route::get('/forgot_password_view', function () {
    return view('forgot_password');
});
Route::post('/app/forgot_password', 'UserController@passwordToken');
Route::post('app/PasswordReset', 'UserController@PasswordReset');
Route::get('/passwordReset', 'UserController@passwordReset_view')->name('passwordReset');


Route::any('{slug}', 'HomeController@home')->where('slug', '([A-z\d-\/_.]+)?');