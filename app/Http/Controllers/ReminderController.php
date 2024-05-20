<?php

namespace App\Http\Controllers;
use App\user;
use App\Course;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index(User $user){

        $courses = $user->courses()->get(); 
        return view('auth.reminder',compact('user','courses'));
    }

}