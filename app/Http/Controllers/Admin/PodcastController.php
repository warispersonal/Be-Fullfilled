<?php

namespace App\Http\Controllers\Admin;

use App\Constant\FileConstant;
use App\Constant\ProjectConstant;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\PodcastsRequest;
use App\Podcast;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts = Podcast::paginate(ProjectConstant::TOTAL_WEB_PAGINATION);
        return view('admin.podcast.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.podcast.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
            'file' => 'mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            'link' => $rules,
        ]);
        $image = GenericController::saveImage($request, 'file', FileConstant::PODCASTS_IMAGES);
        $media = GenericController::saveMediaFile($request, 'link', FileConstant::PODCASTS_MEDIA, $request->fileType);
        $podcasts = new Podcast();
        $podcasts->title = $request->title;
        $podcasts->date = $this->changeDateFormat($request->date);;
        $podcasts->image_id = $image->id ?? null;
        $podcasts->media_id = $media->id ?? null;
        $podcasts->save();

        return redirect()->route('podcast')->with('success_message', 'Podcasts successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $podcast = Podcast::find($id);
        return view('admin.podcast.edit', compact('podcast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
            'file' => 'mimes:jpg,jpeg,png,bmp,tiff|max:4096',
            'link' => $rules,
        ]);
        $podcasts = Podcast::find($id);

        if($request->has('file')){
            $this->removeImage(FileConstant::PODCASTS_IMAGES, $podcasts->image_id);
            $image = GenericController::saveImage($request, 'file', FileConstant::PODCASTS_IMAGES);
            $podcasts->image_id = $image->id ?? null;
        }
        if($request->has('link')){
            $this->removeMedia(FileConstant::PODCASTS_MEDIA, $podcasts->media_id);

            $media = GenericController::saveMediaFile($request, 'link', FileConstant::PODCASTS_MEDIA, $request->fileType);
            $podcasts->media_id = $media->id ?? null;
        }
        $podcasts->title = $request->title;
        $podcasts->date = $this->changeDateFormat($request->date);;
        $podcasts->save();

        return redirect()->route('podcast')->with('success_message', 'Podcasts successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $podcast = Podcast::find($id);
        if($podcast){
            $this->removeImage(FileConstant::PODCASTS_IMAGES, $podcast->image_id);
            $this->removeMedia(FileConstant::PODCASTS_MEDIA, $podcast->media_id);
            $podcast->delete();
        }
        return redirect()->route('podcast')->with('success_message', 'Podcasts successfully deleted.');

    }
}
