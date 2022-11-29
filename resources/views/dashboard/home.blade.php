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
        <div class="col-lg-12">
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
                                        <th>Luar Kota</th>
                                        <th>Dalam Kota</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="" class="form-group">
                                        <td>
                                            <select id="tipe" class="form-control form-control-sm"></select>
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
                                        <td>
                                            <input type="text" name="" id="luar_kota" class="form-control form-control-sm">
                                        </td>
                                        <td>
                                            <input type="text" name="" id="dalam_kota" class="form-control form-control-sm">
                                        </td>
                                        <td>
                                            <input type="text" value="" id="jumlah" readonly="readonly" class="form-control form-control-sm">
                                        </td>
                                        <td>
                                            <input type="text" name="" id="berat" class="form-control form-control-sm">
                                        </td>
                                    </form>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm" onclick="simpan()">
                                    <i class="bi bi-save"></i>
                                    Simpan
                                </button>
                                <button class="btn btn-danger btn-sm my-2" onclick="clear()">
                                    <i class="bi bi-eraser"></i>
                                    Hapus
                                </button>
                            </div>
                        </div>
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
                    <div class="dataTable-wrapper dataTable-loading no-footer searchable">
                        
                    </div>
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
                                        <th>Luar Kota</th>
                                        <th>Dalam Kota</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Action</th>
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
        var luar_kota = parseInt($('#luar_kota').val());
        var dalam_kota = parseInt($('#dalam_kota').val());

        var jumlah = luar_kota + dalam_kota

        $('#jumlah').val(jumlah)
        })
    });

    function clear() {
        $('#luar_kota').val().clear()
    }

    $(function() {
        var table = $('#pickupTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('homePickup') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'tipe', name: 'tipe' },
                { data: 'driver', name: 'driver' },
                { data: 'client', name: 'client' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'luar_kota', name: 'luar_kota' },
                { data: 'dalam_kota', name: 'dalam_kota' },
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