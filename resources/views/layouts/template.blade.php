<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
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
                            @if (Auth::user()->is_admin == false && Auth::user()->is_crosschecker == false && Auth::user()->is_employee == false)
                                {{ Auth::user()->name }} - RW {{Auth::user()->rw}} - RT {{Auth::user()->rt}}
                            @else
                            {{ Auth::user()->name }} -
                            {{ Auth::user()->email }}
                            @endif
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
                    {{-- <a class="p-2 link-secondary" href="{{ route('schedule.index') }}">Jadwal Angkut Hari ini</a>
                    @if ( Auth::user()->is_admin == true )

                    @endif
                    <a class="p-2 link-secondary" href="{{ route('educational-list') }}">Educational</a>
                    @if ( Auth::user()->is_admin == true )
                        <a class="p-2 link-secondary" href="{{ route('educational.index') }}">Edit Educational</a>
                    @endif
                    @if ( Auth::user()->is_admin == false )
                        <a class="p-2 link-secondary" href="{{ route('volume.create') }}">Buang Sampah</a>
                        <a class="p-2 link-secondary" href="{{ route('volume.show') }}">Riwayat Sampah</a>
                    @endif --}}
                    @if ( Auth::user()->is_admin == true )
                        <a class="p-2 link-secondary" href="{{ route('schedule.index') }}">Jadwal Angkut Hari ini</a>
                        <a class="p-2 link-secondary" href="{{ route('volume.index') }}">Data Sampah Hari Ini</a>
                        <a class="p-2 link-secondary" href="{{ route('educational-list') }}">Educational</a>
                        <a class="p-2 link-secondary" href="{{ route('educational.index') }}">Edit Educational</a>
                        <a class="p-2 link-secondary" href="{{ route('report.index') }}">Laporan Sampah</a>
                    @elseif ( Auth::user()->is_employee == true )
                        <a class="p-2 link-secondary" href="{{ route('schedule.index') }}">Jadwal Angkut Hari ini</a>
                    @elseif ( Auth::user()->is_crosschecker == true)
                        <a class="p-2 link-secondary" href="{{ route('schedule.index') }}">Jadwal Angkut Hari ini</a>
                        <a class="p-2 link-secondary" href="{{ route('volume.index') }}">Data Sampah Hari Ini</a>
                    @else
                        <a class="p-2 link-secondary" href="{{ route('schedule.index') }}">Jadwal Angkut Hari ini</a>
                        <a class="p-2 link-secondary" href="{{ route('volume.index') }}">Data Sampah Hari Ini</a>
                        <a class="p-2 link-secondary" href="{{ route('educational-list') }}">Educational</a>
                        <a class="p-2 link-secondary" href="{{ route('volume.create') }}">Buang Sampah</a>
                        <a class="p-2 link-secondary" href="{{ route('volume.show') }}">Riwayat Sampah</a>
                    @endif
                </nav>
            </div>
        @endauth

        @yield('nav')
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
