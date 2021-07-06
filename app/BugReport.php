<?php

namespace App;

use App\Constant\FileConstant;
use Illuminate\Database\Eloquent\Model;

class BugReport extends Model
{
    protected $fillable = [
        'description',
        'media',
        'user_id',
    ];

    public function getThumbnailAttribute()
    {
        $url = url('storage/' . $this->media);
        $exists = $this->url_exists($url);
        if ($exists) {
            return $url;
        } else {
            return asset("thumbnail/avatar.png");
        }
    }

    public function url_exists($url)
    {
        $headers = get_headers($url);
        if (stripos($headers[0], "200 OK")) {
            return true;
        } else {
            return false;
        }
    }

}
