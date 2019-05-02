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

//Route::get('/admin/file/pdf','AdminApplicants20Controller@export_pdf');



Route::group(['namespace' => 'Api\V1'], function () {
	Route::get('/admin/pdf', 'topdfcontroller@export_pdf');
	
	/*Route::get('/admin/pdf}', [
		//'as' => 'getpdf', 
		'uses' => 'topdfcontroller@export_pdf'
	]);*/
});