<?php

namespace App\Http\Requests\Common;

use Illuminate\Http\Request;

class UpdateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'id' => 'required|integer',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ];
        //return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'id' => 'id error',
            'name' => 'name error',
            'email' => 'email error',
            'password' => 'password error'
        ];
    }
}
