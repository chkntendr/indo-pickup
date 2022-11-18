@extends('layouts.app')

@section('title', 'Users')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table class="table datatable dataTable-table">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="">
                                            <a href="#">#</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Name</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Email</a>
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
                                        if ($users->count()) {
                                    ?>
                                    @foreach ($users as $key=>$u)
                                        <tr id="tr_{{ $u->id }}">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->created_at }}</td>
                                            <td>
                                                <a id="btn-edit-user" data-id="{{ $u->id }}" type="button" style="color: orange"><i class="bi bi-pencil-square"></i></a>
                                                <a id="btn-delete-user" onclick="deleteUser()" data-id="{{ $u->id }}" type="button" style="color: red"><i class="bi bi-trash-fill"></i></a>
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
                            <div class="dataTable-info">Showing 1 to {{ $users->perPage() }} of {{ $users->total() }} entries</div>
                            {{ $users->links('includes.pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <button id="btn-create-user" class="btn btn-sm btn-primary">
                <i class="bi bi-plus"></i>
                Tambah User
            </button>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="create-user" tabindex="-1" aria-labelledby="create-usres" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-user-title">Tambah Pengguna</h5>
                    <button id="close-modal-user" class="btn-close" data-dismiss="modal" aria-label="close"></button>
                </div>

                <form action="{{ route('userPost') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                            <div id="alert-nama" class="alert alert-danger alert-dismissable fade d-none mt-2"></div>
                        </div>
    
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
    
                        {{-- <div class="form-group">
                            <label for="nama" class="control-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0">-- PILIH STATUS --</option>
                                @foreach ($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->roles }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
    
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-secondary" id="close-modal-user">Tutup</button>
                        <button class="btn btn-sm btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection