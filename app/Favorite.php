<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function TrainingStretch()
    {
        return $this->belongsTo(TrainingStretch::class);
    }

    public function TrainingMuscle()
    {
        return $this->belongsTo(TrainingMuscle::class);
    }
    public function TrainingMix()
    {
        return $this->belongsTo(TrainingMix::class);
    }
}
