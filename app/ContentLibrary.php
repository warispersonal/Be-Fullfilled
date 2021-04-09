<?php

namespace App;

use App\Http\Controllers\GenericController;
use Illuminate\Database\Eloquent\Model;

class ContentLibrary extends Model
{
    protected $guarded = [
        'title',
        'description',
        'date',
        'media_id',
        'tag_id',
        'media_id',
    ];

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function getImageAttribute(){
        if($this->image_id == null) {
            return GenericController::thumbnail();
        }
        else{
            $image = Image::find($this->image_id);
            return asset(env('CONTENT_LIBRARY_IMAGES').'/'.$image->file);
        }
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

}
