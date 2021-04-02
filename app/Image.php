<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable =[
        'file'
    ];

    public function flipTheSwitch(){
        return $this->hasOne(FlipTheSwitch::class);
    }
}
