<?php

namespace App;

use App\Constant\FileConstant;
use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    use \App\Http\Traits\Media;

    protected $guarded = [
        'title',
        'description',
        'date',
        'image_id',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function getImageAttribute()
    {
        return $this->getImage($this->image_id, FileConstant::PUSH_NOTIFICATION_IMAGES);
    }

}
