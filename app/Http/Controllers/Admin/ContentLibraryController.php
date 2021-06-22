<?php

namespace App\Http\Controllers\Admin;

use App\Constant\FileConstant;
use App\ContentLibrary;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\ContentLibraryRequest;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContentLibraryController extends Controller
{
    public function index()
    {
        $contentLibraries = ContentLibrary::all();
        return view('admin.content_library.index', compact('contentLibraries'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.content_library.create', compact('tags'));
    }


    public function store(Request $request)
    {
        $rules = 'required';
        if ($request->fileType == 'audio') {
            $rules = 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav,wma,aac,m4a|max:10000';
        }
        if ($request->fileType == 'video') {
            $rules = 'required|mimes:mp4,3gp,mov,wmv,avi,mkv,webm,mpeg-2|max:25000';
        }
        if ($request->fileType == 'pdf') {
            $rules = "required|mimetypes:application/pdf|max:10000";
        }
        $request->validate([
            'date' => 'required',
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            'link' => $rules,
        ]);
        $image = GenericController::saveImage($request, 'file', FileConstant::CONTENT_LIBRARY_IMAGES);
        $media = GenericController::saveMediaFile($request, 'link', FileConstant::CONTENT_LIBRARY_MEDIA, $request->fileType);

        $contentLibrary = new ContentLibrary();
        $contentLibrary->title = $request->title;
        $contentLibrary->description = $request->description;
        $contentLibrary->date = $this->changeDateFormat($request->date);;
        $contentLibrary->image_id = $image->id ?? null;
        $contentLibrary->media_id = $media->id ?? null;
        $contentLibrary->save();
        $contentLibrary->tags()->attach($request->tags);
        return redirect()->route('content_library')->with('success_message', 'Content library successfully created.');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $contentLibrary = ContentLibrary::find($id);
        $tags = Tag::all();
        return view('admin.content_library.edit', compact('tags', 'contentLibrary'));
    }


    public function update(Request $request, $id)
    {
        $rules = '';
        if ($request->fileType == 'audio') {
            $rules = 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav,wma,aac,m4a|max:10000';
        }
        if ($request->fileType == 'video') {
            $rules = 'mimes:mp4,3gp,mov,wmv,avi,mkv,webm,mpeg-2|max:25000';
        }
        if ($request->fileType == 'pdf') {
            $rules = "mimetypes:application/pdf|max:10000";
        }
        $request->validate([
            'date' => 'required',
            'title' => 'required',
            'description' => 'required',
            'file' => 'mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            'link' => $rules,
        ]);
        $contentLibrary = ContentLibrary::find($id);
        if ($request->has('file')) {
            $image = GenericController::saveImage($request, 'file', FileConstant::CONTENT_LIBRARY_IMAGES);
            $contentLibrary->image_id = $image->id ?? null;
        }
        if ($request->has('file')) {
            $media = GenericController::saveMediaFile($request, 'link', FileConstant::CONTENT_LIBRARY_MEDIA, $request->fileType);
            $contentLibrary->media_id = $media->id ?? null;
        }
        $contentLibrary->title = $request->title;
        $contentLibrary->description = $request->description;
        $contentLibrary->date = $this->changeDateFormat($request->date);;
        $contentLibrary->save();
        $contentLibrary->tags()->detach();
        $contentLibrary->tags()->attach($request->tags);
        return redirect()->route('content_library')->with('success_message', 'Content library successfully updated.');
    }

    public function destroy($id)
    {
        $contentLibrary = ContentLibrary::find($id);
        $contentLibrary->delete();
        return redirect()->route('content_library')->with('success_message', 'Content library successfully deleted.');

    }
}
