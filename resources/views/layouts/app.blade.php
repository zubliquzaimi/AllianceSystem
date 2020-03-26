<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <script src="{{ asset('js/app.js') }}" defer></script>
            <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
            <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">

            <title>{{ config('app.name', 'Alliance System') }}</title>

            <style>
                a 
                {
                    cursor: pointer;
                }
                
                ::-webkit-scrollbar 
                {
                    width: 10px;
                }

                ::-webkit-scrollbar-track 
                {
                    background: #f1f1f1; 
                }
                
                ::-webkit-scrollbar-thumb 
                {
                    background: #888; 
                }

                ::-webkit-scrollbar-thumb:hover 
                {
                    background: #555; 
                }

                .navbar-brand
                {
                    position:fixed;
                    z-index:9999;
                    left:40px;
                    top:0px;
                    padding-top: 0px;
                }

                a:link 
                {
                    color: #A7BBD0;
                }

                a:visited 
                {
                    color: #00a19c;
                }
                a:hover 
                {
                    color: #00a19c;
                }

                a:active 
                {
                    color: #00a19c;
                }

                .navbar
                {
                    min-height: 60px;
                    width: 100%;
                    color:#1E2835;
                }

                .bg-dark
                {
                    background-color:#1b2530 !important;
                }

                .scroll
                {
                    height: 300px;
                    overflow-y: auto;
                }

                .recolor, .card 
                {
                    background-color: #243140 !important;
                    border-color: #2F3C4A !important;
                }

                .FF1A2B
                {
                    background-color: #FF1A2B !important;
                    height:15px;
                    width:15px;
                    border-radius:200px;
                    margin-left:30%;
                }
                
                .F6FF43
                {
                    background-color: #F6FF43 !important;
                    height:15px;
                    width:15px;
                    border-radius:200px;
                    margin-left:30%;
                }

                .F1FF50
                {
                    background-color: #91FF50 !important;
                    height:15px;
                    width:15px;
                    border-radius:200px;
                    margin-left:30%;
                }

                .card-header
                {
                    background-color:#1b2530 !important;
                }

                .to-background 
                {
                    background-color:#202a38 !important;
                }

                .border-background 
                {
                    border-color: #202a38 !important;
                }
                .dropdown-menu 
                {
                    min-width: 3rem;
                }
                html, body 
                {
                    max-width: 100%;
                    overflow-x: hidden;
                    background-color: #202A38;
                    color:#A7BBD0 !important;
                }

                .table-bordered td 
                {
                    background-color:#243140;
                    border:1px solid #2F3C4A;
                    color:#A7BBD0 !important;
                }

                .table-bordered th
                {
                    background-color:#202A38 !important;
                    border:1px solid #2F3C4A;
                    color:#ffffff;
                }

                .btn-outline-secondary 
                {
                    color:#00a19c;
                    border-color:#00a19c;
                }

                .btn-outline-secondary:hover
                {
                    background-color: #394553;
                    border-color: #91989f;
                    color:#91989f;
                }

                input[type=text], input[type=email], input[type=password], .dropdown-color, select option 
                {
                    background-color: #E6E6E6 !important;
                    border-color:#91989f;
                }

                textarea 
                {
                    background-color: #e6e6e6 !important;
                    resize: none;
                }
            </style>
        </head>
        <body>
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm center">
                    <div class="container">
                        <a class="navbar-brand" href="/home">
                            <img src="https://www.petronas.com/static/img/pet-logo-corp.jpg" class="shadow" width="66" height="79" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
<!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

<!-- Right Side Of Navbar -->
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

<!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Partner') }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/partners_list">
                                            {{ __('List of Partners') }}
                                        </a>
                                        <a class="dropdown-item" href="/partner">
                                            {{ __('Add Partners') }}
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Alliance') }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/alliance_list">
                                            {{ __('List of Alliance') }}
                                        </a>
                                        <a class="dropdown-item" href="/alliance">
                                            {{ __('Add Alliance') }}
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Activity') }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/activity_list">
                                            {{ __('List of Activity') }}
                                        </a>
                                        <a class="dropdown-item" href="/activity">
                                            {{ __('Add Activity') }}
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown pull-left mr-auto">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Hi,  {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </body>
    </html>
