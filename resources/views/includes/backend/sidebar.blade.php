{{-- Sidebar --}}
<div class="col-12 col-lg-3 col-navbar d-none d-xl-block">

    <aside class="sidebar">
        <a href="#" class="sidebar-logo">
            <div class="d-flex justify-content-start align-items-center">
                <img src="{{ asset('backend/images/icons/logo.svg') }}" alt="icon">
                <span>Admin Panel</span>
            </div>

            <button id="toggle-navbar" onclick="toggleNavbar()">
                <img src="{{ asset('backend/images/icons/navbar-times.svg') }}" alt="icon">
            </button>
        </a>

        <h5 class="sidebar-title">General</h5>

        <a href="#" class="sidebar-item @yield('dashboardPage')">
            <img src="{{ asset('backend/images/icons/home.svg') }}" alt="icon" width="18" height="18" class="me-3">
            <span>Dashboard</span>
        </a>

        <h5 class="sidebar-title">Settings</h5>

        <a href="#" class="sidebar-item">
            <img src="{{ asset('backend/images/icons/log-out.svg') }}" alt="icon" width="18" height="18" class="me-3">
            <form action="" method="POST">
                @csrf

                <button type="submit" class="p-0 btn btn-sm btn-link hover-off">Logout</button>
            </form>
        </a>
    </aside>

</div>
