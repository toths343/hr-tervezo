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
        <button type="button" class="btn btn-outline-success mb-2 btn-edit-modal-open" data-type="{{ $type }}">
            {{ __('entity.uj_elem_felvitele_lista_elejere') }}
        </button>
    @endif

    @foreach($list as $element)
       <div class="card mb-3">
           <div class="card-header @if($element->isActive()) bg-black text-white @endif" data-entity-unique-name="{{ $type }}" data-uid="{{ $element->getUid() }}" data-bs-toggle="collapse" href="#collapse{{ $element->getUid() }}" role="button" aria-expanded="false" aria-controls="collapse{{ $element->getUid() }}">
               {{ $element->getUniqueName() }}
           </div>
           <div class="card-body collapse @if($element->isActive()) show @endif" id="collapse{{ $element->getUid() }}">
               <div class="card-text" data-entity-display="{{ $type }}" data-uid="{{ $element->getUid() }}">
                   @include('entities.display.' . $type, [$type => $element])
               </div>
               <button type="button" class="btn btn-outline-primary btn-edit-modal-open" data-type="{{ $type }}" data-uid="{{ $element->getUid() }}">
                   {{ __('entity.szerkesztes') }}
               </button>
               <button type="button" class="btn btn-outline-danger btn-delete-modal-open" data-type="{{ $type }}" data-uid="{{ $element->getUid() }}">
                   {{ __('entity.torles') }}
               </button>
           </div>
           <div class="card-footer @if($element->isActive()) bg-black text-white @endif" data-entity-interval="{{ $type }}" data-uid="{{ $element->getUid() }}">
               {{ $element->getHatInterval() }}
           </div>
       </div>
    @endforeach

    @if ($canInsertAfterLast)
        <button type="button" class="btn btn-outline-success mb-2">
            {{ __('entity.uj_elem_felvitele_lista_vegere') }}
        </button>
    @endif

@endsection
