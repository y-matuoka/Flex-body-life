<?php

namespace App\Http\Controllers;

use App\Favorite; // クラスのインポート
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favorite()->get(); // あなたのデータベースからお気に入りを取得する方法に合わせて変更してください

        // dd(Auth::user()->favorite()->get());

        return view('auth.favorite', compact('favorites')); // 'auth.favorite' はお気に入り一覧を表示するBladeファイルのパスに合わせて変更してください
    }

    public function remove(Request $request)
    {
        Favorite::where('id', $request->fav_id)->delete();

        $favorites = Auth::user()->favorite()->get(); // あなたのデータベースからお気に入りを取得する方法に合わせて変更してください

        // dd(Auth::user()->favorite()->get());

        return view('auth.favorite', compact('favorites')); // 'auth.favorite' はお気に入り一覧を表示するBladeファイルのパスに合わせて変更してください
    }
}
