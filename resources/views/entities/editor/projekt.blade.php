@php
    /** @var \App\Models\Projekt $projekt */
@endphp

<script type="module">
    function calculate(op1field, op2field, resultfield) {
        var sum = 0;
        $.each([op1field, op2field], (index, field) => {
            var element = $('input[name="' + field + '"]');
            if (!isNaN(parseInt(element.val()))) {
                sum += parseInt(element.val());
            }
        });
        $('input[name="' + resultfield + '"]').val(sum);
    }
    $(function() {
        const dateFormat = 'yy.mm.dd';

        $.each(['prjTamogatasiDatum', 'prjKezdete', 'prjVege', 'prjHrtervKezd', 'prjHrtervVege', 'prjHatkezd', 'prjHatvege'], (index, field) =>
            $('input[name="' + field + '"]').datepicker({
            dateFormat: dateFormat
        }));

        $('input[name="prjTamEu"]').on('change', () => calculate('prjTamEu', 'prjTamHazai', 'tamOsszesen'));
        $('input[name="prjTamHazai"]').on('change', () => calculate('prjTamEu', 'prjTamHazai', 'tamOsszesen'));
        $('input[name="prjDkfTamEu"]').on('change', () => calculate('prjDkfTamEu', 'prjDkfTamHazai', 'dkfOsszesen'));
        $('input[name="prjDkfTamHazai"]').on('change', () => calculate('prjDkfTamEu', 'prjDkfTamHazai', 'dkfOsszesen'));
    });
</script>


<input type="hidden" name="prjId" value="{{ $projekt->prj_id }}" class="id"/>

<div class="mb-3">
    <label for="prjAzonosito" class="form-label fw-semibold">{{ __('projekt.projekt_azonosito_szama') }}</label>
    <input type="text" class="form-control" id="prjAzonosito" name="prjAzonosito" placeholder="{{ __('projekt.projekt_azonosito_szama') }}"
           value="{{ $projekt->prj_azonosito }}">
</div>

<div class="mb-3">
    <label for="prjNev" class="form-label fw-semibold">{{ __('projekt.projekt_neve') }}</label>
    <input type="text" class="form-control" id="prjNev" name="prjNev" placeholder="{{ __('projekt.projekt_neve') }}"
           value="{{ $projekt->prj_nev }}">
</div>

<div class="mb-3">
    <label for="prjRovidNev" class="form-label fw-semibold">{{ __('projekt.projekt_rovid_neve') }}</label>
    <input type="text" class="form-control" id="prjRovidNev" name="prjRovidNev" placeholder="{{ __('projekt.projekt_rovid_neve') }}"
           value="{{ $projekt->prj_rovid_nev }}">
</div>

<div class="mb-3">
    <label for="prjStatus" class="form-label fw-semibold">{{ __('projekt.projekt_statusza') }}</label>
    <select class="form-select" id="prjStatus" name="prjStatus">
        <option value="">{{ __('general.kerjuk_valasszon') }}</option>
        @foreach($szotar['PROJEKT_STATUSZA'] as $item)
            <option {{ $projekt->prj_status === $item->szo_rnev ? 'selected' : '' }} value="{{ $item->szo_rnev }}">{{ $item->szo_hnev }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="prjMunkaszam" class="form-label fw-semibold">{{ __('projekt.munkaszam') }}</label>
    <input type="text" class="form-control" id="prjMunkaszam" name="prjMunkaszam" placeholder="{{ __('projekt.munkaszam') }}"
           value="{{ $projekt->prj_munkaszam }}">
</div>

<div class="mb-3">
    <label for="prjFeladatModja" class="form-label fw-semibold">{{ __('projekt.feladatvegzes_modja') }}</label>
    <select class="form-select" id="prjFeladatModja" name="prjFeladatModja">
        <option value="">{{ __('general.kerjuk_valasszon') }}</option>
        @foreach($szotar['FELADATVEGZES_MODJA'] as $item)
            <option {{ $projekt->prj_feladat_modja === $item->szo_rnev ? 'selected' : '' }} value="{{ $item->szo_rnev }}">{{ $item->szo_hnev }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="" class="form-label fw-semibold">{{ __('projekt.projekt_kategoria') }}</label>

    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="" id="" value="">
            <label class="form-check-label" for="">Alap projekt</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="" id="" value="">
            <label class="form-check-label" for="">Kiegészítő projekt</label>
        </div>
    </div>

</div>

<div class="mb-3">
    <label for="" class="form-label fw-semibold">{{ __('projekt.projekt_jellege') }}</label>
    <select class="form-select" id="" name="">
        <option  value="">{{ __('general.kerjuk_valasszon') }}</option>
        <option value="1">One</option>
        <option value="2">Two</option>
    </select>
</div>

<div class="mb-3">
    <label for="" class="form-label fw-semibold">{{ __('projekt.projekt_kapcsolat') }}</label>

    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="" id="" value="">
            <label class="form-check-label" for="">{{ __('projekt.nem_relevans') }}</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="" id="" value="">
            <label class="form-check-label" for="">{{ __('projekt.projekt_id_azonosito_es_jellege') }}</label>
        </div>
    </div>

</div>

<div class="mb-3">
    <label for="prjTamogatasiNyilv" class="form-label fw-semibold">{{ __('projekt.tamogatasi_szerzodes_nyilvantartasi_szama') }}</label>
    <input type="text" class="form-control" id="prjTamogatasiNyilv" name="prjTamogatasiNyilv"
           placeholder="{{ __('projekt.tamogatasi_szerzodes_nyilvantartasi_szama') }}"
           value="{{ $projekt->prj_tamogatasi_nyilv }}">
</div>

<div class="mb-3">
    <label for="prjTamogatasiDatum" class="form-label fw-semibold">{{ __('projekt.tamogatasi_szerzodes_datuma') }}</label>
    <input type="text" class="form-control" id="prjTamogatasiDatum" name="prjTamogatasiDatum"
           placeholder="{{ __('projekt.tamogatasi_szerzodes_datuma') }}"
           value="{{ $projekt->prj_tamogatasi_datum?->format('Y.m.d') }}">
</div>

<div class="mb-3">
    <label for="prjKezdete" class="form-label fw-semibold">{{ __('projekt.projekt_kezdete_es_vege') }}</label>

    <div class="row g-3 align-items-center">
        <div class="col-6">
            <input type="text" class="form-control" id="prjKezdete" name="prjKezdete"
                   value="{{ $projekt->prj_kezdete?->format('Y.m.d') }}">
        </div>
        <div class="col-6">
            <input type="text" class="form-control" id="prjVege" name="prjVege"
                   value="{{ $projekt->prj_vege?->format('Y.m.d') }}">
        </div>
    </div>

</div>

<div class="mb-3">
    <label for="prjHrtervKezd" class="form-label fw-semibold">{{ __('projekt.hr_tervezes_idotartam') }}</label>

    <div class="row g-3 align-items-center">
        <div class="col-6">
            <input type="text" class="form-control" id="prjHrtervKezd" name="prjHrtervKezd"
                   value="{{ $projekt->prj_hrterv_kezd?->format('Y.m.d') }}">
        </div>
        <div class="col-6">
            <input type="text" class="form-control" id="prjHrtervVege" name="prjHrtervVege"
                   value="{{ $projekt->prj_hrterv_vege?->format('Y.m.d') }}">
        </div>
    </div>

</div>

<div class="mb-3">
    <label for="prjTamEu" class="form-label fw-semibold">{{ __('projekt.teljes_tamogatasi_osszeg_eus') }}</label>
    <input type="text" class="form-control" id="prjTamEu" name="prjTamEu"
           placeholder="{{ __('projekt.teljes_tamogatasi_osszeg_eus') }}"
           value="{{ $projekt->prj_tam_eu }}">
</div>

<div class="mb-3">
    <label for="prjTamHazai" class="form-label fw-semibold">{{ __('projekt.teljes_tamogatasi_osszeg_hazai') }}</label>
    <input type="text" class="form-control" id="prjTamHazai" name="prjTamHazai"
           placeholder="{{ __('projekt.teljes_tamogatasi_osszeg_hazai') }}"
           value="{{ $projekt->prj_tam_hazai }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">{{ __('projekt.teljes_tamogatasi_osszeg_osszesen') }}</label>
    <input type="text" disabled readonly class="form-control" name="tamOsszesen"
           placeholder="{{ __('projekt.teljes_tamogatasi_osszeg_osszesen') }}"
           value="{{ $projekt->prj_tam_eu ?: 0 + $projekt->prj_tam_hazai ?: 0 }}">
</div>

<div class="mb-3">
    <label for="prjTamEu" class="form-label fw-semibold">{{ __('projekt.dkf_tamogatasi_osszeg_eus') }}</label>
    <input type="text" class="form-control" id="prjDkfTamEu" name="prjDkfTamEu"
           placeholder="{{ __('projekt.dkf_tamogatasi_osszeg_eus') }}"
           value="{{ $projekt->prj_dkf_tam_eu }}">
</div>

<div class="mb-3">
    <label for="prjTamHazai" class="form-label fw-semibold">{{ __('projekt.dkf_tamogatasi_osszeg_hazai') }}</label>
    <input type="text" class="form-control" id="prjDkfTamHazai" name="prjDkfTamHazai"
           placeholder="{{ __('projekt.dkf_tamogatasi_osszeg_hazai') }}"
           value="{{ $projekt->prj_dkf_tam_hazai }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">{{ __('projekt.dkf_tamogatasi_osszeg_osszesen') }}</label>
    <input type="text" disabled readonly class="form-control" name="dkfOsszesen"
           placeholder="{{ __('projekt.dkf_tamogatasi_osszeg_osszesen') }}"
           value="{{ $projekt->prj_dkf_tam_eu ?: 0 + $projekt->prj_dkf_tam_hazai ?: 0 }}">
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">{{ __('projekt.projekt_forras_azonosito') }}</label>
    <input type="text" class="form-control" id="prjForras" name="prjForras"
           placeholder="{{ __('projekt.projekt_forras_azonosito') }}"
           value="{{ $projekt->prj_forras }}">
</div>

<div class="mb-3">
    <label for="prjHatkezd" class="form-label fw-semibold">{{ __('projekt.projekt_hatalyossaga') }}</label>

    <div class="row g-3 align-items-center">
        <div class="col-6">
            <input type="text" class="form-control hatkezd" id="prjHatkezd" name="prjHatkezd"
                   value="{{ $projekt->prj_hatkezd?->format('Y.m.d') }}">
        </div>
        <div class="col-6">
            <input type="text" class="form-control hatvege" id="prjHatvege" name="prjHatvege"
                   value="{{ $projekt->prj_hatvege?->format('Y.m.d') }}">
        </div>
    </div>

</div>

<div class="mb-3">
    <label for="prjKonzorciumban" class="form-label fw-semibold">{{ __('projekt.konzorciumban_megvalositott') }}</label>
    <select class="form-select" id="prjKonzorciumban" name="prjKonzorciumban">
        <option  value="">{{ __('general.kerjuk_valasszon') }}</option>
        @foreach($szotar['PROJEKT_KONZORCIUMBAN'] as $item)
            <option {{ $projekt->prj_konzorciumban === $item->szo_rnev ? 'selected' : '' }} value="{{ $item->szo_rnev }}">{{ $item->szo_hnev }}</option>
        @endforeach
    </select>
</div>
