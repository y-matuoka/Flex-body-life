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
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    protected $table = 'training_mixes';
    // リレーションを定義する必要がある場合はここに記述します

}
