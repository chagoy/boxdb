<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardSubmission extends FormRequest
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
            'ppv' => 'boolean',
            'main_event' => 'boolean',
            'viewers' => 'required|integer',
            'network' => 'required',
            'venue' => 'required',
            'aside' => 'required|different:bside',
            'bside' => 'required',
            'date' => 'required|date_format:m/d/Y'
        ];
    }
}
