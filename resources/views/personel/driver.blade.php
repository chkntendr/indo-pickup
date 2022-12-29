@extends('layouts.app')

@section('title', 'Driver')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Drivers</h5>
                    <div class="dataTable-container">
                        <table class="table datatable datatable-table" id="driverTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th style="width: 3%">Opsi</th>
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
                    <h5 class="card-title">Driver Baru</h5>
                    <div class="dataTable-container">
                        <form>
                            <div class="form-group">
                                <label for="driverInput">Nama</label>
                                <input type="text" id="driverInput" class="form-control form-control-sm">
                            </div>
                        </form>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm" onclick="driverSave()">
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