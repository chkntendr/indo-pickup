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
                                <a id="btn-create-driver" class="btn btn-sm btn-primary m-2">
                                    <i class="bi bi-plus"></i>
                                    Tambah Driver
                                </a>
                                
                                <div class="dataTable-search">
                                    <form action="{{ route('searchDriver') }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input class="form-control dataTable-input" placeholder="Cari driver" type="text" name="search">
                                            <button class="input-group-text" id="inputGroupPrepend">Cari</button>                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="dataTable-container">
                            <table class="table dataTable dataTable-table">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="">
                                            <a href="#">#</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Nama</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Opsi</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($search->count()) {
                                    ?>
                                    @foreach ($search as $key=>$s)
                                    <tr id="tr_{{ $s->id }}">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $s -> name }}</td>
                                        <td>
                                            <a id="btn-edit-driver" data-id="{{ $s->id }}" type="button" style="color: orange"><i class="bi bi-pencil-square"></i></a>
                                            <a id="btn-delete-driver" onclick="deleteDriver()" data-id="{{ $s->id }}" type="button" style="color: red"><i class="bi bi-trash-fill"></i></a>
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
