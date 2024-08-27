@extends('layouts.blank')

@section('title', __('login.title'))

@section('content')
    <div class="container">
        <form class="col-md-4 offset-md-4 mt-5" method="post" action="{{ route('doLogin') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">
                {{ __('login.please_login') }}
            </h1>

            <div class="col-12">
                <label class="form-label" for="userName">
                    {{ __('login.username') }}
                </label>
                <input type="text" class="form-control {{ $errors->has('userName') ? 'is-invalid' : ($errors->any() ? 'is-valid' : '') }}" name="userName" id="userName" value="{{ old('userName') }}" placeholder="{{ __('login.username') }}">
                @if($errors->has('userName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('userName') }}
                    </div>
                @endif
            </div>
            <div class="col-12 mt-2">
                <label class="form-label" for="password">
                    {{ __('login.password') }}
                </label>
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" placeholder="{{ __('login.password') }}">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">
                {{ __('login.login') }}
            </button>
        </form>
    </div>
@endsection
