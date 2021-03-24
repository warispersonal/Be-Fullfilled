<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyQuestion extends Model
{
    protected $guarded = [
        'question'
    ];

    public function yourDays(){
        return $this->hasMany(YourDay::class);
    }
}
