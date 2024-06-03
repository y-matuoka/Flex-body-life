<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function goalSettings()
    {
        return $this->hasOne('App\GoalSetting');
    }
    
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    // public function favorites()
    // {
    //     return $this->hasMany('App\Favorite');
    // }

    //お気に入りの多対多のリレーション
    public function favoriteTrainingMix(): BelongsToMany
    {
        return $this->belongsToMany('App\TrainingMix','Favorites','user_id','training_mix_id')->withTimestamps();
    }

    public function favoriteMuscle(): BelongsToMany
    {
        return $this->belongsToMany('App\TrainingMuscle','Favorites','user_id','training_muscle_id')->withTimestamps();
    }

    public function favoriteTrainingStretch(): BelongsToMany
    {
        return $this->belongsToMany('App\TrainingStretch','Favorites','user_id','stretch_id')->withTimestamps();
    }


    //お気に入りしたかどうかを判別する。
    public function isLikeMix($trainingMix): bool
    {
        return $this->favoriteTrainingMix()->where('training_mix_id', $trainingMix)->exists();
    }

    public function isLikeMuscle($Muscle): bool
    {
        return $this->favoriteMuscle()->where('training_muscle_id', $Muscle)->exists();
    }

    public function isLikeStretch($Stretch): bool
    {
        return $this->favoriteTrainingStretch()->where('stretch_id', $Stretch)->exists();
    }

    
    //既にlikeしたかどうかを確認したあと、いいねする（重複を避ける)
    public function likeMix($trainingMix)
    {
        if($this->isLikeMix($trainingMix)){
            //もし既にいいねしてたら何もしない
        }   else {
            $this->favoriteTrainingMix()->attach($trainingMix);
        }
    }

    public function likeMuscle($Muscle)
    {
        if($this->isLikeMuscle($Muscle)){
            //もし既にいいねしてたら何もしない
        }   else {
            dd($this->favoriteMuscle()->attach($Muscle));
            $this->favoriteMuscle()->attach($Muscle);
        }
    }

    public function likeStretch($Stretch)
    {
        if($this->isLikeStretch($Stretch)){
            //もし既にいいねしてたら何もしない
        }   else {
            $this->favoriteTrainingStretch()->attach($Stretch);
        }
    }


     //Userモデルとfavoriteモデルが紐づいている(大山)
     public function favorite()
     {
         return $this->hasMany('App\Favorite');
     }

}
