<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="container">

        <header class="flex px-10 h-12 fixed bg-orange-600 w-full items-center justify-between text-white">
            
            <h1 class="text-2xl font-hairline">Baelish</h1>
            
            <nav class="uppercase tracking-wider text-xs font-bold mt-2 -mb-1">
                <a class="px-4 py-3 bg-white text-orange-600 rounded-t" href="#">Dashboard</a>
                <a class="px-4 py-3 text-orange-200 hover:text-white" href="#">Categories</a>
                <a class="px-4 py-3 text-orange-200 hover:text-white" href="#">Transactions</a>
                <a class="px-4 py-3 text-orange-200 hover:text-white" href="#">Budget</a>
            </nav>

            <nav>
                @guest
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="#">{{ Auth::user()->name }}</a>
                    <div class="inline ml-2" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
            </nav>
        </header>

        <main class="py-4 pt-20 px-10 w-full">
            @yield('content')
        </main>

    </div>
</body>
</html>
