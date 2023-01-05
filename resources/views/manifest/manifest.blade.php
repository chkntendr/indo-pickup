@extends('layouts.app')

@section('title', 'Report')
@section('content')
    <section class="section">
        <div class="row" id="manifest_edit_invoice" style="display: none;">
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
                                    <input type="text" class="form-control" id="manifest_berat">
                                    <span class="input-group-text" id="inputGroupPrepend">KG</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="manifest_harga" class="form-label">Harga</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="manifest_harga">
                                    <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="manifest_packing" class="form-label">Packing</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="manifest_packing">
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
        <div class="row" id="manifest_detail" style="display: none">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 id="card-title" class="card-title">Detail Manifest | <span></span></h5>
                        <div class="dataTable-container">
                            <table class="table datatable dataTable-table" id="detailManifestTable" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
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
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" id="backButtonManifest">
                            <i class="ri-arrow-go-back-line"></i>
                            Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="manifest_tab">
            <div class="col-lg" id="manifest_table_col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manifest</h5>
                        <div id="table_data">
                            <div class="dataTable-container">
                                <table class="table datatable dataTable-table" id="manifestTable" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Manifest ID</th>
                                            <th>Total</th>
                                            <th>Opsi</th>
                                            <th>Proses</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-sm" onclick="createManifest()">
                    <i class="ri-add-circle-line"></i>
                    Manifest baru
                </button>
            </div>

            <div class="col-lg-5" style="display: none;" id="add_barcode_tab">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Upload Manifest</h5>
                        <form enctype="multipart/form-data" id="upload-manifest-to-invoice">
                            <div class="form-group">
                                <label for="manifest-id">ID Manifest</label>
                                <input type="text" readonly class="form-control form-control-sm" id="manifest-id">
                            </div>
                            <div class="form-group">
                                <input type="text" readonly id="mnf-id" hidden>
                                <input type="text" id="id_manifest_upload" hidden>
                                <label for="file">Pilih File</label>
                                <input class="form-control" type="file" name="file" id="file"
                                    placeholder="Masukan File...">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm my-2">
                                <i class="ri-upload-cloud-2-line"></i>
                                Upload
                            </button>
                        </form>
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
    $('document').ready(function () {
        $('input').keyup(function () {
        var harga = parseInt($('#manifest_harga').val());
        var packing = parseInt($('#manifest_packing').val());

        var total = harga + packing

        $('#manifest_total').val(total)
        })
    })
</script>