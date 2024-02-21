<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Navbar</title>
    <style>
        .custom-navbar {
            background-color: #4b5563;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/student/all" style="color: white;">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/school/all" style="color: white;">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Login/Home" style="color: white;">Home</a>
                </li>

                {{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="/school/all">Kelas</a>--}}
{{--                </li>--}}
            </ul>

            @auth
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="/dashboard/index">Dashboard</a></li>
                        <li>
                            <form method="POST" action="/Login/keluar">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

            @else
                <a href="/Login/login">
                    <button class="btn btn-outline-success" type="submit">Login</button>
                </a>
            @endauth
        </div>
    </div>
</nav>

</body>
</html>
