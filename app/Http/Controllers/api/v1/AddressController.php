<?php

namespace App\Http\Controllers\api\v1;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use App\Http\Resources\ContentLibraryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::where('user_id', Auth::id())->get();
        return $this->success("Address created", AddressResource::collection($address));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'city' => 'required',
            'zip_code' => 'required|min:5|max:5',
            'street_address' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return $this->validationFailure($error);
        } else {
            $address = new Address();
            $address->city = $request->city;
            $address->zip_code = $request->zip_code;
            $address->street_address = $request->street_address;
            $address->user_id = Auth::id();
            $address->save();
            return $this->success("Address created", new AddressResource($address));

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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}
