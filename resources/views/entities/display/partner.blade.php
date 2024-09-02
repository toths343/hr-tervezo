@php
    /** @var \App\Models\Partner $partner */
@endphp

<div class="mb-3">
    <label for="parAzonosito" class="form-label fw-semibold">{{ __('partner.partner_azonosito') }}</label>
    <div class="form-control-plaintext">
        {{ $partner->par_azonosito }}
    </div>
</div>

<div class="mb-3">
    <label for="parNev" class="form-label fw-semibold">{{ __('partner.partner_nev') }}</label>
    <div class="form-control-plaintext">
        {{ $partner->par_nev }}
    </div>
</div>

<div class="mb-3">
    <label for="parAdoszam" class="form-label fw-semibold">{{ __('partner.partner_adoszama') }}</label>
    <div class="form-control-plaintext">
        {{ $partner->par_adoszam }}
    </div>
</div>

<div class="mb-3">
    <label for="parNyilvSzam" class="form-label fw-semibold">{{ __('partner.partner_nyilvantartasi_szama') }}</label>
    <div class="form-control-plaintext">
        {{ $partner->par_nyilv_szam }}
    </div>
</div>

<div class="mb-3">
    <label for="parCim" class="form-label fw-semibold">{{ __('partner.partner_cime') }}</label>
    <div class="form-control-plaintext">
        {{ $partner->par_cim }}
    </div>
</div>

<div class="mb-3">
    <label for="parHatkezd" class="form-label fw-semibold">{{ __('partner.partner_hatalyossaga') }}</label>
    <div class="form-control-plaintext">
        {{ $partner->par_hatkezd?->format('Y.m.d') }} - {{ $partner->par_hatvege?->format('Y.m.d') }}
    </div>
</div>
