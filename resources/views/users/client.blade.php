@extends('layouts.app')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@section('title', 'Clients')
@section('content')
<section class="section">
    <div class="row">
        
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clients</h5>
                    <div class="dataTable-container">
                        <table class="table datatable datatable-table" id="clientTable" style="width: 100%; text-overflow: ellipsis; white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Client</th>
                                    <th>Client</th>
                                    <th>Dibuat</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Client Baru</h5>
                    <div class="dataTable-container">
                        <form>
                            <div class="form-group">
                                <label for="kode_client">Kode Client</label>
                                <input type="text" id="kode_client" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="clientInput">Nama Client</label>
                                <input type="text" id="clientInput" class="form-control form-control-sm">
                            </div>
                        </form>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm" onclick="clientSave()">
                                <i class="ri-save-3-line"></i>
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>