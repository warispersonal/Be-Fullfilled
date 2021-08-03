<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContentLibraryCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContentLibraryController extends Controller
{
    public function index(Request $request)
    {
        $limit = ProjectConstant::TOTAL_API_PAGINATION;
        $contentLibrary = new ContentLibrary();

        if ($request->get('filter') == "audio") {
            $contentLibrary = $contentLibrary->whereHas('media', function ($q) {
                $q->where('type', 0);
            });
        }
        if ($request->get('filter') == "video") {
            $contentLibrary = $contentLibrary->whereHas('media', function ($q) {
                $q->where('type', 1);
            });
        }
        if ($request->get('filter') == "pdf") {
            $contentLibrary = $contentLibrary->whereHas('media', function ($q) {
                $q->where('type', 2);
            });
        }

        if ($request->get('search')) {
            $contentLibrary = $contentLibrary->whereLike('title', $request->get('search'))->WhereLike('description', $request->get('search'));
        }
        $contentLibrary = $contentLibrary->paginate(ProjectConstant::TOTAL_API_PAGINATION);

        if (!$request->get('search') && !$request->get('filter')) {
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
