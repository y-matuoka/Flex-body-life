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

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MypageUpdateController;
use App\Http\Controllers\DeleteController;


// ホーム画面
Route::get('/', 'HomeController@index')->name('home');

//ログインしている場合のみ
Route::middleware(['auth'])->group(function () {
    // アカウント削除(倫理削除)
Route::get('/user/delete', 'DeleteController@show')->name('user.delete');
Route::post('/user/delete', 'DeleteController@delete')->name('user.delete.process');

// マイページ
Route::get('/mypage', 'MyPageController@index')->name('mypage');

// マイページ、画像登録、解除に必要なルート
Route::post('/upload-avatar', 'MyPageController@uploadAvatar')->name('upload.avatar');
Route::post('/delete-avatar', 'MyPageController@deleteAvatar')->name('delete.avatar');


// Fullcalendar
Route::get('/calendar', function () {return view('calendar');});

// 機能させるとcssが効かない
// Route::get('/mypage/{user}', 'MyPageController@index')->name('mypage');

// マイページ更新ページ
Route::get('/mypage/update', 'MypageUpdateController@show')->name('mypage.update');
Route::post('/mypage/update', 'MypageUpdateController@updateProfile')->name('update.profile');


//目標設定
Route::get('/goal_setting/index', 'GoalSettingController@index')->name('goal.index');
Route::post('/goal_setting/index',  'GoalSettingController@store')->name('goal.store');
//目標設定変更
Route::get('/goal_setting/{id}/edit', 'GoalSettingController@edit')->name('goal.edit');
Route::post('/goal_setting/{id}/edit',  'GoalSettingController@update')->name('goal.update');

//コース選択
Route::get('/courses/index', 'CourseController@index')->name('course.index');
Route::post('/courses/index', 'CourseController@store')->name('course.store');

//トレーニング表示・完了
Route::get('/training/index', 'TrainingController@index')->name('training.index');
Route::post('/training/index', 'TrainingController@complete')->name('training.complete');

//コース選択変更
Route::get('/courses/{id}/edit', 'CourseController@edit')->name('course.edit');
Route::post('/courses/{id}/edit', 'CourseController@update')->name('course.update');

//コース変更完了しました画面
Route::get('/courses/{id}/updated', 'CourseController@show')->name('courses.updated');

//お気に入り機能
//Mixコースのお気に入り
Route::post('/likeMix/{trainingMix}', 'FavoriteController@likeMix')->name('favorite.mix');
//筋トレ
Route::post('/likeMuscle/{Muscle}', 'FavoriteController@likeMuscle')->name('favorite.muscle');
//ストレッチ
Route::post('/likeStretch/{Stretch}', 'FavoriteController@likeStretch')->name('favorite.stretch');

// reminderで追加
Route::get('auth/{user}/reminder','ReminderController@index' )->name('reminder');

//管理者画面
Route::get('/admin_user', 'AdminUserController@index')->name('admin.user');
Route::post('/admin_user', 'AdminUserController@edit')->name('admin.edit');



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


// Route::post('/auth/favorite', 'FavoriteController@remove')->name('favorites.remove');
Route::get('/auth/favorites', 'FavoriteController@show')->name('favorites.show');
Route::post('/auth/favorites/remove', 'FavoriteController@remove')->name('favorites.remove');

// 5/22問い合わせフォーム

// フォーム画面
// web.php
Route::get('/index', function () {
    return view('index'); // index.blade.phpを参照する
})->name('index');

Route::get('/auth/inquiry', function () {
    return view('auth.inquiry');
})->name('inquiry');

Route::get('auth/inquiry/thanks', function () {
    return view('auth.thanks');
})->name('inquiry.thanks');

// 確認ページ
Route::post('auth/inquiry/confirm', 'InquiryController@confirm')->name('inquiry.confirm');

// 送信完了
Route::post('auth/inquiry/thanks', 'InquiryController@send')->name('inquiry.send');


});
Auth::routes();