<?php

namespace App\Http\Controllers\api\v1;

use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContentLibraryResource;

class ContentLibraryController extends Controller
{
    public function index()
    {
        $contentLibrary = ContentLibrary::all();
        return $this->success("Content Library List", ContentLibraryResource::collection($contentLibrary));
    }
}
