<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityBorderdateRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'borderdateUid' => 'required',
        ];

        if ($this->request->get('borderdateUid')){
            $rules['date' . $this->request->get('borderdateUid')] = 'required|date_format:Y.m.d';
        }

        return $rules;
    }

    public function messages(): array
    {
        $messages = [
            'borderdateUid.required' => __('entity.borderdateuid_required'),
        ];

        if($this->request->get('mergeUid')){
            $messages['date' . $this->request->get('borderdateUid') . '.required'] =  __('entity.borderdate_date_required');
            $messages['date' . $this->request->get('borderdateUid') . '.date'] =  __('entity.borderdate_date_format');
        }

        return $messages;
    }
}
