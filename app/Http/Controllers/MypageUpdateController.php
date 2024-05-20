<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MypageUpdateController extends Controller
{
    // マイページ更新ページを表示
    public function show()
    {
        return view('mypage_update');
    }

    // プロフィール更新の処理
    public function updateProfile(Request $request)
{
    $user = Auth::user();

    // バリデーション
    $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
    ]);

    // ユーザー情報の更新
    if ($request->filled('name')) {
        $user->name = $request->name;
    }

    if ($request->filled('email')) {
        $user->email = $request->email;
    }

    // パスワードの更新は、入力があった場合のみ
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    // 成功メッセージとともにマイページにリダイレクト
    return redirect()->route('mypage')->with('success', 'プロフィールを更新しました。');
}
}