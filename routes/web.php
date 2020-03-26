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


Route::get('/', function () 
{
    return view('welcome');
});

Route::group(['middleware' => 'disablepreventback'],function()
{
	Auth::routes();
	Route::get('/home', 'PagesController@count');
});

Auth::routes();

Route::view('/home', 'home')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'PagesController@count')->name('home');

Route::view('/partner', 'partner');
Route::post('/partner','PartnerController@store')->name('partner');
Route::post('/partners_update','PartnerController@update')->name('partners_update');
Route::post('/partners_list','PartnerController@find')->name('partners_find');
Route::post('/partners_details/{part_CompanyName?}', 'PartnerController@activityDetails');
Route::get('/partners_list','PartnerController@list')->name('partners_list');
Route::get('/partners_details/{part_CompanyName?}', 'PartnerController@partner')->name('partners_details');
Route::get('/partners_update/{part_CompanyName?}', 'PartnerController@update_details')->name('partners_update');
Route::get('/partners_delete/{part_CompanyName?}', 'PartnerController@delete')->name('partners_detele');

Route::view('/alliance', 'alliance');
Route::post('/alliance','AllianceController@store')->name('alliance');
Route::post('/alliance_list','AllianceController@find')->name('alliance_find');
Route::post('/alliance_update','AllianceController@update')->name('alliance_update');
Route::get('/alliance_list','AllianceController@list')->name('alliance_list');
Route::get('/alliance','PartnerController@index');
Route::get('/alliance_update/{all_PartnershipName?}', 'AllianceController@update_details')->name('alliance_update');
Route::get('/alliance_delete/{all_PartnershipName?}', 'AllianceController@delete')->name('alliance_delete');

Route::view('/activity', 'activity');
Route::post('/activity','ActivityController@store')->name('activity');
Route::post('/activity_list','ActivityController@find')->name('activity_find'); 
Route::post('/activity_update','ActivityController@update')->name('activity_update');
Route::get('/activity_list','ActivityController@list')->name('activity_list');
Route::get('/activity','AllianceController@index');
Route::get('/activity_update/{act_ActivityName?}', 'ActivityController@update_details')->name('activity_update');
Route::get('/activity_delete/{act_ActivityName?}', 'ActivityController@delete')->name('activity_delete');

Route::view('/progress', 'progress');
Route::post('/progress','ProgressController@store')->name('progress');
Route::post('/progress_update','ProgressController@update')->name('progress_update');
Route::get('/progress/{name_act?}','ActivityController@index');
Route::get('/progress_list/{activityName?}', 'ProgressController@progress')->name('progress_list');
Route::get('/progress_update/{prog_ID?}', 'ProgressController@update_details')->name('progress_update');
Route::get('/progress_delete/{prog_ID?}', 'ProgressController@delete')->name('progress_delete');
?>