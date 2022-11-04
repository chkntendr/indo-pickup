@extends('layouts.app')

@extends('layouts.sidebar')
@section('content')
<div class="content">
<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="#" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">Test</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item">Log Out</a>
                </form>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->

{{-- Form create new client --}}
<div class="container-fluid pt-4 px-4 align-items-center">
    <div class="row">
        <div class="col-sm-6 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <form action="/barang/post" method="POST">
                    @csrf()
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe Barang</label>
                        <input type="text" name="tipe" class="form-control" id="kode" aria-describedby="text">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Tambahkan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection