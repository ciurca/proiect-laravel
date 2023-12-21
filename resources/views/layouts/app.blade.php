<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if (Request::is('admin/*'))
                <a class="navbar-brand" href="{{ url(Auth::guard('organizatori')->check() ? '/admin/dashboard' : '/') }}">
                    {{ Auth::guard('organizatori')->check() ? 'Eventify Admin' : config('app.name', 'Eventify') }}
                </a>
                @endif
                @if (Request::is('participant/*') || Request::is('participant'))
                <a class="navbar-brand" href="{{ url('/')}}">
                    {{ config('app.name', 'Eventify') }} Participant
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Request::is('admin/*'))
                            @guest('organizatori')
                            @else
                        <li>
                            <a class="nav-link" href="{{ route('admin.speakers.index')}}"><i class="fas fa-user-circle"></i> Speakers</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('admin.colaborator.index')}}"><i class="fas fa-file-contract"></i> Colaboratori</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('admin.bilet.index')}}"><i class="fas fa-ticket-alt"></i> Bilete</a>
                        </li>
                            @endguest
                            @endif
                        @if (Request::is('participant/*') || Request::is('participant'))
                        @guest('participanti')
                        @endguest
                        <li>
                            <a class="nav-link" href="{{ url('/cart')}}"><i class="fas fa-shopping-cart"></i> Cos</a>
                        </li>
                        @endif


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest('organizatori')
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if (Request::is('admin/*'))
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('organizatori')->user()->nume}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('signout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('signout') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                        @endguest
                        @if (Request::is('participant/*') || Request::is('participant')  )
                        @guest('participanti')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('participant.login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register-user') }}">{{ __('Register') }}</a>
                                </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('participanti')->user()->prenume}} {{ Auth::guard('participanti')->user()->nume}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('participant.signout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('participant.signout') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="{{ route('participant.index') }}" class="nav-link px-2 text-muted">Participant</a></li>
          <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link px-2 text-muted">Admin</a></li>
        </ul>
        <p class="text-center text-muted">© 2023 Eventify, Inc</p>
      </footer>
</body>
</html>
