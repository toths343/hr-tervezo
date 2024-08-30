<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityMergeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'mergeUid' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'mergeUid.required' => __('entity.mergeuid_required'),
        ];
    }
}
