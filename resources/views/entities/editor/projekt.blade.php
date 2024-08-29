@php
    /** @var \App\Models\Projekt $projekt */
@endphp

<form action="{{ route('entity.save', ['type' => 'projekt', 'uid' => 1]) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.uid') }}</label>
        <input type="text" readonly class="form-control-plaintext" id="" name="" value="{{ $projekt->prj_uid }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.projekt_azonosito_szama') }}</label>
        <input type="text" class="form-control" id="" name="" placeholder="{{ __('projekt.projekt_azonosito_szama') }}" value="{{ $projekt->prj_azonosito }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.projekt_neve') }}</label>
        <input type="text" class="form-control" id="" name="" placeholder="{{ __('projekt.projekt_neve') }}" value="{{ $projekt->prj_nev }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.projekt_rovid_neve') }}</label>
        <input type="text" class="form-control" id="" name="" placeholder="{{ __('projekt.projekt_rovid_neve') }}" value="{{ $projekt->prj_rovid_nev }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.projekt_statusza') }}</label>
        <select class="form-select" id="" name="">
            <option selected>{{ __('general.kerjuk_valasszon') }}</option>
            <option value="1">One</option>
            <option value="2">Two</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.munkaszam') }}</label>
        <input type="text" class="form-control" id="" name="" placeholder="{{ __('projekt.munkaszam') }}" value="{{ $projekt->prj_munkaszam }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.feladatvegzes_modja') }}</label>
        <select class="form-select" id="" name="">
            <option selected>{{ __('general.kerjuk_valasszon') }}</option>
            <option value="1">One</option>
            <option value="2">Two</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.munkaszam') }}</label>
        <input type="text" class="form-control" id="" name="" placeholder="{{ __('projekt.munkaszam') }}" value="{{ $projekt->prj_munkaszam }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.projekt_kategoria') }}</label>

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
        <label for="" class="form-label">{{ __('projekt.projekt_jellege') }}</label>
        <select class="form-select" id="" name="">
            <option selected>{{ __('general.kerjuk_valasszon') }}</option>
            <option value="1">One</option>
            <option value="2">Two</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('projekt.projekt_kapcsolat') }}</label>

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
        <label for="" class="form-label">{{ __('projekt.tamogatasi_szerzodes_nyilvantartasi_szama') }}</label>
        <input type="text" class="form-control" id="" name="" placeholder="{{ __('projekt.tamogatasi_szerzodes_nyilvantartasi_szama') }}" value="{{ $projekt->prj_tamogatasi_nyilv }}">
    </div>
</form>
