@extends('layouts.app')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@section('title', 'Dashboard')
@section('content')
<section class="section">
    <div class="my-2">
        <button onclick="inputForm()" class="btn btn-sm btn-primary">
            <i class="bi bi-plus"></i>
            Baru
        </button>
        <button id="open-upload-modal" class="btn btn-sm btn-success">
            <i class="bi bi-upload"></i>
            Upload
        </button>
        <a href="/home/export" id="btn-export-csv" class="btn btn-sm btn-secondary">
            <i class="bi bi-download"></i>
            Download
        </a>
    </div>
    <div class="row" style="display: none" id="inputForm">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Tambah baru</h3>
                    <div id="formTable">
                        <div class="dataTable-container">
                            <table class="table datatale dataTable-table">
                                <thead>
                                    <tr>
                                        <th>Tipe</th>
                                        <th>Driver</th>
                                        <th>Client</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="" class="form-group">
                                        <td>
                                            <select onclick="detail()" id="tipe" class="form-control form-control-sm"></select>
                                        </td>
                                        <td>
                                            <select id="driver" class="form-control form-control-sm"></select>
                                        </td>
                                        <td>
                                            <select id="client" class="form-control form-control-sm"></select>
                                        </td>
                                        <td>
                                            <input type="date" name="" id="tanggal" class="form-control form-control-sm">
                                        </td>
                                    </form>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm" onclick="simpan()">
                                    <i class="bi bi-save"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5" id="kargo" style="display: none">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail</h5>
                    <div class="dataTable-container">
                        <table class="table datatale dataTable-table">
                            <thead>
                                <tr>
                                    <th>Tujuan</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><select type="text" id="tujuan" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="description" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="jumlah" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="beratKargo" class="form-control form-control-sm"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5" id="dokumen" style="display: none">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail</h5>
                    <div class="dataTable-container">
                        <table class="table datatale dataTable-table">
                            <thead>
                                <tr>
                                    <th>SP 1</th>
                                    <th>SP 2</th>
                                    <th>SP 3</th>
                                    <th>Jumlah</th>
                                    <th>Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" id="sp1" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="sp2" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="sp3" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="jumlahDokumen" readonly class="form-control form-control-sm"></td>
                                    <td><input type="text" id="beratDokumen" class="form-control form-control-sm"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pickup</h5>
                    <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Dokumen</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">Kargo</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabContent">
                        <div class="tab-pane fade active show" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="table_data">
                                <div class="dataTable-container">
                                    <table class="table datatable dataTable-table" id="dokumenTable" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tipe</th>
                                                <th>Driver</th>
                                                <th>Client</th>
                                                <th>Tanggal</th>
                                                <th>SP 1</th>
                                                <th>SP 2</th>
                                                <th>SP 3</th>
                                                <th>Jumlah</th>
                                                <th>Berat</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div id="table_data">
                                <div class="dataTable-container">
                                    <table class="table datatable dataTable-table" id="pickupTable" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tipe</th>
                                                <th>Driver</th>
                                                <th>Client</th>
                                                <th>Tanggal</th>
                                                <th>Tujuan</th>
                                                <th>Jumlah</th>
                                                <th>Berat</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="modal fade" id="modal-upload" tabindex="-1" aria-lablledby="uploadExcel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Upload Data</h5>
                        <button type="button" id="modal-close" class="btn-close" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data" id="file">
                                @csrf
                                <label for="file" class="control-label">Cari File</label>
                                <input type="file" name="file" id="uploadForm" class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-primary mt-2">
                                    <i class="bi bi-send"></i>
                                    Send
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Pickup -->
</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('document').ready(function () {
        $('input').keyup(function () {
        var sp1 = parseInt($('#sp1').val());
        var sp2 = parseInt($('#sp2').val());
        var sp3 = parseInt($('#sp3').val());

        var jumlahDokumen = sp1 + sp2 + sp3

        $('#jumlahDokumen').val(jumlahDokumen)
        })
    })

    $(function() {
        var table = $('#pickupTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('homeKargo') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'tipe', name: 'tipe' },
                { data: 'driver', name: 'driver' },
                { data: 'client', name: 'client' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'tujuan', name: 'tujuan' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'berat', name: 'berat' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        })
    })

    $(function() {
        var table = $('#dokumenTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('homeDokumen') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'tipe', name: 'tipe' },
                { data: 'driver', name: 'driver' },
                { data: 'client', name: 'client' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'sp1', name: 'sp1' },
                { data: 'sp2', name: 'sp2' },
                { data: 'sp3', name: 'sp3' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'berat', name: 'berat' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        })
    })
</script>