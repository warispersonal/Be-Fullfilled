<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FocusDay extends Model
{
    protected $fillable = [
        "date",
        "focus_value",
        "user_id",
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
