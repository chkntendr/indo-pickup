@extends('layouts.app')

@section('content')
<div class="content">
<!-- Data Pickup -->
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a style="color: orange"><i class="fas fa-edit"></i></a>
                                <a style="color: red"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-sm btn-primary m-2">
                    <i class="fas fa-plus"></i>
                    Tambah Client
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Data Pickup -->
</div>
@endsection
