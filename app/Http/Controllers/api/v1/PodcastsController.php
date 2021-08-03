<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
use App\Http\Controllers\Controller;
use App\Http\Resources\PodcastsCollection;
use App\Podcast;
use Illuminate\Http\Request;

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
