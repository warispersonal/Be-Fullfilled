<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FocusDay extends Model
{
    protected $fillable = [
        "date",
        "focus_value",
        "user_id",
        'score_card_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function score_card(){
        return $this->belongsTo(ScoreCard::class);
    }
}
