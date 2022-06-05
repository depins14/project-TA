<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'materi_id' => 'exists:courses,id',
            'pertanyaan' => 'required|max:255',
            'option1' => 'required|max:255',
            'option2' => 'required|max:255',
            'option3' => 'required|max:255',
            'option4' => 'required|max:255',
            'option5' => 'required|max:255',
            'key' => 'required|max:255'
        ];
    }
}
