<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BugReport extends Model
{
    use \App\Http\Traits\Media;
    protected $fillable = [
        'description',
        'media_id',
        'user_id',
    ];

    public function getImageAttribute()
    {
        return $this->getImage($this->image_id, env('BUG_REPORT_IMAGE'));
    }

}
