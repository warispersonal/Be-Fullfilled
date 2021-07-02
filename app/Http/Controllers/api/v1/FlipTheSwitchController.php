<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
use App\FlipTheSwitch;
use App\Http\Controllers\Controller;
use App\Http\Resources\FlipTheSwitchCollection;

class FlipTheSwitchController extends Controller
{
    public function index($limit = ProjectConstant::TOTAL_API_PAGINATION)
    {

        $flipTheSwitches = FlipTheSwitch::paginate($limit);
        return $this->success("Flip the Switch List", new FlipTheSwitchCollection($flipTheSwitches));
    }
}
