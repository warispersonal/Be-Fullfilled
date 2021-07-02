<?php

namespace App\Http\Controllers\Admin;

use App\Constant\FileConstant;
use App\Constant\ProjectConstant;
use App\FlipTheSwitch;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenericController;
use App\Http\Requests\FlipTheSwitchRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FlipTheSwitchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flipTheSwitches = FlipTheSwitch::paginate(ProjectConstant::TOTAL_WEB_PAGINATION);
        return view('admin.flip_the_switch.index', compact('flipTheSwitches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flip_the_switch.create');
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
            'file' => 'mimes:jpg,jpeg,png|max:4096',
            'link' => $rules,
        ]);

        $image = GenericController::saveImage($request, 'file', FileConstant::FLIP_THE_SWITCH_IMAGES);
        $media = GenericController::saveMediaFile($request, 'link', FileConstant::FLIP_THE_SWITCH_MEDIA,$request->fileType);
        $flipTheSwitch = new FlipTheSwitch();
        $flipTheSwitch->title = $request->title;
        $flipTheSwitch->date = $this->changeDateFormat($request->date);
        $flipTheSwitch->image_id = $image->id ?? null;
        $flipTheSwitch->media_id = $media->id ?? null;

        $flipTheSwitch->save();
        return redirect()->route('flip_the_switch')->with('success_message', 'Flip the switch successfully created.');
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
        $flipTheSwitch = FlipTheSwitch::find($id);
        return view('admin.flip_the_switch.edit',compact('flipTheSwitch'));
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
            'file' => 'mimes:jpg,jpeg,png|max:4096',
            'link' => $rules,
        ]);
        $flipTheSwitch = FlipTheSwitch::find($id);

        if($request->has('file')){
            $this->removeImage(FileConstant::FLIP_THE_SWITCH_IMAGES, $flipTheSwitch->image_id);
            $image = GenericController::saveImage($request, 'file', FileConstant::FLIP_THE_SWITCH_IMAGES);
            $flipTheSwitch->image_id = $image->id ?? null;
        }
        if($request->has('link')){
            $this->removeMedia(FileConstant::FLIP_THE_SWITCH_MEDIA, $flipTheSwitch->media_id);
            $media = GenericController::saveMediaFile($request, 'link', FileConstant::FLIP_THE_SWITCH_MEDIA,$request->fileType);
            $flipTheSwitch->media_id = $media->id ?? null;
        }
        $flipTheSwitch->title = $request->title;
        $flipTheSwitch->date = $this->changeDateFormat($request->date);
        $flipTheSwitch->save();
        return redirect()->route('flip_the_switch')->with('success_message', 'Flip the switch successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flipTheSwitch = FlipTheSwitch::find($id);
        if($flipTheSwitch){
            $this->removeImage(FileConstant::FLIP_THE_SWITCH_IMAGES, $flipTheSwitch->image_id);
            $this->removeMedia(FileConstant::FLIP_THE_SWITCH_MEDIA, $flipTheSwitch->media_id);
            $flipTheSwitch->delete();
        }
        return redirect()->route('flip_the_switch')->with('success_message', 'Flip the switch successfully remove.');

    }
}
