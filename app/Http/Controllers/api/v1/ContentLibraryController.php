<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContentLibraryCollection;
use App\Http\Resources\ContentLibraryResource;

class ContentLibraryController extends Controller
{
    public function index($limit = ProjectConstant::TOTAL_API_PAGINATION)
    {
        $contentLibrary = ContentLibrary::paginate($limit);
        return $this->success("Content Library List", new ContentLibraryCollection($contentLibrary));
    }
}
