<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TermConditionResource;
use App\TermCondition;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function index(){
        $terms = TermCondition::all();
        return $this->success('Terms & Conditions List', TermConditionResource::collection($terms));
    }
}
