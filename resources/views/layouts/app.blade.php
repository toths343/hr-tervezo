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
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed top w-100">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    {{ __('layout.title') }}
                </a>

                <div class="navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav mb-2 mb-lg-0 px-3">
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
                    <a class="btn btn-secondary btn-sm btn-icon" href="{{ route('logout') }}">
                        <i class="icon-log-out"></i>
                    </a>
                </div>
            </div>
        </nav>
        <section class="d-flex justify-content-between py-2" id="date-selector">
            @include('layouts.snippets.datepickers')
        </section>
        <div>
        <span class="fw-semibold ms-3">
            {{ $user->user_name }}
        </span>

        </div>
    </header>
    <div class="d-flex justify-content-between align-items-center px-2 p-xxl-0 mb-3">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-decoration-none color-primary" href="{{ route('home.index') }}">Nyitólap</a></li>
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
    <div class="px-2 p-xxl-0">
        @if(session()->get('successSaveMessage'))
            <div class="alert alert-success my-2" role="alert">
                <h4 class="alert-heading">
                    {{ __('layout.sikeres_mentes') }}
                </h4>
                <hr/>
                {{ session()->get('successSaveMessage') }}
            </div>
        @endif
        @if(session()->get('successDeleteMessage'))
            <div class="alert alert-success py-2" role="alert">
                <h4 class="alert-heading">
                    {{ __('layout.sikeres_torles') }}
                </h4>
                <hr/>
                {{ session()->get('successDeleteMessage') }}
            </div>
        @endif
        @yield('content')
    </div>
</div>

@stack('scripts')
</body>
</html>
