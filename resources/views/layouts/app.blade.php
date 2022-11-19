<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body onload="getDataPickup()">
    @if (Session::has('auth'))
        <header id="header" class="header fixed-top d-flex align-items-center">
            @include('includes.header')
        </header>
        <aside id="sidebar" class="sidebar">
                @include('includes.sidebar')
        </aside>
        <main id="main" class="main">
            @yield('content')
        </main>
    @else
    
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            @yield('content')
        </section>
    @endif
</body>
</html>
    @include('includes.footer')
