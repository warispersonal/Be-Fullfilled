<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PodcastsCollection;
use App\Http\Resources\PodcastsResource;
use App\Podcast;
use Illuminate\Http\Request;

class PodcastsController extends Controller
{
    public function index($limit = 10)
    {
        $podcasts = Podcast::paginate($limit);
        return $this->success("Podcasts List", new PodcastsCollection($podcasts));
    }
}
