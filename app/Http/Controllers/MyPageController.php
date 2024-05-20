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
        // リクエストからアップロードされたファイルを取得
        $avatar = $request->file('avatar');

        if ($avatar) {
            // ファイルを保存する処理（例えば、publicディレクトリ内のuploadsディレクトリに保存する場合）
            $path = $avatar->store('uploads', 'public');

            // セッションに画像のパスを保存
            session(['avatar_path' => 'storage/' . $path]);

            return redirect()->back()->with('success', 'プロフィール画像がアップロードされました。');
        }

        return redirect()->back()->with('error', '画像が選択されていません。');
    }

    // プロフィール画像の削除
    public function deleteAvatar()
    {
        // dd('test');
        $user = new User();
        $user->name = Auth::user()->name;
        $user->email = Auth::user()->email;
        $user->password = bcrypt(Auth::user()->password);
        $user->image = Null;
        $user->save();

        
        // セッションからアバターのパスを取得
        // $avatarPath = session('avatar_path');

        // if ($avatarPath && $avatarPath != 'images/noimageicon.png') {
        //     // ファイルを削除
        //     Storage::disk('public')->delete(str_replace('storage/', '', $avatarPath));

        //     // セッションから画像のパスを削除
        //     session()->forget('avatar_path');
        // }

        return redirect()->back()->with('success', 'プロフィール画像が削除されました。');
    }
}
