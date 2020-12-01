<?php

namespace App\Http\Requests\Skill;

use App\Http\Requests\APIRequest;

class UpdateRequest extends ApiRequest
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
            'title' => 'required|unique:skills,title,'.$this->skill->id, 'id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The :attribute field is required',
            'title.unique' => 'The :attribute value already exists',
        ];
    }
}
