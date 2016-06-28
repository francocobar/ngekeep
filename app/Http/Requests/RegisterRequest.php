<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
          'fullName' => 'required|max:50',
          'email' => 'required|unique:users,email|email',
          'reEmail' => 'required_with:email|same:email',
          'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'reEmail.required_with' => 'Re-enter email address!',
            'reEmail.same' => 'Your email address doesn\'t match',
        ];
    }
}
