<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = [
        'push_notification',
        'general_notification',
        'partner_invitation',
        'location_access',
        'user_id',
        'latitude',
        'longitude',
    ];

}
