<?php

namespace App;

use App\Constant\FileConstant;
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
        'product_code',
    ];

    public function getImageAttribute()
    {
        return $this->getImage($this->image_id, FileConstant::PRODUCTS_IMAGES);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function shopping_carts(){
        return $this->hasMany(ShoppingCart::class);
    }
}
