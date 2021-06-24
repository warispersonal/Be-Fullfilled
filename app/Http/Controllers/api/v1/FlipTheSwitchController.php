<?php

namespace App\Http\Controllers\api\v1;

use App\FlipTheSwitch;
use App\Http\Controllers\Controller;
use App\Http\Resources\FlipTheSwitchCollection;
use App\Http\Resources\FlipTheSwitchResource;

class FlipTheSwitchController extends Controller
{
    public function index($limit = 10)
    {
        $flipTheSwitches = FlipTheSwitch::paginate($limit);
        return $this->success("Flip the Switch List", new FlipTheSwitchCollection($flipTheSwitches));
    }
}
