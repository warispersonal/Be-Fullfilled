<?php

namespace App\Http\Controllers\api\v1;

use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContentLibraryCollection;
use App\Http\Resources\ContentLibraryResource;

class ContentLibraryController extends Controller
{
    public function index($limit = 10)
    {
        $contentLibrary = ContentLibrary::paginate($limit);
        return $this->success("Content Library List", new ContentLibraryCollection($contentLibrary));
    }
}
