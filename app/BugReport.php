<?php

namespace App;

use App\Constant\FileConstant;
use Illuminate\Database\Eloquent\Model;

class BugReport extends Model
{
    use \App\Http\Traits\Media;
    protected $fillable = [
        'description',
        'media_id',
        'user_id',
    ];

    public function getMediaAttribute()
    {
        return $this->getMedia($this->media_id, FileConstant::BUG_REPORT_MEDIA);
    }

}
