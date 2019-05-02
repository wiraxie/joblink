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

//test//
Route::group(['namespace' => 'Api\V1', 'as' => 'api'], function () {

		//199a9ad30edbbb576147a812ac41d490

        Route::post('login', 'loginController@login');
		
		Route::get('refresh', 'loginController@refresh');
		
		Route::post('registration', 'registrationController@registration');
		
		Route::post('registrationcode', 'registrationController@registrationcode');
		
		Route::post('confirmemail', 'confirmEmailController@confirmemail');
		
		Route::post('inputcode', 'resetPasswordController@inputcode');

		Route::post('codeisvalid', 'resetPasswordController@codeisvalid');
		
});
//.end of test.//
