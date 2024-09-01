<?php

namespace App\Http\Requests\Entity;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'parAzonosito' => 'required',
            'parNev' => 'required',
            'parAdoszam' => 'required',
            'parNyilvSzam' => 'required',
            'parCim' => 'required',
            'parHatkezd' => 'required|date_format:Y.m.d|before:parHatvege',
            'parHatvege' => 'required|date_format:Y.m.d|after:parHatkezd',
        ];
    }

    public function messages(): array
    {
        return [
            'parAzonosito.required' => __('validation.required', ['field' => __('partner.partner_azonosito')], app()->getLocale()),
            'parNev.required' => __('validation.required', ['field' => __('partner.partner_nev')]),
            'parAdoszam.required' => __('validation.required', ['field' => __('partner.partner_adoszama')]),
            'parNyilvSzam.required' => __('validation.required', ['field' => __('partner.partner_nyilvantartasi_szama')]),
            'parCim.required' => __('validation.required', ['field' => __('partner.partner_cime')]),
            'parHatkezd.required' => __('validation.required', ['field' => __('partner.hatalyossag_kezdete')]),
            'parHatkezd.date_format' => __('validation.date_format', ['field' => __('partner.hatalyossag_kezdete')]),
            'parHatkezd.before' => __('validation.before', ['field' => __('partner.hatalyossag_kezdete')]),
            'parHatvege.required' => __('validation.required', ['field' => __('partner.hatalyossag_vege')]),
            'parHatvege.date_format' => __('validation.date_format', ['field' => __('partner.hatalyossag_vege')]),
            'parHatvege.after' => __('validation.after', ['field' => __('partner.hatalyossag_vege')]),
        ];
    }

    protected function passedValidation()
    {
        $this->merge([
            'parHatkezd' => $this->input('parHatkezd') ? Carbon::createFromFormat('Y.m.d', $this->input('parHatkezd')) : null,
            'parHatvege' => $this->input('parHatvege') ? Carbon::createFromFormat('Y.m.d', $this->input('parHatvege')) : null,
        ]);
    }
}
