<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
use App\FlipTheSwitch;
use App\Http\Controllers\Controller;
use App\Http\Resources\PodcastsCollection;
use App\Http\Resources\PodcastsResource;
use App\Podcast;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PodcastsController extends Controller
{
    public function index($limit = ProjectConstant::TOTAL_API_PAGINATION)
    {
        $podcasts = Podcast::paginate($limit);
        return $this->success("Podcasts List", new PodcastsCollection($podcasts));
    }


    public function search($search)
    {
        $limit = ProjectConstant::TOTAL_API_PAGINATION;
        $podcasts = Podcast::whereLike('title',$search)->paginate($limit);
        return $this->success("Podcasts List", new PodcastsCollection($podcasts));
    }
}
