<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="vh-100">
        <nav id="navbar_admin" class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">

            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Portfolio</a>

            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
                data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

            <div class="dropdown mx-5">
                <button class="btn dropdown-toggle text-light" type="button" id="triggerId" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu dropdown-center dropdown-menu-dark" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="{{ url('/') }}">{{ __('Home Page') }}</a>
                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </nav>

        <div id="container_admin" class="container-fluid">
            <div class="row h-100">

                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-dark text-light rounded' : '' }}"
                                    aria-current="page" href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-gamepad"></i>
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-dark text-light rounded' : '' }}"
                                    href="{{ route('admin.projects.index') }}">
                                    <i class="fa-solid fa-list"></i>
                                    {{ __('Projects') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-dark text-light rounded' : '' }}"
                                    href="{{ route('admin.types.index') }}">
                                    <i class="fa-solid fa-tags"></i>
                                    {{ __('Types') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.technologies.index' ? 'bg-dark text-light rounded' : '' }}"
                                    href="{{ route('admin.technologies.index') }}">
                                    <i class="fa-solid fa-microchip"></i>
                                    {{ __('Technologies') }}
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>

                <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>

            </div>
        </div>
    </div>
</body>
