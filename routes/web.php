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
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/mypage', 'MyPageController@index')->name('mypage');
Route::post('/upload-avatar', 'MyPageController@uploadAvatar')->name('upload.avatar');
// Route::delete('/delete-avatar', 'MyPageController@deleteAvatar')->name('delete.avatar');
Route::post('/delete-avatar', 'MyPageController@deleteAvatar')->name('delete.avatar');


// マイページ更新ページ
Route::get('/mypage/update', 'MypageUpdateController@show')->name('mypage.update');
Route::post('/mypage/update', 'MypageUpdateController@updateProfile')->name('update.profile');


Auth::routes();

//目標設定ページ
Route::group(['middleware' => 'auth'],function(){
    Route::get('/goal_setting/index', 'GoalSettingController@index')->name('goal.index');
    Route::post('/goal_setting/index',  'GoalSettingController@store')->name('goal.store');

    Route::get('/goal_setting/{id}/update', 'GoalSettingController@edit')->name('goal.edit');
    Route::post('/goal_setting/{id}/update',  'GoalSettingController@update')->name('goal.update');
});

Route::get('goal_setting/index', function(){
    return view('goal_setting.index');
});

// 5/8追加views作成時に画面で確認したい為、記述しました。
Route::get('auth/trainingmenu', function(){
    return view('auth.trainingmenu');
});
// 5/10追加views作成時に画面で確認したい為、記述しました。
Route::get('auth/trainingall', function(){
    return view('auth.trainingall');
});
Route::get('auth/trainingall_2', function(){
    return view('auth.trainingall_2');
});

// 5/14追加views作成時に画面で確認したい為、記述しました。

Route::get('/auth/trainingall', function () {
    return view('auth.trainingall'); 
})->name('auth.trainingall');


Route::get('/auth/trainingall_2', function () {
    return view('auth.trainingall_2'); 
})->name('auth.trainingall_2');



Route::get('/auth/muscle', function () {
    return view('auth.muscle'); 
})->name('auth.muscle');


Route::get('/auth/stretch', function () {
    return view('auth.stretch'); 
})->name('auth.stretch');
