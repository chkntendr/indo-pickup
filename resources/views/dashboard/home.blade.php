@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<section class="section dashboard">
    <div class="row" id="detail-pickup" style="display: none">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Detail</h3>
                    <div class="dataTable-container">
                        <table class="table datatable dataTable-table" id="detail_pickup_table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Resi</th>
                                    <th>Tujuan</th>
                                    <th>Berat</th>
                                    <th>Koli</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" id="backToHome">
                        <i class="ri-arrow-go-back-line"></i>
                        Back
                    </button>
                    <button class="btn btn-sm btn-success" id="option_detail_button">
                        <i class="ri-more-2-fill"></i>
                        Options
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="display: none" id="option_detail_pickup">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Options</h3>
                    <form id="upload_detail_manifest" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" id="id_pickup" hidden>
                            <label for="file">Pilih file</label>
                            <input type="file" name="file" id="file" class="form-control form-control-sm">
                        </div>
                        <button type="submit" class="btn btn-sm btn-success my-2">
                            <i class="ri-upload-cloud-2-line"></i>
                            Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="my-2" id="actionButton">
        <button onclick="inputForm()" class="btn btn-sm btn-primary">
            <i class="ri-file-add-line"></i>
            Baru
        </button>
        <button onclick="moreTab()" class="btn btn-sm btn-warning">
            <i class="ri-more-2-fill"></i>
            Lainnya
        </button>
        <button id="create-invoice" class="btn btn-sm btn-success">
            Invoice
        </button>
    </div>
    <div class="row" style="display: none" id="moreTab">
        <div class="col-lg-7">
            <div class="card" style="height: 190px">
                <div class="card-body">
                    <h3 class="card-title">Upload</h3>
                    <div class="container">
                        <form enctype="multipart/form-data" id="upload-excel-to-database">
                            @csrf
                            <input class="form-control" type="file" name="file">
                            <button type="submit" class="btn btn-sm btn-success my-2">
                                <i class="ri-upload-cloud-2-line"></i>
                                Upload
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Export</h3>
                    <div class="container">
                        <div class="form-group">
                            <form action="" class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm" placeholder="Client" id="clientFloat">
                                        <label for="clientFloat">Client</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="" id="" class="form-control form-control-sm">
                                </div>

                                <div class="col-md-6">
                                    <input type="date" name="" id="" class="form-control form-control-sm">
                                </div>
                            </form>
                            <button class="btn btn-sm btn-primary">
                                <i class="ri-download-cloud-2-line"></i>
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="display: none" id="inputForm">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Tambah baru</h3>
                    <div id="formTable">
                        <div class="dataTable-container">
                            <table class="table datatale dataTable-table">
                                <thead>
                                    <tr>
                                        <th>Tipe</th>
                                        <th>Driver</th>
                                        <th>Client</th>
                                        <th id="tanggal_tipe">Tanggal Doc</th>
                                        <th>Tanggal Pickup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="" class="form-group">
                                        <td>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" id="dokumenCheck" value="Dokumen">
                                                    <label class="form-check-label" for="gridRadios1">
                                                      Dokumen
                                                    </label>
                                                  </div>
                                                  <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios" id="kargoCheck" value="Kargo">
                                                    <label class="form-check-label" for="gridRadios1">
                                                      Kargo
                                                    </label>
                                                  </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <select id="driver" class="form-control form-control-sm"></select>
                                        </td>
                                        <td>
                                            <select id="client" class="form-control form-control-sm"></select>
                                        </td>
                                        <td>
                                            <input type="date" id="tanggal" class="form-control form-control-sm">
                                        </td>
                                        <td>
                                            <input type="date" id="tanggal_pic" class="form-control form-control-sm">
                                        </td>
                                    </form>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button onclick="simpanPickup()" class="btn btn-success btn-sm" type="button">
                                    <i class="ri-save-3-line"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
        <div class="col-lg-4" id="kargo" style="display: none">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail</h5>
                    <div class="dataTable-container">
                        <table class="table datatale dataTable-table">
                            <thead>
                                <tr>
                                    <th>Dalam</th>
                                    <th>Luar</th>
                                    <th>Jumlah</th>
                                    <th>Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" id="dk" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="lk" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="jumlahKargo" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="beratKargo" class="form-control form-control-sm"></td>
                                </tr>
                            </tbody>
                        </table>
                        <label for="description" style="font-weight: bold;">Keterangan</label>
                        <textarea class="form-control form-control-sm" id="description" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" id="dokumen" style="display: none">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail</h5>
                    <div class="dataTable-container">
                        <table class="table datatale dataTable-table">
                            <thead>
                                <tr>
                                    <th>SP 1</th>
                                    <th>SP 2</th>
                                    <th>SP 3</th>
                                    <th>Jumlah</th>
                                    <th>Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" id="sp1" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="sp2" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="sp3" class="form-control form-control-sm"></td>
                                    <td><input type="text" id="jumlahDokumen" readonly class="form-control form-control-sm"></td>
                                    <td><input type="text" id="beratDokumen" class="form-control form-control-sm"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="data-pickup">
        <div class="col-lg">
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
                                    <table class="table datatable dataTable-table" id="dokumenTable" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="check_all_dokumen" id="check_all_dokumen"></th>
                                                <th width="5%">No</th>
                                                <th>Tipe</th>
                                                <th>Driver</th>
                                                <th>Client</th>
                                                <th>Tanggal Doc</th>
                                                <th>Tanggal Pickup</th>
                                                <th>SP 1</th>
                                                <th>SP 2</th>
                                                <th>SP 3</th>
                                                <th width="3%">Jumlah</th>
                                                <th>Berat</th>
                                                <th width="8%">Opsi</th>
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
                                    <table class="table datatable dataTable-table" id="pickupTable" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="check_all_kargo" id="check_all_kargo"></th>
                                                <th>No</th>
                                                <th>Tipe</th>
                                                <th>Driver</th>
                                                <th>Client</th>
                                                <th>Tanggal Pickup</th>
                                                <th>Dalam</th>
                                                <th>Luar</th>
                                                <th>Jumlah</th>
                                                <th>Berat</th>
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

    {{-- Modal Edit --}}
    <div class="modal fade" id="editPickup" tabindex="-1" aria-labelledby="createDriver" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" id="close-modal" class="btn-close" aria-label="Close"></button>
                </div>
    
                <div class="modal-body">
                    <input type="text" id="pickup_id" readonly hidden>
                    <input type="text" id="tipe-modal" readonly hidden>
                    <input type="text" id="client-modal" readonly hidden>
                    <input type="text" id="driver-modal" readonly hidden>
                    <div class="form-group">
                        <label for="tanggal" class="control-label">Tanggal</label>
                        <input type="date" id="tanggal-modal" class="form-control form-control-sm">
                    </div>

                    <div id="dokumenSP" style="display: none;">
                        <div class="form-group">
                            <label for="tanggal" class="control-label">SP 1</label>
                            <input type="text" id="sp1-modal" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="control-label">SP 2</label>
                            <input type="text" id="sp2-modal" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="control-label">SP 3</label>
                            <input type="text" id="sp3-modal" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div id="kargoLKDK" style="display: none;">
                        <div class="form-group">
                            <label for="description-modal" class="control-label">Keterangan</label>
                            <textarea name="" id="description-modal" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lk-modal" class="control-label">Luar Kota</label>
                            <input type="text" id="lk-modal" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="dk-modal" class="control-label">Dalam Kota</label>
                            <input type="text" id="dk-modal" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal" class="control-label">Jumlah</label>
                        <input type="text" id="jumlah-modal" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="control-label">Berat</label>
                        <input type="text" id="berat-modal" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" id="close-modal">Tutup</button>
                    <button class="btn btn-primary" id="editSave">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Pickup -->
</section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('document').ready(function () {
        $('input').keyup(function () {
        var sp1 = parseInt($('#sp1').val());
        var sp2 = parseInt($('#sp2').val());
        var sp3 = parseInt($('#sp3').val());

        var jumlahDokumen = sp1 + sp2 + sp3

        $('#jumlahDokumen').val(jumlahDokumen)
        })
    })
    
    $('document').ready(function () {
        $('input').keyup(function () {
        var lk = parseInt($('#lk').val());
        var dk = parseInt($('#dk').val());

        var jumlahKargo = lk + dk

        $('#jumlahKargo').val(jumlahKargo)
        })
    })
</script>