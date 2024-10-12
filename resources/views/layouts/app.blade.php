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

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<style>
html body {
            font-family: "Amiri", serif !important;
        }
    .amiri-regular {
        font-family: "Amiri", serif;
        font-weight: 400;
        font-style: normal;
      }

      .amiri-bold {
        font-family: "Amiri", serif;
        font-weight: 700;
        font-style: normal;
      }

      .amiri-regular-italic {
        font-family: "Amiri", serif;
        font-weight: 400;
        font-style: italic;
      }

      .amiri-bold-italic {
        font-family: "Amiri", serif;
        font-weight: 700;
        font-style: italic;
      }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        .navbar {
            background-color: #E5E5E5            !important;
            height: 140px;
            z-index: 1050; /* Ensure it appears above other elements */


        }
    </style>
    <style>
        .btn:hover {
            background-color: rgb(79, 118, 245) !important;
        }
        .btntxt {
            color: rgb(1, 2, 1);
            font-weight: bold;
            font-size: 1.3em;
        }
        .btnborder{
            border: 0px solid rgb(128, 128, 128);
        }
        .btn.active {
            background-color: rgb(234, 234, 234) !important;
            color: rgb(164, 174, 164);
        }
        /* Custom styles for the dropdown */
        .navbar .dropdown-menu {
            background-color: #9b1919; !important /* Set the background color */
            z-index: 1050; /* Ensure it appears above other elements */
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm">
            {{-- <div class="container"> --}}
                <a class="navbar-brand d-flex align-items-center me-auto" href="{{ url('/') }}">
                    <img src="{{ asset('images/newlogo.png') }}" alt="App Logo" style="height: 140px; margin-right: 0px;">
                    {{-- <span>{{ config('app.name', 'Laravel') }}</span> --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <!-- Centered Buttons -->
                    <ul class="navbar-nav mx-auto">
                        {{-- <li class="nav-item me-2">
                            <a href="{{ route('dashboard.welcomedash') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.welcomedash' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;">زر 1 عميل</button>
                        </li> --}}
                        <li class="nav-item me-2">
                            <a href="{{ route('dashboard.welcomedash') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.welcomedash' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;">لوحة التحكم الرئيسية</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="{{ route('dashboard.landingpage') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.landingpage' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;">الموقع الرئيسي</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="{{ route('dashboard.contactus') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.contactus' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;">اتصل بنا</a>
                        </li>
                        <li class="nav-item me-2">
                            <a href="{{ route('dashboard.eventedit') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.eventedit' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;">تعديل الحدث</a>
                        </li>
                        @guest
                            <li class="nav-item me-2">
                                <button class="btn btntxt btnborder" style="background-color: lightorange; font-weight: bold;">زر 2 ضيف</button>
                            </li>
                        @else
                            @if (Auth::user()->isAdmin())
                                <li class="nav-item me-2">
                                    <a href="{{ route('dashboard.guestdisplay') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.guestdisplay' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;"> الحدث</a>
                                </li>
                                <li class="nav-item me-2">
                                    <a href="{{ route('dashboard.admindash') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.admindash' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;">لوحة الإدارة</a>
                                </li>
                                <li class="nav-item me-2">
                                    <a href="{{ route('dashboard.guestedit') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.guestedit' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;">تعديل الضيف</a>
                                </li>
                                <li class="nav-item me-2">
                                    <button class="btn btntxt btnborder" style="background-color: lightorange; font-weight: bold;">زر 1 إدارة</button>
                                </li>
                            @else
                                <li class="nav-item me-2">
                                    <a href="{{ route('dashboard.guestdisplay') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.guestdisplay' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;"> الحدث</a>
                                </li>
                                <li class="nav-item me-2">
                                    <a href="{{ route('dashboard.guestedit') }}" class="btn btntxt btnborder {{ Route::currentRouteName() == 'dashboard.guestedit' ? 'active' : '' }}" style="background-color: lightorange; font-weight: bold;">تعديل الضيف</a>
                                </li>

                            @endif
                        @endguest
                    </ul>
                </div>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">{{ __('تسجيل الدخول') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('تسجيل') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            {{-- </div> --}}
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
