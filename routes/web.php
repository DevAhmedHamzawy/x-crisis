<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@welcome');
Route::post('/sendcontact', 'HomeController@sendcontact');
Route::get('/the-page/{id?}', 'HomeController@pageShow');

Route::get('/home', function () {
    return redirect()->to('/dashboard');
});

Auth::routes();

Route::get('/dashboard', 'Admin\DashboardController@index')->name('home');

Route::resource('sliders', 'Admin\SliderController')->except('delete','show');
Route::get('sliders/{slider}', 'Admin\SliderController@destroy')->name('sliders.delete');

Route::resource('services', 'Admin\ServiceController')->except('delete','show');
Route::get('services/{service}', 'Admin\ServiceController@destroy')->name('services.delete');

Route::resource('servicestwo', 'Admin\ServiceTwoController')->except('delete','show');
Route::get('servicestwo/{id}', 'Admin\ServiceTwoController@destroy')->name('servicestwo.delete');


Route::resource('projects', 'Admin\ProjectController')->except('delete','show');
Route::get('projects/{project}', 'Admin\ProjectController@destroy')->name('projects.delete');


Route::resource('business', 'Admin\BusinessController')->only(['edit','update']);
Route::resource('settings', 'Admin\SettingController')->only(['edit','update']);

Route::resource('partners', 'Admin\PartnerController');
Route::get('partners/{partner}', 'Admin\PartnerController@destroy')->name('partners.delete');

Route::resource('contacts', 'Admin\ContactController');

Route::resource('pages', 'Admin\PageController')->except('delete','show');
Route::get('pages/{page}', 'Admin\PageController@destroy')->name('pages.delete');