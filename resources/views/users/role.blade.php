@extends('layouts.app')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@section('title', 'Roles')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Roles</h5>
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table class="table datatable datatable-table" id="roleTable" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
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
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Role Baru</h5>
                    <div class="dataTable-container">
                        <table class="table datatable datatable-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" id="role" class="form-control form-control-sm"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm" onclick="roleSave()">
                                <i class="bi bi-save"></i>
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
<script>
    $(function() {
        var table = $('#roleTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dataRole') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'role', name: 'role' },
                { data: 'created_at', name: 'tanggal' },
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