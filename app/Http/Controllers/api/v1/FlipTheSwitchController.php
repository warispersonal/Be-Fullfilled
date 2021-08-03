<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
use App\FlipTheSwitch;
use App\Http\Controllers\Controller;
use App\Http\Resources\FlipTheSwitchCollection;
use Illuminate\Http\Request;

class FlipTheSwitchController extends Controller
{
    public function index(Request $request)
    {
        $limit = ProjectConstant::TOTAL_API_PAGINATION;
        if ($request->get('search')) {
            $flipTheSwitches = FlipTheSwitch::whereLike('title', $request->get('search'))->paginate($limit);
        } else {
            $flipTheSwitches = FlipTheSwitch::paginate($limit);
        }
        return $this->success("Flip the Switch List", new FlipTheSwitchCollection($flipTheSwitches));
    }
}
