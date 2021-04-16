<?php

namespace App\Http\Controllers\API\V1;

use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContentLibraryResource;
use Illuminate\Http\Request;

class ContentLibraryController extends Controller
{
    public function index()
    {
        $contentLibrary = ContentLibrary::all();
        return $this->success("Content Library List", ContentLibraryResource::collection($contentLibrary));
    }
}
