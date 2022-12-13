<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        @stack('before-style')
        @include('includes.backend.style')
        @stack('after-style')

        <title>@yield('title')</title>
    </head>
    <body>
        <div class="screen-cover d-none d-xl-none"></div>

        <div class="row">
            @include('includes.backend.sidebar')

            @yield('content')
        </div>

        @stack('before-script')
        @include('includes.backend.script')
        @stack('after-script')
    </body>
</html>
