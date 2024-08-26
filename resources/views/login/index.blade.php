@extends('layouts.blank')

@section('title', __('login.title'))

@section('content')
    <div class="container">
        <form class="col-md-4 offset-md-4 mt-5" method="post" action="{{ route('login') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">
                {{ __('login.please_login') }}
            </h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="userName" id="userName" placeholder="{{ __('login.username') }}">
                <label for="userName">
                    {{ __('login.username') }}
                </label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('login.password') }}">
                <label for="password">
                    {{ __('login.password') }}
                </label>
            </div>

            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">
                {{ __('login.login') }}
            </button>
        </form>
    </div>
@endsection
