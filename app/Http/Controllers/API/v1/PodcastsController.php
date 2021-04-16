<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PodcastsResource;
use App\Podcast;
use Illuminate\Http\Request;

class PodcastsController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::all();
        return $this->success("Podcasts List", PodcastsResource::collection($podcasts));
    }
}
