<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxerSubmission extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            // 'slug' => 'required|string|unique',
            'weight_id' => 'required|integer',
            'distinction' => 'required|max:140',
            'wins' => 'required|integer',
            'losses' => 'required|integer', 
            'draws' => 'required|integer',
            'knockouts' => 'required|integer'
        ];
    }
}
