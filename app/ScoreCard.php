<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ScoreCard extends Model
{
    protected $fillable = [
        'title',
        'color'
    ];

    public function focus_days()
    {
        return $this->hasMany(FocusDay::class);
    }

    public function getTodayScoreAttribute()
    {
        $focus_day = FocusDay::where('score_card_id', $this->id)->where("user_id", Auth::id())->get()->first();
        return $focus_day;
    }

    public function getFocusSumAttribute()
    {
        $sum = FocusDay::where('score_card_id', $this->id)->where("user_id", Auth::id())->sum('focus_value');
        $count = FocusDay::where('score_card_id', $this->id)->where("user_id", Auth::id())->count('focus_value');
        if ($count != 0) {
            $result = ($sum / $count);
            $result = round($result, 2);
        } else {
            $result = 0;
        }
        return $result;
    }


}
