<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
use App\TrainingMix;
use App\TrainingMuscle;
use App\TrainingStretch;

class FavoriteController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->with(['stretch', 'muscle', 'mix'])->get();

        return view('auth.favorite', ['favorites' => $favorites]);
    }

    public function remove(Request $request)
    {
        $favorite = Favorite::find($request->fav_id);
        if ($favorite) {
            $favorite->delete();
        }

        return redirect()->route('favorites.show');
    }

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
