<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function contentLibrary()
    {
        return $this->hasOne(ContentLibrary::class);
    }

    public function tags()
    {
        return $this->belongsToMany(ContentLibrary::class);
    }
}
