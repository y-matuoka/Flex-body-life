<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorite;

class TrainingMuscle extends Model
{

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    // public function isLikedBy($user): bool{
    //     return Favorite::where('user_id', $user->id)->where('training_muscle_id', $this->id)->first() !==null;
    // }

    protected $table = 'training_muscles';
    // リレーションを定義する必要がある場合はここに記述します

}
