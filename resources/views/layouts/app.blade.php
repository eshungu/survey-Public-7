<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Trainings Evaluation') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="assets/plugins/global/plugins.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
</head>
<body>
    <div id="app">
        
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Bank Services Rating') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <!-- @hasRole('admin') -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">Manage Users</a>
                        </li>  
                        <!-- @endhasRole                  -->             

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('surveyWelcomePage') }}">Rate Your Bank</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('statisticalTables') }}">Statistical Tables</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ChartsAndComments') }}">Charts & Comments</a>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('compareBanksByServices') }}">Compare by Service</a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('compareBanksByServices') }}">Comparative Statistics (All)</a>
                        </li>   

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('compareBanksByServices') }}">Comparative charts (All)</a>
                        </li>      -->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('recordNewTrainingSession') }}">Record a new Bank</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
            </div>
        </nav>

        <main class="py-4 container">
            @include('partials.alerts')
            @yield('content')
        </main>
        
    </div>

</body>
</html>
