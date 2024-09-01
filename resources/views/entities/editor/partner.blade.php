@php
    /** @var \App\Models\Partner $partner */
@endphp

<script>
    $(function() {
        const dateFormat = 'yy.mm.dd';

        $('input[name="parHatkezd"]').datepicker({
            dateFormat: dateFormat
        });

        $('input[name="parHatvege"]').datepicker({
            dateFormat: dateFormat
        });
    });
</script>

<form class="edit-form" action="#">
    @csrf
    <input type="hidden" name="parId" class="id"/>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('partner.partner_azonosito') }}</label>
        <input type="text" class="form-control" id="parAzonosito" name="parAzonosito"
               placeholder="{{ __('partner.partner_azonosito') }}" value="{{ $partner->par_azonosito }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('partner.partner_nev') }}</label>
        <input type="text" class="form-control" id="parNev" name="parNev"
               placeholder="{{ __('partner.partner_nev') }}" value="{{ $partner->par_nev }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('partner.partner_adoszama') }}</label>
        <input type="text" class="form-control" id="parAdoszam" name="parAdoszam"
               placeholder="{{ __('partner.partner_adoszama') }}" value="{{ $partner->par_adoszam }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('partner.partner_nyilvantartasi_szama') }}</label>
        <input type="text" class="form-control" id="parNyilvSzam" name="parNyilvSzam"
               placeholder="{{ __('partner.partner_nyilvantartasi_szama') }}" value="{{ $partner->par_nyilv_szam }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('partner.partner_cime') }}</label>
        <input type="text" class="form-control" id="parCim" name="parCim"
               placeholder="{{ __('partner.partner_cime') }}" value="{{ $partner->par_cim }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">{{ __('partner.partner_hatalyossaga') }}</label>

        <div class="row g-3 align-items-center">
            <div class="col-6">
                <input type="text" class="form-control hatkezd" id="parHatkezd" name="parHatkezd"
                       value="{{ $partner->par_hatkezd?->format('Y.m.d') }}">
            </div>
            <div class="col-6">
                <input type="text" class="form-control hatvege" id="parHatvege" name="parHatvege"
                       value="{{ $partner->par_hatvege?->format('Y.m.d') }}">
            </div>
        </div>

    </div>
</form>
