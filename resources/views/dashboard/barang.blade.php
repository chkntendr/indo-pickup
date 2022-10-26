@extends('layouts.app')

@extends('layouts.sidebar')
@extends('layouts.navbar')
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
                        if ($count > 0) {
                        ?>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d -> barang }}</td>
                            <td>
                                <a style="color: orange"><i class="fas fa-edit"></i></a>
                                <a style="color: red"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <?php
                        } else {
                        ?>
                        <tr>
                            <td colspan="3">Tidak ada barang</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button class="btn btn-sm btn-primary m-2">
                    <i class="fas fa-plus"></i>
                    Tambah Barang
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Data Pickup -->
</div>
@endsection
