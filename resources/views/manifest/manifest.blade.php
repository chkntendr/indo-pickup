@extends('layouts.app')

@section('title', 'Report')
@section('content')
    <section class="section dashboard">
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