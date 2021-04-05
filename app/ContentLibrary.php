<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentLibrary extends Model
{
    protected $guarded = [
        'title',
        'description',
        'date',
        'media_id',
    ];

    public function image(){
        return $this->belongsTo(Image::class);
    }

}
