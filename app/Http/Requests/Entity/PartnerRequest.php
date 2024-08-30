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
            'parHatkezd.required' => __('validation.hatalyossag_kezdodatumanak_kivalasztasa_kotelezo'),
            'parHatkezd.date_format' => __('validation.hatalyossag_kezdodatum_format'),
            'parHatkezd.before' => __('validation.hatalyossag_kezdodatum_korabban_mint_vegdatum'),
            'parHatvege.required' => __('validation.hatalyossag_vegdatumanak_kivalasztasa_kotelezo'),
            'parHatvege.date_format' => __('validation.hatalyossag_vegdatum_format'),
            'parHatvege.after' => __('validation.hatalyossag_vegdatum_kesobb_mint_kezdodatum'),
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
