<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeleteController extends Controller
{
    // アカウント削除ページを表示
    public function show()
    {
        return view('user_delete');
    }

    // アカウント削除の処理
    public function delete(Request $request)
    {
        $user = Auth::user();

    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');

    if ($user->name !== $name || $user->email !== $email || !Hash::check($password, $user->password)) {
        return redirect()->back()->with('error', '名前、メールアドレス、またはパスワードが正しくありません。');
    }

    $user->delete();
    Auth::logout();
    return redirect()->route('home')->with('success', 'アカウントが削除されました。');
    }
 }

