<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDailyCheckQuestion extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function daily_check_question(){
        return $this->belongsTo(DailyCheckQuestion::class);
    }
}
