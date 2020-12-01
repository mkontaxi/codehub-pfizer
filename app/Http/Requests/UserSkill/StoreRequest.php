<?php

namespace App\Http\Requests\UserSkill;

use App\Http\Requests\APIRequest;

class StoreRequest extends ApiRequest
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
            'skills' => 'required|array',
            'skills.*' => 'integer|exists:skills,id'
        ];
    }
}
