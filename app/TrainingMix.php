<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorite;

class TrainingMix extends Model
{
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function isLikedBy($user): bool{
        return Favorite::where('user_id', $user->id)->where('training_mix_id', $this->id)->first() !==null;
    }
}
