@php
    use App\Models\AuthUser;use Illuminate\Support\Facades\Auth;
    /* @var $user AuthUser */
    $user = Auth::user();
@endphp

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('layout.title') }} - @yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container-xxl p-0">
    <div class="bg-body-secondary p-2 d-flex justify-content-between">
        <div>
            @include('layouts.snippets.datepickers')
        </div>
        <div>
        <span class="fw-semibold ms-3">
            {{ $user->user_name }}
        </span>
            <a class="btn btn-outline-primary ms-2" href="{{ route('logout') }}">
                {{ __('layout.logout') }}
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid ps-0">
                <a class="navbar-brand" href="/">
                    {{ __('layout.title') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Törzsadatok
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('entity.list', ['type' => 'partner']) }}">Partnerek</a></li>
                                <li><a class="dropdown-item" href="{{ route('entity.list', ['type' => 'projekt']) }}">Projektek</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Nyitólap</a></li>
                @if(isset($breadcrumbs))
                    @foreach($breadcrumbs as $url => $breadcrumb)
                        <li class="breadcrumb-item {{ !$url ? 'active' : '' }}">
                            @if ($url)
                                <a class="text-decoration-none" href="{{ $url }}">
                                    @endif
                                    {{ $breadcrumb }}
                                    @if ($url) </a>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ol>
        </nav>
    </div>
    <div>
        @yield('content')
    </div>
</div>

@stack('scripts')
</body>
</html>
