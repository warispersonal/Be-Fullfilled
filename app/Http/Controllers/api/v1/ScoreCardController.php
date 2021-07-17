<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScoreCardResource;
use App\ScoreCard;
use Illuminate\Http\Request;

class ScoreCardController extends Controller
{
    public function index(){
        $scoreCards = ScoreCard::all();
        return $this->success('Score card list', ScoreCardResource::collection($scoreCards));
    }
}
