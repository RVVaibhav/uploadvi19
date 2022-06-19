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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['api']], function () {
	// register mobile no
	Route::post('mobile', 'Auth\RegisterController@registerMobile');
	Route::post('verify-mobile', 'Auth\RegisterController@verifyMobile');
	// register new user
	Route::post('register', 'Auth\RegisterController@registerMobileUser');
	
    Route::group(['middleware' => 'jwt.auth'], function () {
		// Route::get('authuser', 'Auth\LoginController@getAuthUser');
		Route::post('profile', 'UserController@updateProfile');
		Route::get('profile', 'UserController@getProfile');
		Route::get('follow', 'UserController@followUser');
		// post
		Route::post('userpost', 'PostController@userPost');
		Route::get('userpost', 'PostController@getUsersPosts');
		// algorithm users
		Route::get('userslist', 'UserController@getAlgorithmUsersPost');
		Route::get('chat-users', 'UserController@getAlgorithmUsers');
		// products
		Route::get('coins', 'ProductsController@getCoinsRate');

    });

});