@extends('layouts.app')

@section('title', $title)

@section('content')
    @include('entity.snippets.edit')

    <div class="card list-card">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body small">
            <button type="button" class="btn btn-primary mb-3 btn-edit-modal-open"
                data-type="{{ $type }}">
                {{ __('entity.uj_elem_felvitele') }}
            </button>

            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
