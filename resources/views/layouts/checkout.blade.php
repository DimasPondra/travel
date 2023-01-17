<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>

        @stack('before-style')
        @include('includes.frontend.style')
        @stack('after-style')
    </head>

    <body>
        <!-- Navbar -->
        @include('includes.frontend.navbar-without-menu')

        @yield('content')

        @include('includes.frontend.footer')

        @stack('before-script')
        @include('includes.frontend.script')
        @stack('after-script')
    </body>
</html>
