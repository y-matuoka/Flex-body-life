<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class AdminUserController extends Controller
{
    public function index()
    {
        $admin = User::where('authority', 99)->first();

        if(!$admin || $admin->authority !==99){
            return redirect()->route('mypage');
        }
        $users = User::all();

        return view('admin_user',[
            'users' => $users,
        ]);
    }

    public function edit(Request $request)
{
    $user = User::find($request->id);

    if (!$user) {
        return redirect()->back()->with('error', 'ユーザーが見つかりません');
    }

    if ($request->has('update')) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'nullable|string|max:255',
            'authority' => 'required|integer',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $request->image;
        $user->authority = $request->authority;
        $user->save();

        return redirect()->route('admin.user')->with('message', 'ユーザー情報を更新しました');
    } elseif ($request->has('delete')) {
        $user->delete();
        return redirect()->route('admin.user')->with('message', 'ユーザーを削除しました');
    } else {
        return redirect()->back()->with('error', '更新もしくは削除できません');
    }
}


}