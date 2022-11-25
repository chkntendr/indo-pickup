@extends('layouts.app')

@section('title', 'Clients')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clients</h5>
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table class="table datatable datatable-table" id="yajra-datatable" style="width: 100%">
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
        </div>
        <div class="col-lg-12">
            <button id="btn-create-client" class="btn btn-sm btn-primary">
                <i class="bi bi-plus"></i>
                Tambah Klien
            </button>
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
<script>
    $(function() {
        var table = $('#yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dataClient') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'kode_client', name: 'kode_client' },
                { data: 'client', name: 'client' },
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