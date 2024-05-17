<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userGoal = $user->goalSettings()->first();
        // dd($userGoal);
        return view('mypage', [
            "user" => $user,
            "userGoal" => $userGoal,
        ]);
    }
}
