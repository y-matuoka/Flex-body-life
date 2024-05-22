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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MypageUpdateController;
use App\Http\Controllers\DeleteController;



// アカウント削除(倫理削除)
Route::middleware(['auth'])->group(function () {
Route::get('/user/delete', 'DeleteController@show')->name('user.delete');
Route::post('/user/delete', 'DeleteController@delete')->name('user.delete.process');
});

// ホーム画面
Route::get('/', 'HomeController@index')->name('home');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

// マイページ
Route::get('/mypage', 'MyPageController@index')->name('mypage');

// マイページ、画像登録、解除に必要なルート
Route::post('/upload-avatar', 'MyPageController@uploadAvatar')->name('upload.avatar');
Route::post('/delete-avatar', 'MyPageController@deleteAvatar')->name('delete.avatar');


// Fullcalendar
Route::get('/calendar', function () {return view('calendar');});

Route::get('/mypage/{user}', 'MyPageController@index')->name('mypage');

// マイページ更新ページ
Route::get('/mypage/update', 'MypageUpdateController@show')->name('mypage.update');
Route::post('/mypage/update', 'MypageUpdateController@updateProfile')->name('update.profile');

// ログイン状態時にアクセス



//目標設定ページ
Route::group(['middleware' => 'auth'],function(){
    //目標設定
    Route::get('/goal_setting//index', 'GoalSettingController@index')->name('goal.index');
    Route::post('/goal_setting/index',  'GoalSettingController@store')->name('goal.store');
     //目標設定変更
    Route::get('/goal_setting/{id}/edit', 'GoalSettingController@edit')->name('goal.edit');
    Route::post('/goal_setting/{id}/edit',  'GoalSettingController@update')->name('goal.update');
    //コース選択
    Route::get('/courses/index', 'CourseController@index')->name('course.index');
    Route::post('/courses/index', 'CourseController@store')->name('course.store');
    //コース選択変更
    Route::get('/courses/{id}/edit', 'CourseController@edit')->name('course.edit');
    Route::post('/courses/{id}/edit', 'CourseController@update')->name('course.update');


    //コース変更完了しました画面
    // Route::get('/courses/{id}/updated', 'CourseController@show')->name('courses.updated');
});

Route::get('training/index', function(){
    return view('training.index');
});






Route::get('goal_setting/index', function(){
    return view('goal_setting.index');
});
// 5/8追加views作成時に画面で確認したい為、記述しました。
Route::get('/auth/trainingmenu', function(){
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





Route::get('/training/index', function(){
    return view('training/index');
})->name('training.index');

//目標設定更新ページ。ビューをみるために記載しました
Route::get('goal_setting/update', function(){
    return view('goal_setting.update');
});

// 5/15musclepageからmypageに行くためのルーティング

Route::get('mypage', function () {
    return view('mypage');
})->name('mypage');

// 5/15　musclepageからmypageに行くためのルーティング
// Route::get('mypage', function () {
//     return view('mypage');
// })->name('mypage');

// 5/17rimainderモック確認ビューの作成です
Route::get('auth/{user}/reminder','ReminderController@index' )->name('reminder');