@extends('layouts.app')

@section('title', $title)

@section('content')

    @if($mergeable)
        <button type="button" class="btn btn-outline-primary">Összevonás</button>
    @endif

    @foreach($list as $element)
       <div class="card mb-3">
           <div class="card-header">{{ $element->getUniqueName() }}</div>
           <div class="card-body">
               <div class="card-text">
                   @include('entities.display.' . $type, [$type => $element])
               </div>
               <button type="button" class="btn btn-outline-primary">Szerkesztés</button>
               <button type="button" class="btn btn-outline-danger">Törlés</button>
           </div>
           <div class="card-footer">{{ $element->getHatInterval() }}</div>
       </div>
    @endforeach

@endsection
