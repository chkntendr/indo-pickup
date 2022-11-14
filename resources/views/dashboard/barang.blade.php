@extends('layouts.app')

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
                        <div class="dataTable-top">
                            <div class="dataTable-dropdown">
                                <label>
                                    <select class="dataTable-selector">
                                        <option value="5">5</option>
                                        <option value="10" selected="">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                    </select> entries per page</label>
                                </div>
                                <div class="dataTable-search">
                                    <input class="dataTable-input" placeholder="Search..." type="text">
                                </div>
                            </div>
                        </div>
                        <div class="dataTable-container">
                            <table class="table datatable dataTable-table">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="">
                                            <a href="#" class="dataTable-sorter">ID Barang</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#" class="dataTable-sorter">Tipe</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#" class="dataTable-sorter">Opsi</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($data->count()) {
                                    ?>
                                    @foreach ($data as $key=>$d)
                                    <tr id="index_{{$d->id}}">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $d -> barang }}</td>
                                        <td>
                                            <a type="button" style="color: orange"><i class="bi bi-pencil-square"></i></a>
                                            <a type="button" id="btn-delete-barang" data-id="{{ $d->id }}" style="color: red"><i class="bi bi-trash-fill"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <?php
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="3" center>Tidak ada barang</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="dataTable-bottom">
                            <div class="dataTable-info">Showing 1 to 5 of {{ $key }} entries</div>
                            <nav class="dataTable-pagination">
                                <ul class="dataTable-pagination-list"></ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <a id="btn-open-create" class="btn btn-sm btn-primary m-2">
                <i class="bi bi-plus"></i>
                Tambah Barang
            </a>
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