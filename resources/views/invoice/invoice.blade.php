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
        <div class="row" id="edit_invoice" style="display: none;">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Manifest</h5>
                        <form class="row g-3">
                            <input type="text" hidden id="idManifest">
                            <div class="col-md-6">
                                <label for="manifest_tujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="manifest_tujuan">
                            </div>
                            <div class="col-md-6">
                                <label for="manifest_resi" class="form-label">Barcode</label>
                                <input type="text" class="form-control" id="manifest_resi">
                            </div>
                            <div class="col-md-6">
                                <label for="manifest_koli" class="form-label">Koli</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="manifest_koli">
                                    <span class="input-group-text" id="inputGroupPrepend">QTY</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="manifest_berat" class="form-label">Berat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control harga" id="manifest_berat">
                                    <span class="input-group-text" id="inputGroupPrepend">KG</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="manifest_harga" class="form-label">Harga</label>
                                <div class="input-group">
                                    <input type="text" class="form-control harga" id="manifest_harga">
                                    <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="manifest_packing" class="form-label">Packing</label>
                                <div class="input-group">
                                    <input type="text" class="form-control harga" id="manifest_packing">
                                    <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="manifest_total" class="form-label">Total</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="manifest_total">
                                    <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="manifest_keterangan" class="form-label">Keterangan</label>
                                <textarea id="manifest_keterangan" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div>
                                <button id="simpan_manifest_baru" class="btn btn-sm btn-success">
                                    <i class="ri-save-3-line"></i>
                                    Simpan
                                </button>
                                <button class="btn btn-sm btn-secondary" id="backToDetail">
                                    <i class="ri-arrow-go-back-line"></i>
                                    Kembali
                                </button>
                            </div>
                        </form>
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
<script>
    $('document').ready(function() {
        $('.harga').keyup(function() {
            var berat = parseInt($('#manifest_berat').val())
            var harga = parseInt($('#manifest_harga').val());
            var packing = parseInt($('#manifest_packing').val());

            var total = (berat * harga) + packing

            $('#manifest_total').val(total)
        })
    })
</script>
