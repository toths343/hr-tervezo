@php
    /** @var \App\Models\Partner $partner */
@endphp

<div class="row">
    <dl class="col-lg-6 mb-0">
        <dt>Azonosító</dt>
        <dd>{{ $partner->par_azonosito }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt class="col-12">Név</dt>
        <dd class="col-12">{{ $partner->par_nev }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt class="col-12">Adószám</dt>
        <dd class="col-12">{{ $partner->par_adoszam }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt class="col-12">Nyilvántartási szám</dt>
        <dd class="col-12">{{ $partner->par_nyilv_szam }}</dd>
    </dl>

    <dl class="col-lg-6 mb-0">
        <dt class="col-12">Cím</dt>
        <dd class="col-12">{{ $partner->par_cim }}</dd>
    </dl>
</div>
