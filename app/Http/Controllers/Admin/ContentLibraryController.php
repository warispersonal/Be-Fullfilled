<?php

namespace App\Http\Controllers\admin;

use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\ContentLibraryRequest;
use Illuminate\Http\Request;

class ContentLibraryController extends Controller
{
    public function index()
    {
        return view('admin.content_library.index');
    }

    public function create()
    {
        return view('admin.content_library.create');
    }


    public function store(ContentLibraryRequest $request)
    {
        $image = GenericController::saveImage($request, 'file', env('CONTENT_LIBRARY_IMAGES'));
        $contentLibrary = new ContentLibrary();
        $contentLibrary->title = $request->title;
        $contentLibrary->description = $request->description;
        $contentLibrary->date = $request->date;
        $contentLibrary->image_id = $image->id ?? null;
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
