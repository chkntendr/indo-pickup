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
                        {{-- <div class="dataTable-top">
                            <button class="btn btn-sm btn-danger" id="multiDelete" onclick="deleteMultiple()">
                                <i class="bi bi-trash"></i>
                            </button>
                            <button onclick="newPickup()" class="btn btn-sm btn-primary">
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
                        </div> --}}
                    </div>
                    <div id="table_data">
                        <div class="dataTable-container">
                            <table class="table table-bordered yajra-datatable">
                                <thead>
                                    <tr>
                                        <th>Tipe</th>
                                        <th>Client</th>
                                        <th>Luar Kota</th>
                                        <th>Dalam Kota</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Tanggal</th>
                                        <th>Driver</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>{{ $data }}</tbody>
                            </table>
                            {{-- <table class="table datatable dataTable-table" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Tipe</a>
                                        </th>
                                        <th scope="col" data-sortable="">
                                            <a href="#">Client</a>
                                        </th>
                                        <th scope="col" data-sortable="" width="11%">
                                            <a href="#">Luar Kota</a>
                                        </th>
                                        <th scope="col" data-sortable="" width="12%">
                                            <a href="#">Dalam Kota</a>
                                        </th>
                                        <th scope="col" data-sortable="" width="11%">
                                            <a href="#">Jumlah</a>
                                        </th>
                                        <th scope="col" data-sortable="" width="11%">
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
                                    <tr id="newPickup" style="display: none;">
                                        <td>
                                            <select name="tipe" id="tipe" class="form-control form-control-sm">
                                                <option style="font-weight: bold">Pilih Tipe</option>
                                                @foreach ($tipe as $item)
                                                <option value="{{ $item->barang }}">{{ $item->barang }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="client" id="client" class="form-control form-control-sm">
                                                <option style="font-weight: bold">Pilih Client</option>
                                                @foreach ($client as $item)
                                                    <option value="{{ $item->client }}">{{ $item->client }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input id="luarkota" type="text" class="form-control form-control-sm"></td>
                                        <td><input id="dalamkota" type="text" class="update form-control form-control-sm"></td>
                                        <td><input id="jumlah" type="text" class="form-control form-control-sm"></td>
                                        <td><input id="berat" type="text" class="form-control form-control-sm"></td>
                                        <td><input id="tanggal" type="date" class="form-control form-control-sm"></td>
                                        <td>
                                            <select id="driver" class="form-control form-control-sm">
                                                <option style="font-weight: bold">Pilih Driver</option>
                                                @foreach ($driver as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a type="button" onclick="savePickup()" style="color: green"><i class="bi bi-save"></i></a>
                                        </td>
                                    </tr>
                                    @foreach ($data as $item)
                                        <tr id="index_{{ $item->id }}">
                                            <td>{{ $item->tipe }}</td>
                                            <td>{{ $item->client }}</td>
                                            <td>{{ $item->luar_kota }}</td>
                                            <td>{{ $item->dalam_kota }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->berat }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->driver }}</td>
                                            <td>
                                                <a id="btn-edit-pickup" data-id="" type="button" style="color: orange"><i class="bi bi-pencil-square"></i></a>
                                                <a id="deletePickup" value="{{ $item->id }}" onclick="deletePickup()" data-id="" type="button" style="color: red"><i class="bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
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
                                <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data"
                                    id="file">
                                    @csrf
                                    <label for="file" class="control-label">Cari File</label>
                                    <input type="file" name="file" id="uploadForm"
                                        class="form-control form-control-sm">
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
                                        <option value="{{ $c->client }}">{{ $c->client }} - {{ $c->kode_client }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-client"></div>
                            </div>

                            <div class="form-group">
                                <label for="lk" class="control-label">Luar Kota</label>
                                <input type="text" class="form-control" name="lk" id="lk"
                                    value="">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jumlah"></div>
                            </div>
                            <div class="form-group">
                                <label for="dk" class="control-label">Dalam Kota</label>
                                <input type="text" class="form-control" name="dk" id="dk"
                                    value="">
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
                                    <option value="{{ $c->id }}">{{ $c->client }} - {{ $c->kode_client }}
                                    </option>
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
