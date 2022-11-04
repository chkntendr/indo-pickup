@extends('layouts.app')

@section('content')
@extends('layouts.sidebar')
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
<!-- Data Pickup -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Data Barang</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tipe Barang</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($count > 0) {
                        ?>
                        @foreach ($data as $d)
                        <tr id="index_{{$d->id}}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $d -> barang }}</td>
                            <td>
                                <a type="button" style="color: orange"><i class="fas fa-edit"></i></a>
                                <a type="button" id="btn-delete-barang" data-id="{{ $d->id }}" style="color: red"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <?php
                        } else {
                        ?>
                        <tr>
                            <td colspan="3" center>Tidak ada barang</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="/barang/add" class="btn btn-sm btn-primary m-2">
                    <i class="fas fa-plus"></i>
                    Tambah Barang
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Data Pickup -->
</div>
@endsection
