@extends('layouts.app')

@section('title', $title)

@section('content')
    @include('entity.snippets.edit')

    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body small">
            <a href="{{ route('entity.edit', ['type' => $type, 'uid' => 0]) }}" class="btn btn-outline-success mb-3">
                {{ __('entity.uj_elem_felvitele') }}
            </a>

            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
