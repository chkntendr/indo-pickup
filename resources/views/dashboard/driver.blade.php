@extends('layouts.app')

@section('title', 'Driver')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Driver</h5>
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
                            <table class="table dataTable dataTable-table">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="">
                                            <a href="#" class="dataTable-sorter">#</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#" class="dataTable-sorter">Nama</a>
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
                                    <tr id="tr_{{ $d->id }}">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $d -> name }}</td>
                                        <td>
                                            <a style="color: orange"><i class="bi bi-pencil-square"></i></a>
                                            <a style="color: red"><i class="bi bi-trash-fill"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <?php
                                        } else {
                                    ?>
                                    <tr>
                                        <td colspan="3" center>Tidak ada driver</td>
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
            <a id="btn-create-driver" class="btn btn-sm btn-primary m-2">
                <i class="bi bi-plus"></i>
                Tambah Barang
            </a>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="createDriver" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Driver Baru</h5>
                    <button type="button" id="close-modal" class="btn-close" aria-label="Close"></button>
                </div>
    
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="control-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" id="close-modal">Tutup</button>
                    <button class="btn btn-primary" id="driverStore">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
