@php
    /** @var \App\Models\Projekt $projekt */
@endphp

<div class="row">
    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.uid') }}</dt>
        <dd>{{ $projekt->prj_uid }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.projekt_azonosito_szama') }}</dt>
        <dd>{{ $projekt->prj_azonosito }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.projekt_neve') }}</dt>
        <dd>{{ $projekt->prj_nev }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.projekt_rovid_neve') }}</dt>
        <dd>{{ $projekt->prj_rovid_nev }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.projekt_statusza') }}</dt>
        <dd>{{ $projekt->prj_status }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.munkaszam') }}</dt>
        <dd>{{ $projekt->prj_munkaszam }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.projekt_kategoria') }}</dt>
        <dd>{{ 'FIXME' }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.projekt_jellege') }}</dt>
        <dd>{{ 'FIXME' }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.projekt_kapcsolat') }}</dt>
        <dd>{{ 'FIXME' }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt>{{ __('projekt.tamogatasi_szerzodes_nyilvantartasi_szama') }}</dt>
        <dd>{{ $projekt->prj_tamogatasi_nyilv }}</dd>
    </dl>

</div>
