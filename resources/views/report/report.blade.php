@extends('layouts.app')

@section('title', 'Report')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Laporan Pickup</h5>
                    <div class="dataTable-container">
                        <table class="table datatable dataTable-table" id="reportTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Client</th>
                                    <th>Jumlah</th>
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
</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
        var table = $('#reportTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getReport') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'client', name: 'client' },
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
</script>