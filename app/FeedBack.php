<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $fillable = [
        'service_status',
        'what_wrong',
        'user_id',
    ];
}
