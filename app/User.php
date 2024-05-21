<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    //お気に入りの多対多のリレーション
    public function favoriteTrainingMix(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\TrainingMix','Favorites','user_id','training_mix_id')->withTimestamps();
    }

    public function favoriteMuscle(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\TrainingMuscle','Favorites','user_id','training_muscle_id')->withTimestamps();
    }

    public function favoriteTrainingStretch(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\TrainingStretch','Favorites','user_id','training_muscle_id')->withTimestamps();
    }

    //お気に入りしたかどうかを判別する。
    public function isLikeMix($trainingMix): bool
    {
        return $this->favorites()->where('training_mix_id', $trainingMix)->exists();
    }

    public function isLikeMuscle($Muscle): bool
    {
        return $this->favorites()->where('training_muscle_id', $Muscle)->exists();
    }

    public function isLikeStretch($Stretch): bool
    {
        return $this->favorites()->where('stretch_id', $Stretch)->exists();
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
//isLikeを使って、既にlikeしたか確認。もししていたら解除する
    // public function unlikeMix($trainingMix)
    // {
    //     if($this->isLikeMix($trainingMix)){
    //         //既にいいねしていたら消す
    //         $this->favoriteTrainingMix()->attach($trainingMix);
    //     }   else {
    //     }
    // }

    // public function unlikeMuscle($Muscle)
    // {
    //     if($this->isLikeMuscle($Muscle)){
    //         //既にいいねしていたら消す
    //         $this->favoriteMuscle()->attach($Muscle);
    //     }   else {
    //     }
    // }
    // public function unlikeStretch($Stretch)
    // {
    //     if($this->isLikeStretch($Stretch)){
    //         //既にいいねしていたら消す
    //         $this->favoriteTrainingStretch()->attach($Stretch);
    //     }   else {
    //     }
    // }
}
