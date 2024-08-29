<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeDateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'actDate' => 'required|date_format:Y.m.d',
            'startDate' => 'required|date_format:Y.m.d|before:endDate',
            'endDate' => 'required|date_format:Y.m.d|after:startDate',
        ];
    }

    public function messages(): array
    {
        return [
            'actDate.required' => __('home.datum_kivalasztasa_kotelezo'),
            'actDate.date_format' => __('home.datum_kivalasztasa_format'),
            'startDate.required' => __('home.megjelenites_kezdodatumanak_kivalasztasa_kotelezo'),
            'startDate.date_format' => __('home.megjelenites_kezdodatum_format'),
            'startDate.before' => __('home.megjelenites_kezdodatum_korabban_mint_vegdatum'),
            'endDate.required' => __('home.megjelenites_vegdatumanak_kivalasztasa_kotelezo'),
            'endDate.date_format' => __('home.megjelenites_vegdatum_format'),
            'endDate.after' => __('home.megjelenites_vegdatum_kesobb_mint_kezdodatum'),
        ];
    }
}
