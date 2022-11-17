@extends('layouts.app')

@section('title', 'Clients')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clients</h5>
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table class="table datatable dataTable-table">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="">
                                            <a href="#">#</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Kode Klien</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Klien</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Dibuat pada</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Opsi</a>
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
                                            <td>{{ $d->kode_client }}</td>
                                            <td>{{ $d->client }}</td>
                                            <td>{{ $d->created_at }}</td>
                                            <td>
                                                <a id="btn-edit-user" data-id="{{ $d->id }}" type="button" style="color: orange"><i class="bi bi-pencil-square"></i></a>
                                                <a id="btn-delete-client" data-id="{{ $d->id }}" type="button" style="color: red"><i class="bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="8">Tidak ada barang!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="dataTable-bottom">
                            <div class="dataTable-info">Showing {{ $data->count() }} to {{ $data->count() }} of {{ $data->total() }} entries</div>
                            {{ $data->links('includes.pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <button id="btn-create-client" class="btn btn-sm btn-primary">
                <i class="bi bi-plus"></i>
                Tambah Klien
            </button>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="create-client" tabindex="-1" aria-labelledby="create-client" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-user-title">Tambah Pengguna</h5>
                    <button id="close-modal-user" class="btn-close" data-dismiss="modal" aria-label="close"></button>
                </div>

                <form action="{{ route('clientPost') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="control-label">Kode Klien</label>
                            <input type="text" name="kode_client" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="client" class="control-label">Nama Klien</label>
                            <input type="text" name="client" id="client" class="form-control">
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-secondary" id="close-modal-client">Tutup</button>
                        <button class="btn btn-sm btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection