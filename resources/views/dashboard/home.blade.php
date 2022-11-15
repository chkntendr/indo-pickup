@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pickup</h5>
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-top">
                            <div class="dataTable-dropdown">
                                <label>
                                    <select class="dataTable-selector">
                                        <option value="5">5</option>
                                        <option value="10" selected="">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                    </select> entries per page</label>
                                </div>
                                <div class="dataTable-search">
                                    <form action="" method="POST">
                                        <input class="dataTable-input" placeholder="Search..." type="text" id="search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        @include('includes.pickup_pagination')
                        <div class="dataTable-bottom">
                            <div class="dataTable-info">Showing 1 to {{ $data->perPage() }} of {{ $data->total() }} entries</div>
                            {{ $data->links('includes.pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-20 p-3">
                    <button id="btn-create-pickup" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i>
                        Tambah Pickup
                    </button>
                    <button id="open-upload-modal" class="btn btn-sm btn-success">
                        <i class="fas fa-file-import"></i>
                        Import Excel
                    </button>
                    <a href="/home/export" id="btn-export-csv" class="btn btn-sm btn-secondary">
                        <i class="fas fa-file-export"></i>
                        Export Excel
                    </a>
                </div>
            </div>
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
                                        <i class="fas fa-paper-plane"></i>
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

    <div class="container-fluid pt-4 px-4">
        
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
                        <input type="text" class="form-control" id="jumlah">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jumlah"></div>
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