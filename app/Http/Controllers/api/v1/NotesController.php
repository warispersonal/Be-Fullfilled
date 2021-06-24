<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotesRequest;
use App\Http\Resources\NotesCollection;
use App\Http\Resources\NotesResource;
use App\Notes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($limit = 10)
    {
        $notes = Auth::user()->notes()->paginate($limit);
        return $this->success("Notes List", new NotesCollection($notes));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_notes' => 'required |max:255',
            'notes_description' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            $note = new Notes();
            $note['title_notes'] = $request['title_notes'];
            $note['notes_description'] = $request['notes_description'];

            Auth::user()->notes()->save($note);
            return $this->success("Created", new NotesResource($note));
        }
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Notes::where('id', $id)->delete();
        if ($note) {
            $notes = Auth::user()->notes()->get();
            return $this->success("Note Deleted", NotesResource::collection($notes));
        } else {
            return $this->failure('Note not found', 404);
        }
    }
}
