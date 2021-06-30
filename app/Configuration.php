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
        'card_billing_id',
        'user_id',
    ];

}
