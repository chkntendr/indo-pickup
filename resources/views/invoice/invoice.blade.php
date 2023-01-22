@extends('layouts.app')

@section('title', 'Report')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-sm-4 col-sm-2">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Outstanding Invoice <span>| All Clients</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h5 id="totalSum"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-sm-2">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Invoice Made <span>| All Clients</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h5 id="madeSum"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row" id="invoice_detail">
            <div class="col-lg" id="manifest_table_col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Invoice</h5>
                        <div id="table_data">
                            <div class="dataTable-container">
                                <table class="table datatable dataTable-table" id="invoiceTable" style="width: 100%; text-overflow: ellipsis; white-space: nowrap;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Manifest ID</th>
                                            <th>Tipe</th>
                                            <th>Client</th>
                                            <th>Tanggal Invoice</th>
                                            <th>Total</th>
                                            <th>Proses</th>
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
    </section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
