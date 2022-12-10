@extends('layouts.app')

@section('title', 'Report')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Buat Invoice</h5>
                    <form>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <select type="text" class="form-control form-control-sm" id="reportClient">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">#</h5>
                    <form>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputText">
                            </div>
                        </div>                        
                        <div>
                            <button type="submit" class="btn btn-primary">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">#</h5>
                    <form>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="inputText">
                            </div>
                        </div>                        
                        <div>
                            <button type="submit" class="btn btn-primary">Buat</button>
                        </div>
                    </form>
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
                                    <table class="table datatable dataTable-table" id="reportDokumen" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Client</th>
                                                <th>Tanggal Doc</th>
                                                <th>Jumlah</th>
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
                                    <table class="table datatable dataTable-table" id="reportKargo" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Client</th>
                                                <th>Tanggal Pickup</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
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
</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
        var table = $('#reportDokumen').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getDokumen') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'client', name: 'client' },
                { data: 'tanggal', name: 'client' },
                { data: 'jumlah', name: 'jumlah' },
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
        var table = $('#reportKargo').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getKargo') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'client', name: 'client' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'description', name: 'keterangan' },
                {
                    data: 'action',
                    name: 'action',
                    orederable: true,
                    searchable: true
                },
            ]
        })
    })
</script>