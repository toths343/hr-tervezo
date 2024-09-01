@extends('layouts.app')

@section('title', $title)

@section('content')
    @include('entity.snippets.edit')

    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body small">
            <button type="button" class="btn btn-outline-success mb-3 btn-edit-modal-open"
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
