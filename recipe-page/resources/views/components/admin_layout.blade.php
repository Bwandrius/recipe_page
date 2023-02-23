<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gluttonous - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ url('/') }}">Gluttonous</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.recipes') }}">Recipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.ingredients') }}">Ingredients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Placeholder 4</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">

                @auth()
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="nav-link" aria-current="page" href="#">
                            {{ auth()->user()->name }} Profile
                        </a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous">
</script>
</body>

</html>
