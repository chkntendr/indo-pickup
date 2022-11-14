@extends('layouts.app')

@section('title', 'Client')
@section('content')
<div class="content">
<!-- Data Client -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Data Client</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Client</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($data->count()) {
                        ?>
                        @foreach($data as $key=>$d)
                        <tr id="tr_{{ $d->id }}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $d -> kode_client }}</td>
                            <td>{{ $d -> client }}</td>
                            <td>
                                <a style="color: orange"><i class="fas fa-edit"></i></a>
                                <a style="color: red" type="button" id="btn-delete-client" data-id="{{ $d->id }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <?php
                            } else {
                        ?>
                        <tr>
                            <td colspan="3" center>Tidak ada client</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a id="btn-create-client" class="btn btn-sm btn-primary m-2">
                    <i class="fas fa-plus"></i>
                    Tambah Client
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Data Client -->

{{-- Insert Modal --}}
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="createPickup" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client Baru</h5>
                <button type="button" id="close-modal" class="btn-close" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="kode" class="control-label">Kode Client</label>
                    <input type="text" class="form-control" id="kode">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kode"></div>
                </div>

                <div class="form-group">
                    <label for="nama" class="control-label">Nama Client</label>
                    <input type="text" class="form-control" id="nama">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" id="clientStore">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- End of Insert Modal --}}
</div>
@endsection
