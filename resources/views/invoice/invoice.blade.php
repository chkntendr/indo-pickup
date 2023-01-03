@extends('layouts.app')

@section('title', 'Report')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg">
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg" id="manifest_table_col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Invoice</h5>
                    <div id="table_data">
                        <div class="dataTable-container">
                            <table class="table datatable dataTable-table" id="invoiceTable" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Manifest</th>
                                        <th>Tanggal</th>
                                        <th>Tujuan</th>
                                        <th>Resi</th>
                                        <th>Koli</th>
                                        <th>Kg</th>
                                        <th>Harga</th>
                                        <th>Packing</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
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
    <div class="row">
        <div class="col-lg" id="edit-barcode-detail" style="display: none">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Edit Data <div id="barcodeSpan"></div></div>
                    <form class="row g-3">
                        <div class="col-md">
                            <label for="date">Tanggal</label>
                            <input type="date" class="form-control form-control-sm" id="editDateInvoice">
                        </div>
                        <div class="col-md">
                            <label for="destination">Tujuan</label>
                            <input type="text" class="form-control form-control-sm" id="editDestinationInvoice">
                        </div>
                        <div class="col-md">
                            <label for="qty">Koli</label>
                            <input type="text" class="form-control form-control-sm" id="editQtyInvoice">
                        </div>
                        <div class="col-md">
                            <label for="weight">Berat</label>
                            <input type="text" class="form-control form-control-sm" id="editWeightInvoice">
                        </div>
                        <div class="col-md">
                            <label for="price">Harga</label>
                            <input type="text" class="form-control form-control-sm" id="editPriveInvoice">
                        </div>
                        <div class="col-md">
                            <label for="packing">Packing</label>
                            <input type="text" class="form-control form-control-sm" id="editPackingInvoice">
                        </div>
                        <div class="col-md">
                            <label for="total">Total</label>
                            <input type="text" class="form-control form-control-sm" id="editTotalInvoice" readonly>
                        </div>
                        <div class="col-md">
                            <label for="description">Keterangan</label>
                            <input type="text" class="form-control form-control-sm" id="editDescriptionInvoice">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" id="backButtonInvoice">
                        <i class="ri-arrow-go-back-line"></i>
                        Back
                    </button>
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