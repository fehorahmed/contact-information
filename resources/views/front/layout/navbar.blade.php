<div class="container">

    <!-- logo -->
    <a href="{{ route('home') }}" class="navbar-brand me-lg-5">
        @if ($setting && $setting->logo)
            <img src="{{ asset($setting->logo ?? '') }}" alt="" class="logo-dark" height="50">
        @else
            <img src="assets/images/logo.png" alt="" class="logo-dark" height="18">
        @endif
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <i class="mdi mdi-menu"></i>
    </button>

    <!-- menus -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <!-- left menu -->
        <ul class="navbar-nav me-auto align-items-center">
            <li class="nav-item mx-lg-1">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            </li>

            <li class="nav-item mx-lg-1">
                <a class="nav-link" href="">Contact</a>
            </li>
        </ul>

        <!-- right menu -->
        <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item me-0">
                <a href="{{ route('register') }}" class="nav-link d-lg-none">Registration</a>
                <a href="{{ route('register') }}"
                    class="btn btn-sm btn-info btn-rounded d-none d-lg-inline-flex">Registration
                </a>
            </li>
            <li class="nav-item me-0">
                <a href="{{ route('login') }}" class="nav-link d-lg-none">Login</a>
                <a href="{{ route('login') }}"
                    class="btn btn-sm btn-secondary btn-rounded d-none d-lg-inline-flex">Login
                </a>
            </li>
        </ul>

    </div>
</div>
