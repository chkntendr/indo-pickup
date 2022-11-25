@extends('layouts.app')
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@section('title', 'Dashboard')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pickup</h5>
                        <div class="dataTable-wrapper dataTable-loading no-footer searchable">
                        {{-- <div class="dataTable-top">
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
                        </div> --}}
                    </div>
                    <div id="table_data">
                        <div class="dataTable-container">
                            <table class="table datatable dataTable-table" id="yajra-datatable" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe</th>
                                        <th>Driver</th>
                                        <th>Client</th>
                                        <th>Tanggal</th>
                                        <th>Luar Kota</th>
                                        <th>Dalam Kota</th>
                                        <th>Jumlah</th>
                                        <th>Berat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
    var table = $('#yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('homePickup') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'tipe', name: 'tipe' },
            { data: 'driver', name: 'driver' },
            { data: 'client', name: 'client' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'luar_kota', name: 'luar_kota' },
            { data: 'dalam_kota', name: 'dalam_kota' },
            { data: 'jumlah', name: 'jumlah' },
            { data: 'berat', name: 'berat' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    })
})
</script>