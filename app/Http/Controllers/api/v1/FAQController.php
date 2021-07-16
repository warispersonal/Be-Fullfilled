<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FAQResource;
use App\Question;

class FAQController extends Controller
{
    public function index()
    {
        $faq = Question::all();
        return $this->success('FAQ List', FAQResource::collection($faq));
    }

    public function search($search)
    {
        $faq = Question::whereLike('question', $search)->orWhereLike('answer', $search)->get();
        return $this->success('FAQ List', FAQResource::collection($faq));
    }
}
