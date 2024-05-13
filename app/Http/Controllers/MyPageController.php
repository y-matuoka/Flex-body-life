<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        return view('mypage');
    }

    public function reminder()
    {
      $user = Auth::user();
      $courseAll = $user->courses->all();
      return view('mypage/reminder', [
        'courseAll' => $courseAll
      ]);
    }
}
