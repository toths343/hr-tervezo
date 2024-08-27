@extends('layouts.app')

@section('title', __('partner.title'))

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('partner.title') }}</div>
            <div class="card-body small">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
