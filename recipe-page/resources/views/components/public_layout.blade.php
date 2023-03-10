
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gluttonous - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
              crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 4px double lightslategray;">
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ url('/') }}">Gluttonous</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('public.recipes') }}">All Recipes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Placeholder 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Placeholder 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Placeholder 4</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
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
