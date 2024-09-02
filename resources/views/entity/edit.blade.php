@php /** @var App\Interfaces\HatalyosModel[] $list */ @endphp
@extends('layouts.app')

@section('title', $title)

@section('content')

    <form class="edit-form" action="#" data-type="{{ $type }}" data-id="{{ $id }}" data-uid="{{ $uid }}" data-hatkezd="{{ $hatkezd }}" data-hatvege="{{ $hatvege }}">
        @csrf
        {!! $editContent !!}

        <a href="{{ $id ? route('entity.index', ['type' => $type, 'id' => $id]) : route('entity.list', ['type' => $type]) }}" class="btn btn-secondary">
            {{ __('layout.megse') }}
        </a>
        <button type="button" class="btn btn-primary save-btn">
            {{ __('entity.mentes') }}
        </button>
    </form>

@endsection
