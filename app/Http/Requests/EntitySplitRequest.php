<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntitySplitRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'splitDate' => 'required|date_format:Y.m.d',
        ];
    }

    public function messages(): array
    {
        return [
            'splitDate.required' =>  __('entity.split_date_required'),
            'splitDate.date' =>  __('entity.split_date_format'),
        ];
    }
}
