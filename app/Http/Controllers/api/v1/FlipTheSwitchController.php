<?php

namespace App\Http\Controllers\api\v1;

use App\FlipTheSwitch;
use App\Http\Controllers\Controller;
use App\Http\Resources\FlipTheSwitchResource;


class FlipTheSwitchController extends Controller
{
    public function index()
    {
        $flipTheSwitches = FlipTheSwitch::all();
        return $this->success("Flip the Switch List", FlipTheSwitchResource::collection($flipTheSwitches));
    }
}
