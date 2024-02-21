<!-- navbar start -->
{{--<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">--}}
{{--    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/dashboard/all"><img src="/img/smk.png" alt="" class="w-10 ml-4"></a>--}}
{{--    @auth--}}
{{--        <div class="dropdown">--}}
{{--            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                Welcome, {{ auth()->user()->name }}--}}
{{--            </button>--}}
{{--            <ul class="dropdown-menu">--}}
{{--                <li><a class="dropdown-item" href="/home">Home</a></li>--}}
{{--                <li><a class="dropdown-item" href="/about">About</a></li>--}}
{{--                <li>--}}
{{--                    <form method="post" action="/login/index/out">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="dropdown-item">Logout</button>--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endauth--}}
{{--</header>--}}

<div class="sidebar">
    <ul class="d-flex flex-column gap-2">
        <li>
            <a class="d-flex gap-2 rounded-start" href="/dashboard/index">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>
        </li>
        <li>
            <a class="d-flex gap-2 rounded-start" href="/dashboard/grade">
                <i class="fas fa-user"></i>
                <span>Kelas</span>
            </a>
        </li>
        @if(auth()->check())
            <li>
                <form method="post" action="/Login/keluar">
                    @csrf
                    <button type="submit" class="btn btn-outline-light d-flex align-items-center rounded-start">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li>
                <a class="btn btn-outline-light d-flex align-items-center rounded-start" href="/login">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    <span>Login</span>
                </a>
            </li>
        @endauth
    </ul>
</div>
        <!-- navbar end -->
