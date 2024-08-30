@php /** @var App\Interfaces\HatalyosModel[] $list */ @endphp
@extends('layouts.app')

@section('title', $title)

@section('content')

    @include('entity.snippets.merge')
    @include('entity.snippets.borderdate')
    @include('entity.snippets.edit')

    @if ($canInsertBeforeFirst)
        <br/>
        <button type="button" class="btn btn-outline-success mb-2">
            {{ __('entity.uj_elem_felvitele_lista_elejere') }}
        </button>
    @endif

    @foreach($list as $element)
       <div class="card mb-3">
           <div class="card-header">{{ $element->getUniqueName() }}</div>
           <div class="card-body">
               <div class="card-text">
                   @include('entities.display.' . $type, [$type => $element])
               </div>
               <button type="button" class="btn btn-outline-primary btn-edit-modal-open" data-type="{{ $type }}" data-uid="{{ $element->getUid() }}">Szerkesztés {{$element->getUid()}}</button>
               <button type="button" class="btn btn-outline-danger" data-type="{{ $type }}" data-uid="{{ $element->getUid() }}">Törlés</button>
           </div>
           <div class="card-footer">{{ $element->getHatInterval() }}</div>
       </div>
    @endforeach

    @if ($canInsertAfterLast)
        <button type="button" class="btn btn-outline-success mb-2">
            {{ __('entity.uj_elem_felvitele_lista_vegere') }}
        </button>
    @endif

@endsection
