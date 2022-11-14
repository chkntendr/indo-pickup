<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
    @if (Session::has('auth')) {
        <header id="header" class="header fixed-top d-flex align-items-center">
            @include('includes.header')
        </header>
        <aside id="sidebar" class="sidebar">
                @include('includes.sidebar')
        </aside>
    }
    @endif
    <main id="main" class="main">
        @yield('content')
    </main>
</body>
</html>
    @include('includes.footer')
