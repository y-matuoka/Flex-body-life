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
        $userCourse = $user->courses()->first();
        
        $courseSelect = [
            1 => 'トレーニングMIX',
            2 => '筋トレ',
            3 => 'ストレッチ',
        ];

        // dd($userGoal);
        return view('mypage', [
            "user" => $user,
            "userGoal" => $userGoal,
            "userCourse" => $userCourse,
            "courseSelect" => $courseSelect,
        ]);
    }
}
