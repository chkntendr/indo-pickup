@extends('layouts.app')

@section('content')
@extends('layouts.sidebar')
@extends('layouts.navbar')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4">Data Driver</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                        Tambah Driver
                    </button>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
