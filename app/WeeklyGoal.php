<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklyGoal extends Model
{
    protected $fillable = [
        'day',
        'goal'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
