<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Indonusa</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ (request()->segment(1) == 'home') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Menu Utama</a>
            <a href="{{ route('barang') }}" class="nav-item nav-link {{ (request()->segment(1) == 'barang') ? 'active' : '' }}"><i class="fa fa-archive me-2"></i>Tipe Barang</a>
            <a href="{{ route('client') }}" class="nav-item nav-link {{ (request()->segment(1) == 'client') ? 'active' : '' }}"><i class="fa fa-users me-2"></i>Client</a>
            <a href="{{ route('driver') }}" class="nav-item nav-link {{ (request()->segment(1) == 'driver') ? 'active' : '' }}"><i class="fa fa-car me-2"></i>Driver</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
@extends('layouts.footer')