<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YourDayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'daily_question_id' => 'required|exists:daily_questions,id',
            'answer' => 'required'
        ];
    }
}
