<?php

namespace App\Http\Requests\Entity;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ProjektRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'prjAzonosito' => 'required',
            'prjNev' => 'required',
            'prjRovidNev' => 'required',
            'prjStatus' => 'required',
            'prjMunkaszam' => 'required',
            'prjFeladatModja' => 'required',
            'prjTamogatasiNyilv' => 'required',
            'prjTamogatasiDatum' => 'required|date_format:Y.m.d',
            'prjKezdete' => 'required|date_format:Y.m.d|before:prjVege',
            'prjVege' => 'required|date_format:Y.m.d|after:prjKezdete',
            'prjHrtervKezd' => 'required|date_format:Y.m.d|before:prjHrtervVege',
            'prjHrtervVege' => 'required|date_format:Y.m.d|after:prjHrtervKezd',
            'prjTamEu' => 'required|numeric',
            'prjTamHazai' => 'required|numeric',
            'prjDkfTamHazai' => 'required|numeric',
            'prjDkfTamEu' => 'required|numeric',
            'prjForras' => 'required',
            'prjHatkezd' => 'required|date_format:Y.m.d|before:prjHatvege',
            'prjHatvege' => 'required|date_format:Y.m.d|after:prjHatkezd',
            'prjKonzorciumban' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'prjAzonosito.required' => __('validation.required', ['field' => __('projekt.projekt_azonosito_szama')]),
            'prjNev.required' => __('validation.required', ['field' => __('projekt.projekt_neve')]),
            'prjRovidNev.required' => __('validation.required', ['field' => __('projekt.projekt_rovid_neve')]),
            'prjStatus.required' => __('validation.required', ['field' => __('projekt.projekt_statusza')]),
            'prjMunkaszam.required' => __('validation.required', ['field' => __('projekt.munkaszam')]),
            'prjFeladatModja.required' => __('validation.required', ['field' => __('projekt.feladatvegzes_modja')]),
            'prjTamogatasiNyilv.required' => __('validation.required', ['field' => __('projekt.tamogatasi_szerzodes_nyilvantartasi_szama')]),
            'prjTamogatasiDatum.required' => __('validation.required', ['field' => __('projekt.tamogatasi_szerzodes_datuma')]),
            'prjTamogatasiDatum.date_format' => __('validation.required', ['field' => __('projekt.tamogatasi_szerzodes_datuma')]),
            'prjKezdete.required' => __('validation.required', ['field' => __('projekt.projekt_kezdete')]),
            'prjKezdete.date_format' => __('validation.date_format', ['field' => __('projekt.projekt_kezdete')]),
            'prjKezdete.before' => __('validation.before', ['field' => __('projekt.projekt_kezdete')]),
            'prjVege.required' => __('validation.required', ['field' => __('projekt.projekt_vege')]),
            'prjVege.date_format' => __('validation.date_format', ['field' => __('projekt.projekt_vege')]),
            'prjVege.after' => __('validation.after', ['field' => __('projekt.projekt_vege')]),
            'prjHrtervKezd.required' => __('validation.required', ['field' => __('projekt.hr_tervezes_kezdete')]),
            'prjHrtervKezd.date_format' => __('validation.date_format', ['field' => __('projekt.hr_tervezes_kezdete')]),
            'prjHrtervKezd.before' => __('validation.before', ['field' => __('projekt.hr_tervezes_kezdete')]),
            'prjHrtervVege.required' => __('validation.required', ['field' => __('projekt.hr_tervezes_vege')]),
            'prjHrtervVege.date_format' => __('validation.date_format', ['field' => __('projekt.hr_tervezes_vege')]),
            'prjHrtervVege.after' => __('validation.after', ['field' => __('projekt.hr_tervezes_vege')]),
            'prjTamEu.required' => __('validation.required', ['field' => __('projekt.teljes_tamogatasi_osszeg_eus')]),
            'prjTamEu.numeric' => __('validation.numeric', ['field' => __('projekt.teljes_tamogatasi_osszeg_eus')]),
            'prjTamHazai.required' => __('validation.required', ['field' => __('projekt.teljes_tamogatasi_osszeg_hazai')]),
            'prjTamHazai.numeric' => __('validation.numeric', ['field' => __('projekt.teljes_tamogatasi_osszeg_hazai')]),
            'prjDkfTamHazai.required' => __('validation.required', ['field' => __('projekt.dkf_tamogatasi_osszeg_hazai')]),
            'prjDkfTamHazai.numeric' => __('validation.numeric', ['field' => __('projekt.dkf_tamogatasi_osszeg_hazai')]),
            'prjDkfTamEu.required' => __('validation.required', ['field' => __('projekt.dkf_tamogatasi_osszeg_eus')]),
            'prjDkfTamEu.numeric' => __('validation.numeric', ['field' => __('projekt.dkf_tamogatasi_osszeg_eus')]),
            'prjForras.required' => __('validation.required', ['field' => __('projekt.projekt_forras_azonosito')]),
            'prjHatkezd.required' => __('validation.required', ['field' => __('projekt.hatalyossag_kezdete')]),
            'prjHatkezd.date_format' => __('validation.date_format', ['field' => __('projekt.hatalyossag_kezdete')]),
            'prjHatkezd.before' => __('validation.before', ['field' => __('projekt.hatalyossag_kezdete')]),
            'prjHatvege.required' => __('validation.required', ['field' => __('projekt.hatalyossag_vege')]),
            'prjHatvege.date_format' => __('validation.date_format', ['field' => __('projekt.hatalyossag_vege')]),
            'prjHatvege.after' => __('validation.after', ['field' => __('projekt.hatalyossag_vege')]),
            'prjKonzorciumban.required' => __('validation.required', ['field' => __('projekt.konzorciumban_megvalositott')]),
        ];
    }

    protected function passedValidation()
    {
        $this->merge([
            'prjTamogatasiDatum' => $this->input('prjTamogatasiDatum') ? Carbon::createFromFormat('Y.m.d', $this->input('prjTamogatasiDatum')) : null,
            'prjKezdete' => $this->input('prjKezdete') ? Carbon::createFromFormat('Y.m.d', $this->input('prjKezdete')) : null,
            'prjVege' => $this->input('prjVege') ? Carbon::createFromFormat('Y.m.d', $this->input('prjVege')) : null,
            'prjHrtervKezd' => $this->input('prjHrtervKezd') ? Carbon::createFromFormat('Y.m.d', $this->input('prjHrtervKezd')) : null,
            'prjHrtervVege' => $this->input('prjHrtervVege') ? Carbon::createFromFormat('Y.m.d', $this->input('prjHrtervVege')) : null,
            'prjHatkezd' => $this->input('prjHatkezd') ? Carbon::createFromFormat('Y.m.d', $this->input('prjHatkezd')) : null,
            'prjHatvege' => $this->input('prjHatvege') ? Carbon::createFromFormat('Y.m.d', $this->input('prjHatvege')) : null,
        ]);
    }
}
