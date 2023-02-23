<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gluttonous - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

    <body style="background-color: linen;">


    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 4px double lightslategray;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('public.homepage') }}">Gluttonous</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.all.recipes') }}">All Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Placeholder</a>
                    </li>
                    <li>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @auth()
                        <li class="nav-item">
                            <a href="{{ route('user.profile') }}" class="nav-link" aria-current="page" href="#">
                                {{ auth()->user()->name }} Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            @if(auth()->user()->role == 'admin')
                                <a href="{{ route('admin.recipes') }}" class="nav-link" aria-current="page">ADMIN CONTROLS</a>
                            @endif
                        </li>
                    @endauth

                    @auth()
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link" aria-current="page">Logout</button>
                            </form>
                        </li>
                    @endauth

                    @guest()
                        <li class="nav-item">
                            <a href="{{ route('user.registration') }}" class="nav-link" aria-current="page" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link" aria-current="page" href="#">Login</a>
                        </li>
                    @endguest

                </ul>

            </div>
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>

    <footer class="container">
        <h5>Project built by: Andrius B.</h5>
        &copy 2023 Gluttonous
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
