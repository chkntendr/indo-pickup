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

    <!-- Rekap -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-envelope fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="font-weight: bold;">Total Pickup</p>
                        <h6 class="mb-0">{{ $count }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-weight fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="font-weight: bold;">Total Berat</p>
                        <h6 class="mb-0">{{ $berat }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2" style="font-weight: bold;">Total Jumlah</p>
                        <h6 class="mb-0">{{ $jumlah }}</h6>
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
                <input type="text" class="form-control" id="cari-pickup" value="">
                <button type="button" onclick="getInputValue()" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    Cari
                </button>
                <div class="table-responsive">
                    <table class="table" id="table-pickups">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
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
                        <?php
                            $no = 1;
                            if ($count > 0) {
                        ?>
                            @foreach ($pickup as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p -> tipe -> barang }}</td>
                                <td>{{ $p -> client -> client }}</td>
                                @if ($p->tipe_id == "7")
                                    <td>{{ $p -> jumlah }} Koli</td>
                                @else
                                    <td>{{ $p -> jumlah }} pcs</td>
                                @endif
                                <td>{{ $p -> berat }} Kg</td>
                                <td>{{ $p -> tanggal }}</td>
                                <td>{{ $p -> driver -> name }}</td>
                                <td>
                                    <a type="button" style="color: orange"><i class="fas fa-edit"></i></a>
                                    <a id="btn-delete-pickup" data-id="{{ $p->id }}" type="button" style="color: red"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <?php } else { ?>
                                <tr>
                                    <td colspan="8">Tidak ada barang!</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button id="btn-create-pickup" class="btn btn-sm btn-primary m-2">
                        <i class="fas fa-plus"></i>
                        Tambah Pickup
                    </button>
                    <a href="/home/export" id="btn-export-csv" class="btn btn-sm btn-secondary">
                        <i class="fas fa-file-export"></i>
                        Export Excel
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Pickup -->

    {{-- Insert Modal --}}
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="createPickup" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pickup Baru</h5>
                    <button id="close-modal" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tipe" class="control-label">Tipe</label>
                        <select name="tipe" id="tipe" class="form-control">
                            <option value="0">- Pilih Tipe -</option>
                            @foreach ($tipe as $t)
                            <option value="{{ $t->id }}">{{ $t->barang }}</option>
                            @endforeach
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tipe"></div>
                    </div>
    
                    <div class="form-group">
                        <label for="client" class="control-label">Client</label>
                        <select name="client" class="form-control" id="client">
                            <option value="0">- Pilih Client -</option>
                            @foreach ($client as $c)
                            <option value="{{ $c->id }}">{{ $c->client }} - {{ $c->kode_client }}</option>
                            @endforeach
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-client"></div>
                    </div>
    
                    <div class="form-group">
                        <label for="jumlah" class="control-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jumlah"></div>
                    </div>
    
                    <div class="form-group">
                        <label for="berat" class="control-label">Berat</label>
                        <input type="text" class="form-control" id="berat">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-berat"></div>
                    </div>
    
                    <div class="form-group">
                        <label for="tanggal" class="control-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal"></div>
                    </div>
    
                    <div class="form-group">
                        <label for="driver" class="control-label">Driver</label>
                        <select name="client" class="form-control" id="driver">
                            <option value="0">- Pilih Driver -</option>
                            @foreach ($driver as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-driver"></div>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" id="close-modal">Tutup</button>
                    <button class="btn btn-primary" id="store">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection