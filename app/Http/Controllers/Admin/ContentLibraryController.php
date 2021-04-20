<?php

namespace App\Http\Controllers\Admin;

use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\ContentLibraryRequest;
use App\Tag;
use Illuminate\Http\Request;

class ContentLibraryController extends Controller
{
    public function index()
    {
        $contentLibraries = ContentLibrary::all();
        return view('admin.content_library.index',compact('contentLibraries'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.content_library.create', compact('tags'));
    }


    public function store(ContentLibraryRequest $request)
    {
        $image = GenericController::saveImage($request, 'file', env('PUSH_NOTIFICATION_IMAGES'));

        $contentLibrary = new ContentLibrary();
        $contentLibrary->title = $request->title;
        $contentLibrary->description = $request->description;
        $contentLibrary->date = $request->date;
        $contentLibrary->image_id = $image->id ?? null;
        $contentLibrary->tag_id = $request->tag_id;
        $contentLibrary->save();

        return redirect()->route('content_library')->with('success_message', 'Content library successfully created.');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
