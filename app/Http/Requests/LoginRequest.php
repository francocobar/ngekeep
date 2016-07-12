<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'inputEmail' => 'required|email',
            'inputPassword' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'title.required' => 'A title is required',
            // 'body.required'  => 'A message is required',
        ];
    }
}
