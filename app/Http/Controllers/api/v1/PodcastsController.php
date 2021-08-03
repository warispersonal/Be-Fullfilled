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
    public function index(Request $request)
    {
        $limit = ProjectConstant::TOTAL_API_PAGINATION;
        if ($request->get('search')) {
            $podcasts = Podcast::whereLike('title', $request->get('search'))->paginate($limit);
        } else {
            $podcasts = Podcast::paginate($limit);
        }
        return $this->success("Podcasts List", new PodcastsCollection($podcasts));
    }
}
