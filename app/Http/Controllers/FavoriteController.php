<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\TrainingMix;
use App\TrainingMuscle;
use App\TrainingStretch;

class FavoriteController extends Controller
{
    public function likeMix($trainingMix)
    {
        $user = Auth::user();
        $user->likeMix($trainingMix);
     

        return response()->json(['status' => 'liked']);

    }
    public function likeMuscle($Muscle)
    {
        Auth::user()->likeMix($Muscle);
        return response()->json(['status' => 'liked']);
    }
    public function likeStretch($Stretch)
    {
        Auth::user()->likeMix($Stretch);
        return response()->json(['status' => 'liked']);
    }
}
