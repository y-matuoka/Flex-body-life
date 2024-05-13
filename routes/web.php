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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

//目標設定ページ
Route::group(['middleware' => 'auth'],function(){
    Route::get('/goal_setting/index', 'GoalSettingController@index')->name('goal.index');
    Route::post('/goal_setting/index',  'GoalSettingController@store')->name('goal.store');

    Route::get('/goal_setting/{id}/update', 'GoalSettingController@edit')->name('goal.edit');
    Route::post('/goal_setting/{id}/update',  'GoalSettingController@update')->name('goal.update');
});


//目標設定更新ページ。ビューをみるために記載しました
Route::get('goal_setting/update', function(){
    return view('goal_setting.update');
});
Route::get('course_selection/index', function(){
    return view('course_selection.index');
});