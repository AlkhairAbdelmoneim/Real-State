<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'new_password' => 'nullable|min:6',
        ];
    }
}
