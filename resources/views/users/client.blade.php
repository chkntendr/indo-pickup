@extends('layouts.app')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@section('title', 'Clients')
@section('content')
<section class="section">
    <div class="row">
        
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clients</h5>
                    <div class="dataTable-container">
                        <table class="table datatable datatable-table" id="clientTable" style="width: 100%">
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

        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Client Baru</h5>
                    <div class="dataTable-container">
                        <table class="table datatable datatable-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Kode Client</th>
                                    <th>Client</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" id="kode_client" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="clientInput" class="form-control form-control-sm"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm" onclick="clientSave()">
                                <i class="bi bi-save"></i>
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="create-client" tabindex="-1" aria-labelledby="create-client" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-user-title">Tambah Pengguna</h5>
                    <button id="close-modal-user" class="btn-close" data-dismiss="modal" aria-label="close"></button>
                </div>

                <form action="{{ route('clientPost') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="control-label">Kode Klien</label>
                            <input type="text" name="kode_client" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="client" class="control-label">Nama Klien</label>
                            <input type="text" name="client" id="client" class="form-control">
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-secondary" id="close-modal-client">Tutup</button>
                        <button class="btn btn-sm btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>