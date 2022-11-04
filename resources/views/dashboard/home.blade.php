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
<!-- Rekap -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-envelope fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Pickup</p>
                    <h6 class="mb-0">{{ $count }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-weight fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Berat</p>
                    <h6 class="mb-0">{{ $berat }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Berat</p>
                    <h6 class="mb-0">65 KG</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rekap -->

<!-- Data Pickup -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Data Pickup Dokumen dan Kargo</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tipe</th>
                            <th scope="col">Client</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pickup as $p)
                        <tr>
                            <td>{{ $p -> tipe_id }}</td>
                            <td>{{ $p -> client}}</td>
                            <td>{{ $p -> jumlah }}</td>
                            <td>{{ $p -> berat }}</td>
                            <td>{{ $p -> tanggal }}</td>
                            <td>{{ $p -> driver_id }}</td>
                            <td>
                                <a type="button" style="color: orange"><i class="fas fa-edit"></i></a>
                                <a type="button" style="color: red"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-sm btn-primary m-2">
                    <i class="fas fa-plus"></i>
                    Tambah Pickup
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Data Pickup -->
</div>
@endsection