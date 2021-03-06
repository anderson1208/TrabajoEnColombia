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
    // return view('welcome');
    return redirect('company_login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware'=>'company_guest'], function(){
	// Route::post('company_logout', 'AuthCompany\LoginController@logout');
	Route::post('company_register', 'AuthCompany\RegisterController@register')->name('company.register');
	Route::get('company_register', 'AuthCompany\RegisterController@showLoginForm');
	Route::get('company_login', 'AuthCompany\LoginController@showLoginForm');
	Route::post('admin_login', 'AuthCompany\LoginController@login')->name('company.login');
// });

Route::group(['prefix' => 'company'], function() {
    
    Route::post('company_logout', 'AuthCompany\LoginController@logout')->name('company.logout');

    Route::get('/', 'CompanyController@home')->name('company.home');

    Route::resource('employee', 'Company\UserController');
    Route::resource('vacant', 'Company\VacantController');

});