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
                <span class="d-none d-lg-inline-flex">
                    <?php $name = Auth::user()->name; ?>
                    {{ $name }}
                </span>
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
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-80 overflow p-4">
                <h3 class="mb-4">Data Driver</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($count > 0) {
                            ?>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $d -> name }}</td>
                                <td>
                                    <a style="color: orange"><i class="fas fa-edit"></i></a>
                                    <a style="color: red"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <?php
                                } else {
                            ?>
                            <tr>
                                <td colspan="3" center>Tidak ada driver</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6 mt-3">
            <div class="rounded h-20 p-3">
                <button id="btn-create-driver" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Driver
                </button>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="createDriver" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Driver Baru</h5>
                    <button type="button" id="close-modal" class="btn-close" aria-label="Close"></button>
                </div>
    
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="control-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" id="close-modal">Tutup</button>
                    <button class="btn btn-primary" id="driverStore">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
