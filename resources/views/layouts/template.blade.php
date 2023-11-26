<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary" href="#">Subscribe</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="#">AngkutKUY™</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    @guest
                        <a class="p-2 link-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>

                        <a class="p-2 link-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} -
                            {{ Auth::user()->email }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
            </div>
        </header>

        @auth
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-center">
                    <a class="p-2 link-secondary" href="{{ route('volume.index') }}">Penjadwalan</a>
                    <a class="p-2 link-secondary" href="{{ route('volume.create') }}">Input</a>
                    <a class="p-2 link-secondary" href="{{ route('volume.show') }}">Data Sampah</a>
                </nav>
            </div>
        @endauth
    </div>

    <main class="container">
        @yield('content')
    </main>

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a
                href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>

</html>
