@php /** @var App\Interfaces\HatalyosModel[] $list */ @endphp
@extends('layouts.app')

@section('title', $title)

@section('content')

    @include('entity.snippets.merge')
    @include('entity.snippets.borderdate')
    @include('entity.snippets.edit')
    @include('entity.snippets.delete')

    @if ($canInsertBeforeFirst)
        <br/>
        <button type="button" class="btn btn-outline-success mb-3 btn-edit-modal-open"
                data-id="{{ $id }}"
                data-type="{{ $type }}"
                data-hatkezd="1900.01.01"
                data-hatvege="{{ $list->first()->getHatkezd()->copy()->subDay()->format('Y.m.d') }}">
            {{ __('entity.uj_elem_felvitele_lista_elejere') }}
        </button>
    @endif

    @php
        $lastHatvege = null;
    @endphp
    @foreach($list as $element)

        @if ($lastHatvege !== null && $lastHatvege->copy()->addDay() < $element->getHatkezd())
            <button type="button" class="btn btn-outline-success mb-3 btn-edit-modal-open"
                data-id="{{ $id }}"
                data-type="{{ $type }}"
                data-hatkezd="{{ $lastHatvege->copy()->addDay()->format('Y.m.d') }}"
                data-hatvege="{{ $element->getHatkezd()->copy()->subDay()->format('Y.m.d') }}">
                {{ __('entity.uj_elem_felvitele') }}
            </button>
        @endif

        <div class="card mb-3">
            <div class="card-header @if($element->isActive()) bg-black text-white @endif" data-bs-toggle="collapse" href="#collapse{{ $element->getUid() }}" role="button" aria-expanded="false" aria-controls="collapse{{ $element->getUid() }}">
                {{ $element->getUniqueName() }}
            </div>
            <div class="card-body collapse @if($element->isActive()) show @endif" id="collapse{{ $element->getUid() }}">
                <div class="card-text">
                    @include('entities.display.' . $type, [$type => $element])
                </div>
                <button type="button" class="btn btn-outline-primary btn-edit-modal-open" data-type="{{ $type }}" data-uid="{{ $element->getUid() }}">
                    {{ __('entity.szerkesztes') }}
                </button>
                <button type="button" class="btn btn-outline-danger btn-delete-modal-open" data-type="{{ $type }}" data-uid="{{ $element->getUid() }}">
                    {{ __('entity.torles') }}
                </button>
            </div>
            <div class="card-footer @if($element->isActive()) bg-black text-white @endif">
                {{ $element->getHatInterval() }}
            </div>
        </div>
        @php
            $lastHatvege = $element->getHatvege();
        @endphp
    @endforeach

    @if ($canInsertAfterLast)
        <button type="button" class="btn btn-outline-success mb-3 btn-edit-modal-open"
                data-id="{{ $id }}"
                data-type="{{ $type }}"
                data-hatkezd="{{ $list->last()->getHatvege()->copy()->addDay()->format('Y.m.d') }}"
                data-hatvege="3999.12.31">
            {{ __('entity.uj_elem_felvitele_lista_vegere') }}
        </button>
    @endif

@endsection
