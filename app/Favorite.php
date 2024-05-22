<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainingStretch()
    {
        return $this->belongsTo(TrainingStretch::class);
    }

    public function trainingMuscle()
    {
        return $this->belongsTo(TrainingMuscle::class);
    }
    public function trainingMix()
    {
        return $this->belongsTo(TrainingMix::class);
    }
}
