<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\User;

class MyPageController extends Controller
{
    // マイページの表示
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            // 未ログインの場合、一時的なユーザーIDを生成
            $tempUserId = session('temp_user_id');
            if (!$tempUserId) {
                $tempUserId = uniqid('temp_');
                session(['temp_user_id' => $tempUserId]);
            }
            $user = new User(['id' => $tempUserId]);
        }

        // セッションからアバターのパスを取得
        $avatarPath = session('avatar_path', 'images/noimageicon.png');

        return view('mypage', ['user' => $user, 'avatarPath' => $avatarPath]);
    }

    // プロフィール画像のアップロードと保存
  public function uploadAvatar(Request $request)
  {
    $request->validate([
      'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $avatar = $request->file('avatar');

    if ($avatar) {
      // ファイル名を生成
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      // 画像をpublic/imagesディレクトリに保存
      $path = $avatar->move(public_path('images'), $filename);

      $user = Auth::user();
      $user->image = 'images/' . $filename;
      $user->save();

      return redirect()->back()->with('success', 'プロフィール画像がアップロードされました。');
    }

    return redirect()->back()->with('error', '画像が選択されていません。');
  }

    // プロフィール画像の削除
    public function deleteAvatar()
    {
      $user = Auth::user();
      $user->image = null;
      $user->save();

      return redirect()->back()->with('success', 'プロフィール画像が削除されました。');
    }
}