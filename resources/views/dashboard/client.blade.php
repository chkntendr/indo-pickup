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
<!-- Data Client -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Data Client</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Client</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            if ($count > 0) {
                        ?>
                        @foreach($data as $d)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $d -> kode_client }}</td>
                            <td>{{ $d -> client }}</td>
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
                            <td colspan="3" center>Tidak ada client</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a id="btn-create-client" class="btn btn-sm btn-primary m-2">
                    <i class="fas fa-plus"></i>
                    Tambah Client
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Data Client -->

{{-- Insert Modal --}}
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="createPickup" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client Baru</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="kode" class="control-label">Kode Client</label>
                    <input type="text" class="form-control" id="kode">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kode"></div>
                </div>

                <div class="form-group">
                    <label for="nama" class="control-label">Nama Client</label>
                    <input type="text" class="form-control" id="nama">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" id="clientStore">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- End of Insert Modal --}}
</div>
@endsection
