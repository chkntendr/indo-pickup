@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pickup</h5>
                    <div class="dataTable-wrapper dataTable-loading no-footer searchable fixed-columns">
                        <div class="dataTable-top">
                            {{-- <button class="btn btn-sm btn-danger" id="multiDelete" onclick="deleteMultiple()">
                                <i class="bi bi-trash"></i>
                            </button> --}}
                            <button id="btn-create-pickup" class="btn btn-sm btn-primary">
                                <i class="bi bi-plus"></i>
                                Baru
                            </button>
                            <button id="open-upload-modal" class="btn btn-sm btn-success">
                                <i class="bi bi-upload"></i>
                                Upload
                            </button>
                            <a href="/home/export" id="btn-export-csv" class="btn btn-sm btn-secondary">
                                <i class="bi bi-download"></i>
                                Download
                            </a>
                            <div class="dataTable-search">
                                <form action="{{ route('search-pickup') }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input class="form-control dataTable-input" placeholder="Cari driver" type="text" name="search">
                                        <button class="input-group-text" id="inputGroupPrepend">
                                            <i class="bi bi-search"></i>
                                        </button>                                            
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="table_data">
                        <div class="dataTable-container">
                            <table class="table dataTable dataTable-table" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="">
                                            <a href="#">#</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Tipe</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Client</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Luar Kota</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Dalam Kota</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Jumlah</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Berat</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Tanggal</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Driver</a>
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
                                    @foreach($data as $key => $d)
                                    <tr id="tr_{{ $d->id }}">
                                        <td>
                                            {{ ++$key }}
                                            {{-- <input class="form-check-input" id="check" type="checkbox" value="{{ $d->id }}"> --}}
                                        </td>
                                        <td>{{ $d->tipe }}</td>
                                        <td>{{ $d->client }}</td>
                                        <td>{{ $d->luar_kota }}</td>
                                        <td>{{ $d->dalam_kota }}</td>
                                        @if ($d->tipe_id == "7")
                                            <td>{{ $d->jumlah }} Koli</td>
                                        @else
                                            <td>{{ $d->jumlah }} pcs</td>
                                        @endif
                                        <td>{{ $d->berat }} Kg</td>
                                        <td>{{ $d->created_at }}</td>
                                        <td>{{ $d->driver }}</td>
                                        <td>
                                            <a id="btn-edit-pickup" data-id="{{ $d->id }}" type="button" style="color: orange"><i class="bi bi-pencil-square"></i></a>
                                            <a id="btn-delete-pickup" onclick="deletePickup()" data-id="{{ $d->id }}" type="button" style="color: red"><i class="bi bi-trash-fill"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="10">Tidak ada barang!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="dataTable-bottom">
                            <div class="dataTable-info">Showing 1 to {{ $data->count() }} of {{ $data->total() }} entries</div>
                            {{ $data->onEachSide(1)->links('includes.pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="modal fade" id="modal-upload" tabindex="-1" aria-lablledby="uploadExcel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Upload Data</h5>
                        <button type="button" id="modal-close" class="btn-close" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data" id="file">
                                @csrf
                                <label for="file" class="control-label">Cari File</label>
                                <input type="file" name="file" id="uploadForm" class="form-control form-control-sm">
                                <button type="submit" class="btn btn-sm btn-primary mt-2">
                                    <i class="bi bi-send"></i>
                                    Send
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Pickup -->

{{-- Insert Modal --}}
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="createPickup" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pickup Baru</h5>
                <button id="close-modal" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('postPickup') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tipe" class="control-label">Tipe</label>
                        <select name="tipe" id="tipe" class="form-control">
                            <option value="0">- Pilih Tipe -</option>
                            @foreach ($tipe as $t)
                            <option value="{{ $t->barang }}">{{ $t->barang }}</option>
                            @endforeach
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tipe"></div>
                    </div>

                    <div class="form-group">
                        <label for="client" class="control-label">Client</label>
                        <select name="client" class="form-control" id="client">
                            <option value="0">- Pilih Client -</option>
                            @foreach ($client as $c)
                            <option value="{{ $c->client }}">{{ $c->client }} - {{ $c->kode_client }}</option>
                            @endforeach
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-client"></div>
                    </div>

                    <div class="form-group">
                        <label for="lk" class="control-label">Luar Kota</label>
                        <input type="text" class="form-control" name="lk" id="lk" value="">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jumlah"></div>
                    </div>
                    <div class="form-group">
                        <label for="dk" class="control-label">Dalam Kota</label>
                        <input type="text" class="form-control" name="dk" id="dk" value="">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jumlah"></div>
                    </div>

                    <div class="form-group">
                        <label for="berat" class="control-label">Berat</label>
                        <input type="text" class="form-control" name="berat" id="berat">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-berat"></div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal" class="control-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal"></div>
                    </div>

                    <div class="form-group">
                        <label for="driver" class="control-label">Driver</label>
                        <select name="driver" class="form-control" id="driver">
                            <option value="0">- Pilih Driver -</option>
                            @foreach ($driver as $d)
                            <option value="{{ $d->name }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" id="close-modal">Tutup</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="editPickup" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pickup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="tipe" class="control-label">Tipe</label>
                    <select name="tipe" id="tipe" class="form-control">
                        <option value="0">- Pilih Tipe -</option>
                        @foreach ($tipe as $t)
                        <option value="{{ $t->id }}">{{ $t->barang }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tipe"></div>
                </div>

                <div class="form-group">
                    <label for="client" class="control-label">Client</label>
                    <select name="client" class="form-control" id="client">
                        <option value="0">- Pilih Client -</option>
                        @foreach ($client as $c)
                        <option value="{{ $c->id }}">{{ $c->client }} - {{ $c->kode_client }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-client"></div>
                </div>

                <div class="form-group">
                    <label for="jumlah" class="control-label">Jumlah</label>
                    <input type="text" class="form-control" id="edit-jumlah">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-edit-jumlah"></div>
                </div>

                <div class="form-group">
                    <label for="berat" class="control-label">Berat</label>
                    <input type="text" class="form-control" id="berat">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-berat"></div>
                </div>

                <div class="form-group">
                    <label for="tanggal" class="control-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal"></div>
                </div>

                <div class="form-group">
                    <label for="driver" class="control-label">Driver</label>
                    <select name="client" class="form-control" id="driver">
                        <option value="0">- Pilih Driver -</option>
                        @foreach ($driver as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-driver"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" id="close-modal">Tutup</button>
                <button class="btn btn-primary" id="store">Simpan</button>
            </div>
        </div>
    </div>
</div>
</section>
@endsection