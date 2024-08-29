@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="card">
        <div class="card-header">{{ __('partner.title') }}</div>
        <div class="card-body small">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
