<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ route('home-page') }}" class="navbar-brand">
            <img src="{{ asset('frontend/images/Logo.png') }}" alt="Logo TravelKu" />
        </a>
        <button
            class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#navb"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{ route('home-page') }}" class="nav-link @yield('homePage')"
                        >Home</a
                    >
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{ route('package-page') }}" class="nav-link @yield('packagePage')"
                        >Paket Travel</a
                    >
                </li>
                <li
                    class="nav-item dropdown"
                    id="navbardrop"
                    data-toggle="dropdown"
                >
                    <a href="#" class="nav-link dropdown-toggle"
                        >Services</a
                    >
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Link</a>
                        <a href="#" class="dropdown-item">Link</a>
                        <a href="#" class="dropdown-item">Link</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#testimonialHeading" class="nav-link"
                        >Testimonial</a
                    >
                </li>
                @auth
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('dashboard.profile') }}" class="nav-link">
                            {{ Auth::user()->username }}
                        </a>
                    </li>
                @endauth
            </ul>

            @auth
                <!-- Mobile Button -->
                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="form inline d-sm-block d-md-none"
                >
                    @csrf
                    <button type="submit" class="btn btn-login my-2 my-sm-0">
                        Logout
                    </button>
                </form>

                <!-- Desktop Button -->
                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="form inline my-2 my-lg-0 d-none d-md-block"
                >
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"
                    >
                        Logout
                    </button>
                </form>
            @else
                <!-- Mobile Button -->
                <div class="form inline d-sm-block d-md-none">
                    <a href="{{ route('auth.login-page') }}" class="btn btn-login my-2 my-sm-0">
                        Masuk
                    </a>
                </div>

                <!-- Desktop Button -->
                <div class="form inline my-2 my-lg-0 d-none d-md-block">
                    <a
                        href="{{ route('auth.login-page') }}"
                        class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"
                    >
                        Masuk
                    </a>
                </div>
            @endauth
        </div>
    </nav>
</div>
