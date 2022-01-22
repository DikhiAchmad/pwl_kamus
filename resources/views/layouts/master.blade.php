<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/bundle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom-background">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ asset('/') }}">KBBI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('carikata') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('carikata') }}">Pencarian
                            Kata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('cariperibahasa') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('cariperibahasa') }}">Cari
                            Peribahasa</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/data/user') ? 'active' : '' }}"
                                href="{{ route('user.index') }}">Data Admin</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <p class="text-center">Copyright @ Dikhi Achmad Dani.</p>
    </footer>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/bundle.js') }}"></script>
</body>

</html>
