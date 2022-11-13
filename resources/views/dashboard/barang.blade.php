@extends('layouts.app')

@section('content')
<div class="content">
<!-- Data Pickup -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Data Barang</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tipe Barang</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($count > 0) {
                        ?>
                        @foreach ($data as $d)
                        <tr id="index_{{$d->id}}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $d -> barang }}</td>
                            <td>
                                <a type="button" style="color: orange"><i class="fas fa-edit"></i></a>
                                <a type="button" id="btn-delete-barang" data-id="{{ $d->id }}" style="color: red"><i class="fas fa-trash"></i></a>
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
                <a id="btn-open-create" class="btn btn-sm btn-primary m-2">
                    <i class="fas fa-plus"></i>
                    Tambah Barang
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Data Pickup -->
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
