@extends('layouts.app')

@section('content')
<div class="content">
@extends('layouts.navbar')
<!-- Rekap -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-envelope fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Pickup</p>
                    <h6 class="mb-0"><?php ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-weight fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Berat</p>
                    <h6 class="mb-0">65 KG</h6>
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
                            <td>{{ $p -> client_id}}</td>
                            <td>{{ $p -> jumlah }}</td>
                            <td>{{ $p -> berat }}</td>
                            <td>{{ $p -> tanggal }}</td>
                            <td>{{ $p -> driver_id }}</td>
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