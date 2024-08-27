@php
    use App\Models\AuthUser;
    use Illuminate\Support\Facades\Auth;
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
    <div class="bg-body-secondary p-2 text-end">
        {{ __('layout.date_picker') }}:
        <input type="text" name="aktDate">
        {{ __('layout.display') }}:
        <input type="text" name="startDate">
        <input type="text" name="endDate">
        <span class="fw-semibold">
            {{ $user->user_name }}
        </span>
        <a class="btn btn-outline-primary ms-2" href="{{ route('logout') }}">
            {{ __('layout.logout') }}
        </a>
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                {{ __('layout.title') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Entities
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Entity 1</a></li>
                            <li><a class="dropdown-item" href="#">Entity 2</a></li>
                            <li><a class="dropdown-item" href="#">Entity 3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')
</div>

@stack('scripts')
</body>
</html>
