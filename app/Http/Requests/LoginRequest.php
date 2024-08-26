<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'userName' => 'required',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'userName.required' => __('login.username_required'),
            'password.required' => __('login.password_required'),
        ];
    }
}
