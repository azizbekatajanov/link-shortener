<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/cover.css')}}">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">Shortner Link</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
               @auth
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Log out</a></li>
                    </ul>
                @endauth

                @guest
                    <a class="nav-link" href="{{route('loginForm')}}">Log In</a>
                    <a class="nav-link" href="{{route('signupget')}}">Sign Up</a>
                @endguest

            </nav>
        </div>
    </header>

    <main class="px-3">
        @yield('content')
    </main>

    <footer class="mt-auto text-white-50">
        <p>2021</p>
    </footer>
</div>


<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
