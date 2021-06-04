<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \App\Http\Traits\Media;

    protected $fillable = [
        'title',
        'description',
        'price',
        'ingredient',
        'image_id',
    ];

    public function getImageAttribute()
    {
        return $this->getImage($this->image_id, env('PRODUCTS_IMAGES'));
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
