<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContentLibraryCollection;
use Illuminate\Http\Request;

class ContentLibraryController extends Controller
{
    public function index(Request $request)
    {
        $limit = ProjectConstant::TOTAL_API_PAGINATION;
        if ($request->get('search')) {
            $contentLibrary = ContentLibrary::whereLike('title', $request->get('search'))->orWhereLike('description', $request->get('search'))->paginate($limit);
        } else {
            $contentLibrary = ContentLibrary::paginate($limit);
        }
        return $this->success("Content Library List", new ContentLibraryCollection($contentLibrary));
    }

    public function filter($filterType)
    {
        if ($filterType == "audio") {
            $contentLibrary = ContentLibrary::whereHas('media', function ($q) {
                $q->where('type', 0);
            })->paginate(ProjectConstant::TOTAL_API_PAGINATION);
            return $this->success("Content Library List", new ContentLibraryCollection($contentLibrary));
        }
        if ($filterType == "video") {
            $contentLibrary = ContentLibrary::whereHas('media', function ($q) {
                $q->where('type', 1);
            })->paginate(ProjectConstant::TOTAL_API_PAGINATION);
            return $this->success("Content Library List", new ContentLibraryCollection($contentLibrary));
        }
        if ($filterType == "pdf") {
            $contentLibrary = ContentLibrary::whereHas('media', function ($q) {
                $q->where('type', 2);
            })->paginate(ProjectConstant::TOTAL_API_PAGINATION);
            return $this->success("Content Library List", new ContentLibraryCollection($contentLibrary));
        }
        return $this->success("Content Library List", []);
    }
}
