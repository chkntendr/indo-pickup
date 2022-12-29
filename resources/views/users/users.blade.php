@extends('layouts.app')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@section('title', 'Users')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <div class="dataTable-container">
                        <table class="table datatable datatable-table" width="100%" id="userTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User baru</h5>
                    <form>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" id="name" class="form-control form-control-sm">
                        </div>
                        <div class="form-group my-2">
                            <label for="email">E-Mail</label>
                            <input type="email" id="email" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role-select" class="form-control form-control-sm"></select>
                        </div>
                        <div class="form-group my-2">
                            <button class="btn btn-success btn-sm" onclick="userSave()">
                                <i class="ri-save-3-line"></i>
                                Simpan
                            </button>
                        </div>
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