@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body small">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
