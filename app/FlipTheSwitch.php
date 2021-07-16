<?php

namespace App;
use App\Constant\FileConstant;
use Illuminate\Database\Eloquent\Model;

class FlipTheSwitch extends Model
{
    use \App\Http\Traits\Media;

    protected $guarded = [
        'title',
        'date',
        'media_id',
        'image_id'
    ];

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function media(){
        return $this->belongsTo(Media::class);
    }


    public function getImageAttribute(){
        return $this->getImage($this->image_id, FileConstant::FLIP_THE_SWITCH_IMAGES);
    }

    public function getMediaAttribute()
    {
        return $this->getMedia($this->media_id, FileConstant::FLIP_THE_SWITCH_MEDIA);
    }

    public function getTypeAttribute()
    {
        return ;
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
