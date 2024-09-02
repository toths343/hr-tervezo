@php /** @var App\Interfaces\HatalyosModel[] $list */ @endphp
@extends('layouts.app')

@section('title', $title)

@section('content')

    @include('entity.snippets.merge')
    @include('entity.snippets.split')
    @include('entity.snippets.borderdate')
    @include('entity.snippets.edit')
    @include('entity.snippets.delete')

    @if ($canInsertBeforeFirst)
        <br/>
        <a href="{{ route('entity.edit', [
                'type' => $type,
                'id' => $id,
                'uid' => 0,
                'hatkezd' => '1900.01.01',
                'hatvege' => $list->first()->getHatkezd()->copy()->subDay()->format('Y.m.d'),
            ]) }}" class="btn btn-outline-success mb-3">
            {{ __('entity.uj_elem_felvitele_lista_elejere') }}
        </a>
    @endif

    @php
        $lastHatvege = null;
    @endphp
    @foreach($list as $element)
        @if ($lastHatvege !== null && $lastHatvege->copy()->addDay() < $element->getHatkezd())
            <a href="{{ route('entity.edit', [
                'type' => $type,
                'id' => $id,
                'uid' => 0,
                'hatkezd' => $lastHatvege->copy()->addDay()->format('Y.m.d'),
                'hatvege' => $element->getHatkezd()->copy()->subDay()->format('Y.m.d')
            ]) }}" class="btn btn-outline-success mb-3">
                {{ __('entity.uj_elem_felvitele') }}
            </a>
        @endif

        <div class="card mb-3">
            <div class="card-header @if($element->isActive()) bg-black text-white @endif" data-bs-toggle="collapse" href="#collapse{{ $element->getUid() }}" role="button" aria-expanded="false" aria-controls="collapse{{ $element->getUid() }}">
                {{ $element->getUniqueName() }}
            </div>
            <div class="card-body collapse @if($element->isActive()) show @endif" id="collapse{{ $element->getUid() }}">
                <div class="card-text">
                    @include('entities.simpledisplay.' . $type, [$type => $element])
                </div>
                <button type="button" class="btn btn-outline-primary btn-split-modal-open" data-type="{{ $type }}" data-uid="{{ $element->getUid() }}">
                    {{ __('entity.felosztas') }}
                </button>
                <a href="{{ route('entity.edit', ['type' => $type, 'uid' => $element->getUid()]) }}" class="btn btn-outline-primary">
                    {{ __('entity.szerkesztes') }}
                </a>
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
        <a href="{{ route('entity.edit', [
                'type' => $type,
                'id' => $id,
                'uid' => 0,
                'hatkezd' => $list->last()->getHatvege()->copy()->addDay()->format('Y.m.d'),
                'hatvege' => '3999.12.31',
            ]) }}" class="btn btn-outline-success mb-3">
            {{ __('entity.uj_elem_felvitele_lista_vegere') }}
        </a>
    @endif

@endsection
