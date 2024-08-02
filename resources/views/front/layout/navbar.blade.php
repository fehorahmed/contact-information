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
            @if (Auth::check())
                <li class="nav-item mx-lg-1">
                    <a class="nav-link {{ request()->routeIs('address.search') ? 'active' : '' }}"
                        href="{{ route('address.search') }}">Address Search</a>
                </li>
            @endif
        </ul>
        @if (Route::has('login'))
            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    @if (auth()->user()->role == 1)
                        <li class="nav-item me-0">
                            <a href="{{ route('user.profile') }}" class="nav-link d-lg-none">Profile</a>
                            <a href="{{ route('user.profile') }}"
                                class="btn btn-sm btn-info btn-rounded d-none d-lg-inline-flex">Profile
                            </a>
                        </li>
                    @else
                        <li class="nav-item me-0">
                            <a href="{{ route('dashboard') }}" class="nav-link d-lg-none">Dashboard</a>
                            <a href="{{ route('dashboard') }}"
                                class="btn btn-sm btn-info btn-rounded d-none d-lg-inline-flex">Dashboard
                            </a>
                        </li>
                    @endif

                    <li class="nav-item me-0">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="nav-link d-lg-none"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </a>
                            <a href="{{ route('logout') }}"
                                class="btn btn-sm btn-danger btn-rounded d-none d-lg-inline-flex"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </a>
                        </form>
                    </li>
                @else
                    @if (Route::has('register'))
                        <li class="nav-item me-0">
                            <a href="{{ route('register') }}" class="nav-link d-lg-none">Registration</a>
                            <a href="{{ route('register') }}"
                                class="btn btn-sm btn-info btn-rounded d-none d-lg-inline-flex">Registration
                            </a>
                        </li>
                    @endif
                    <li class="nav-item me-0">
                        <a href="{{ route('login') }}" class="nav-link d-lg-none">Login</a>
                        <a href="{{ route('login') }}"
                            class="btn btn-sm btn-secondary btn-rounded d-none d-lg-inline-flex">Login
                        </a>
                    </li>

                @endauth
            </ul>
        @endif
        <!-- right menu -->




    </div>
</div>
