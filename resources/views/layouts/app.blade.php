<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
            @include('includes.sidebar')
            @yield('content')
    </div>
@include('includes.footer')
