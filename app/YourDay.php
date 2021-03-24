<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YourDay extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'answer',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function question(){
        return $this->belongsTo(DailyQuestion::class, 'daily_question_id','id');
    }
}
