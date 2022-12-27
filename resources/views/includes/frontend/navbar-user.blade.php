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
                    <a href="{{ route('dashboard.profile') }}" class="nav-link @yield('profilePage')"
                        >Profile</a
                    >
                </li>
            </ul>

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
        </div>
    </nav>
</div>
