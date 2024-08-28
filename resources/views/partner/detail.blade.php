@php
    /** @var \App\Models\Partner $partner */
@endphp
@extends('layouts.app')

@section('title', __('partner.title'))

@section('content')

    @foreach($partners as $partner)

        <div class="card mb-3">
            <div class="card-header">{{ $partner->getUniqueName() }}</div>
            <div class="card-body">
                <div class="card-text">
                    @include('entities.display.partner', ['partner' => $partner])
                </div>
                <button type="button" class="btn btn-outline-primary">Szerkesztés</button>
                <button type="button" class="btn btn-outline-danger">Törlés</button>
            </div>
            <div class="card-footer">{{ $partner->getHatInterval() }}</div>
        </div>

    @endforeach

@endsection
