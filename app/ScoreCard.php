<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function getFocusSumAttribute()
    {
        $sum = FocusDay::where('score_card_id', $this->id)->sum('focus_value');
        $count = FocusDay::where('score_card_id', $this->id)->count('focus_value');
        $result = ($sum / $count);
        $result = round($result,2 );
        return $result;
    }

}
