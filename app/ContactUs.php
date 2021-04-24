<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'subject',
        'message',
        'user_id',
    ];
}
