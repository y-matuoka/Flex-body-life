<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\TrainingMix;
use App\TrainingMuscle;
use App\TrainingStretch;

class FavoriteController extends Controller
{
    public function store($trainingMix)
    {
        Auth::user()->likeMix($trainingMix);
        return 'OK!';
    }
}
