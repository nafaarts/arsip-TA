<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title') - Arsip Tugas Akhir Politeknik Aceh</title>
    <link rel="shortcut icon" href="{{ asset('logo-kecil.png') }}" type="image/png">
    <style>
        td,
        th {
            white-space: nowrap;
            padding: 5px 1rem !important;
        }

        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0 !important;
        }

        a {
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-sticky" style="top: 0; z-index: 5">
        <div class="container py-2">
            <a class="navbar-brand py-2 d-flex align-items-center" style="gap: 10px" href="/">
                <img src="{{ asset('logo.png') }}" alt="Logo Politeknik Aceh" height="24" class="mt-0">
                <small class="fw-light m-0 border-start ps-2">Arsip Tugas Akhir</small>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3 @if (Request::is('/')) active @endif"
                            href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 @if (Request::is('tugas-akhir')) active @endif"
                            href="/tugas-akhir">Tugas
                            Akhir</a>
                    </li>
                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link px-3 @if (Request::is('users*')) active @endif"
                                href="/users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 @if (Request::is('arsip')) active @endif"
                                href="/arsip">Arsip</a>
                        </li>
                    @endcan
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link px-3 dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                <li><a class="dropdown-item"
                                        onclick="document.getElementById('logoutForm').submit()">Logout</a></li>
                                <form action="/logout" method="POST" id="logoutForm">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/login">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-3">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
