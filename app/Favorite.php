<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'stretch_id', 'training_muscle_id', 'training_mix_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stretch()
    {
        return $this->belongsTo(TrainingStretch::class, 'stretch_id');
    }

    public function muscle()
    {
        return $this->belongsTo(TrainingMuscle::class, 'training_muscle_id');
    }

    public function mix()
    {
        return $this->belongsTo(TrainingMix::class, 'training_mix_id');
    }
}

