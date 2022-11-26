@extends('layouts.app')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@section('title', 'Barang')
@section('content')
<div class="content">
<!-- Data Barang -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Barang</h5>
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table class="table datatable dataTable-table" id="barangTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barang</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="createPickup" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tipe Baru</h5>
                <button type="button" id="close-modal" class="btn-close" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="tipe" class="control-label">Tipe Barang</label>
                    <input type="text" class="form-control" id="tipe">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tipe"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" id="close-modal">Tutup</button>
                <button class="btn btn-primary" id="barangStore">Simpan</button>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
        var table = $('#barangTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dataBarang') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'barang', name: 'barang' },
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