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
Route::get('/mypage', 'MyPageController@index');
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
    return view('auth.stretch'); // 'resources/views/auth/stretch.blade.php' に対応します
})->name('auth.stretch');
//目標設定更新ページ。ビューをみるために記載しました
Route::get('goal_setting/update', function(){
    return view('goal_setting.update');
});
