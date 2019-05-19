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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * FREELANCER
 */
Route::get('freelancer-register','FreelancerController@registerFreelancerPage');
Route::post('freelancer-register','FreelancerController@registerFreelancer');
Route::get('freelancer-dashboard','FreelancerController@dashboardFreelancer');

Route::get('freelancer-profile','FreelancerController@getProfile');

Route::get('freelancer-search-project','ProjectController@index');

/**
 * EMPLOYER
 */
Route::get('employer-register','EmployerController@registerEmployerPage');
Route::post('employer-register','EmployerController@registerEmployer');
Route::get('employer-dashboard','EmployerController@dashboardEmployer');

Route::get('employer-profile','EmployerController@getProfile');

Route::get('employer-search-freelancer','EmployerController@searchFreelancerPage');

Route::get('employer-create-project','ProjectController@create');
Route::post('employer-create-project','ProjectController@store');
