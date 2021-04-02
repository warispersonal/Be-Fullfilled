<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable =[
        'link',
        'type',
    ];

    public function flipTheSwitch(){
        return $this->hasOne(FlipTheSwitch::class);
    }
}
