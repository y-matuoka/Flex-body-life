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

// 下２つの記述は消してください。
// views作成時に画面で確認したい為、記述しました。
Route::get('auth/register', function(){
    return view('auth.register');
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

// 5/14追加views作成時に画面で確認したい為、記述しました。

Route::get('/auth/muscle', function () {
    return view('auth.muscle'); // 'resources/views/auth/muscle.blade.php' に対応します
})->name('auth.muscle');


Route::get('/auth/stretch', function () {
    return view('auth.stretch'); // 'resources/views/auth/stretch.blade.php' に対応します
})->name('auth.stretch');

