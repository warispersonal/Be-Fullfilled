<?php

namespace App;

use App\Constant\FileConstant;
use App\Http\Controllers\GenericController;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use \App\Http\Traits\Media;

    protected $guarded = [
        'title',
        'date',
        'media_id',
        'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function getImageAttribute()
    {
        return $this->getImage($this->image_id, FileConstant::PODCASTS_IMAGES);
    }

    public function getMediaAttribute()
    {
        return $this->getMedia($this->media_id, FileConstant::PODCASTS_MEDIA);
    }

    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%'.$value.'%');
    }

    public function scopeOrWhereLike($query, $column, $value)
    {
        return $query->orWhere($column, 'like', '%'.$value.'%');
    }
}
