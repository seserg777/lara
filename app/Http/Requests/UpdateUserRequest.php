<?php

namespace App\Http\Requests\Common\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'name' => 'sometimes|required|string',
            'email' => 'required|string|email|max:255|unique:users|email,'.$this->id.',id',
            'status' => 'sometimes|required',
        ];
    }
}
