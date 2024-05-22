<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $user->delete();

        Auth::logout();

        return redirect()->route('home')->with('success', 'アカウントが削除されました。');
    }
}