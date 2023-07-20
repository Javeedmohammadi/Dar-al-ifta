<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            /* border: 1px red solid; */
        }

        #welcome-contianer {
            width: 100vw !important;
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            justify-content: space-between;
        }

        .item-1 {
            background: linear-gradient(to left, #14a061, #1eaf6e);
            margin: 0;
            padding: 0;
            grid-column: 1 / 11;
            border-radius: 10px;
            margin-right: 5px;
        }

        .item-2 {
            grid-column: 11 / -1;
            border-radius: 10px;
        }

        @media screen and (width <=768px) {
            .item-1 {
                grid-column: 1 / -1;
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @font-face {
            font-family: BAB;
            src: url('/new_fonts/Bahij Baraem-Regular.ttf');
        }

        @font-face {
            font-family: BNB;
            src: url('/fonts/nazanin/BahijNazanin-Bold.ttf');
        }

        @font-face {
            font-family: BNR;
            src: url('/fonts/nazanin/BahijNazanin-Regular.ttf');
        }

        @font-face {
            font-family: BFR;
            src: url('/fonts/Bahij Firas-Regular.ttf');
        }

        @font-face {
            font-family: BHB;
            src: url('/fonts/Bahij Homa-Bold.ttf');
        }

        body {
            font-family: bab !important;
        }

        #nav-bar-btn {
            display: none !important;
        }

        @media screen and (width <=768px) {
            #nav-bar-btn {
                display: block !important;
            }

            #logo {
                width: 15vw !important;
            }

            #mobile-side-bar {
                display: block !important;
                direction: rtl !important;
            }

            #navbarSupportedContent {
                direction: rtl !important;
            }

            #pc-side-bar,
            #main_page_mobile {
                display: none !important;
            }
        }

        #mobile-side-bar {
            display: none;
        }

        #pc-side-bar {
            background: linear-gradient(to left, #14a061, #1eaf6e);
            color: white;
        }

        #pc-side-bar h5 a {
            padding-right: 20px
        }

        ::selection {
            color: rebeccapurple;
            background-color: lightblue;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        #app #top-header {
            position: sticky;
            top: 0px;
        }

        h1,
        h3,
        h2,
        h4,
        p {
            text-align: justify;
        }

        h1,
        h3,
        h2,
        h4,
        p,
        a,
        textarea,
        label,
        input,
        .accordion-body {
            direction: rtl !important;
        }

        .NANS {
            display: inline-block;
            font-size: 20px;
            position: absolute;
            color: red;
            top: -150px;
        }

        .ANS {
            display: inline-block;
            position: absolute;
            top: -150px;
        }

        #nav-bar-btn .bi-list {
            font-size: 2rem;
            transition: all 0.3s ease-in-out;
            opacity: 0.7;
        }
    </style>

</head>

<body>
    <div id="app">
        <nav id="top-header" class="navbar navbar-expand-md p-4"
            style="background: linear-gradient(to left, #14a061, #1eaf6e)">
            <div class="container">
                <a class="navbar-brand text-center" style="transform: scale(3); color: white;"
                    href="{{ route('main_page.go', app()->getLocale()) }}">&#9752;</a>
                <button id="nav-bar-btn" class="btn text-white rounded m-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="bi bi-list"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <a href="{{ route('main_page.go', app()->getLocale()) }}" class="nav-link text-white"><span
                                class="bi bi-app-indicator">&nbsp;&nbsp;</span>{{ __('msg.main_page') }}</a>
                        <a id="main_page_mobile" href="{{ route('home.go', app()->getLocale()) }}"
                            class="nav-link mx-2 text-white"><span
                                class="bi bi-app">&nbsp;&nbsp;</span>{{ __('msg.main_page_text') }}</a>

                        <div class="dropdown" id="mobile-side-bar">
                            <a class="nav-link text-white dropdown-toggle" type="button" id="ddb"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="bi bi-app">&nbsp;&nbsp;</span>
                                {{ __('msg.other_pages') }}
                            </a>
                            <ul class="dropdown-menu alert alert-success" aria-labelledby="ddb">
                                <li>
                                    {{-- <a href="{{ route('home.go', app() -> getLocale()) }}" class="dropdown-item text-end">{{ __('msg.main_page_text') }}</a>
                                    <a href="{{ route('people.create', app() -> getLocale()) }}" class="dropdown-item text-end">{{ __('msg.question_page') }}</a>
                                    <a href="{{ route('person.get.all', app() -> getLocale()) }}" class="dropdown-item text-end">{{ __('msg.all_fitwas_page') }}</a>
                                    <a href="{{ route('show.scholar', app() -> getLocale()) }}" class="dropdown-item text-end">{{ __('msg.scholar_page') }}</a>
                                    <a href="{{ route('show.articals', app() -> getLocale()) }}" class="dropdown-item text-end">{{ __('msg.article_page') }}</a>
                                    <a href="{{ route('show.suggest.objection', app() -> getLocale()) }}" class="dropdown-item text-end">{{ __('msg.suggestion_page') }}</a>
                                    <a href="{{ route('show.information', app() -> getLocale()) }}" class="dropdown-item text-end">{{ __('msg.information_page') }}</a> --}}
                                    {{--  --}}
                                    <a href="{{ route('home.go', app()->getLocale()) }}"
                                        class="list-group-item text-end"><span
                                            class="bi bi-search"></span>&nbsp;&nbsp;&nbsp;{{ __('msg.search_fitwa') }}</a>
                                    <a href="{{ route('people.create', app()->getLocale()) }}"
                                        class="list-group-item text-end"><span
                                            class="bi bi-question-square-fill"></span>&nbsp;&nbsp;&nbsp;{{ __('msg.question_page') }}</a>
                                    <a href="{{ route('person.get.all', app()->getLocale()) }}"
                                        class="list-group-item text-end"><span
                                            class="bi bi-table"></span>&nbsp;&nbsp;&nbsp;{{ __('msg.all_fitwas_page') }}</a>
                                    <a href="{{ route('show.scholar', app()->getLocale()) }}"
                                        class="list-group-item text-end"><span
                                            class="bi bi-people"></span>&nbsp;&nbsp;&nbsp;{{ __('msg.scholar_page') }}</a>
                                    <a href="{{ route('show.articals', app()->getLocale()) }}"
                                        class="list-group-item text-end"><span
                                            class="bi bi-newspaper"></span>&nbsp;&nbsp;&nbsp;{{ __('msg.article_page') }}</a>
                                    <a href="{{ route('show.suggest.objection', app()->getLocale()) }}"
                                        class="list-group-item text-end"><span
                                            class="bi bi-journals"></span>&nbsp;&nbsp;&nbsp;{{ __('msg.suggestion_page') }}</a>
                                    <a href="{{ route('show.information', app()->getLocale()) }}"
                                        class="list-group-item text-end"><span
                                            class="bi bi-info-square-fill"></span>&nbsp;&nbsp;&nbsp;{{ __('msg.information_page') }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown">
                            <a class="nav-link text-white dropdown-toggle" type="button" id="ddb"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="bi bi-flag">&nbsp;&nbsp;</span>
                                {{ __('msg.prefer_language') }}
                            </a>
                            <ul class="dropdown-menu alert alert-success" aria-labelledby="ddb">
                                <li>
                                    <a href="/ps/main_page" class="dropdown-item text-end">پښتو</a>
                                    <a href="/dr/main_page" class="dropdown-item text-end">دری</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login', app()->getLocale()) }}">
                                        <span class="bi bi-people">&nbsp;&nbsp;</span>
                                        {{ __('msg.login') }}
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white"
                                        href="{{ route('register', app()->getLocale()) }}">{{ __('msg.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" style="position: relative;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    <span class="bi bi-person">&nbsp;&nbsp;</span>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="alert alert-success dropdown-menu dropdown-menu-end"
                                    aria-labelledby="navbarDropdown">
                                    <a href="{{ route('home', app()->getLocale()) }}" class="dropdown-item text-end">
                                        <i class="bi bi-tools">&nbsp;</i>
                                        {{ __('msg.CMS') }}
                                    </a>
                                    @if (Auth::user()->role == 1)
                                        <a class="text-end dropdown-item"
                                            href="{{ route('create.system.user', app()->getLocale()) }}">
                                            <i class="bi bi-person-plus-fill">&nbsp;</i>
                                            {{ __('msg.register') }}
                                        </a>
                                    @else
                                        <span></span>
                                    @endif

                                    <hr>
                                    <a class="dropdown-item bg-danger text-end text-white rounded"
                                        href="{{ route('logout', app()->getLocale()) }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-person-fill-down">&nbsp;</i>
                                        {{ __('msg.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}"
                                        method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </div>

    {{-- Main Content ... --}}
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
    {{-- End of Main Content ... --}}

    @include('sweetalert::alert')
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
@yield('script1')
@yield('script2')
@yield('script3')

</body>

</html>
