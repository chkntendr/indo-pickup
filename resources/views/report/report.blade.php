@extends('layouts.app')

@section('title', 'Report')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg">
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg" id="manifest_table_col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manifest</h5>
                    <div id="table_data">
                        <div class="dataTable-container">
                            <table class="table datatable dataTable-table" id="manifestTable" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Manifest ID</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Opsi</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-success btn-sm" onclick="createManifest()">
                <i class="bi bi-plus-circle-dotted"></i>
                Manifest baru
            </a>
        </div>

        <div class="col-lg-5" style="display: none;" id="add_barcode_tab">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Barcode</h5>
                    <form>
                        <div class="form-group">
                            <label for="manifest-id">ID Manifest</label>
                            <input type="text" readonly class="form-control form-control-sm" id="manifest-id">
                        </div>
                        <div class="form-group">
                            <input type="text" readonly id="mnf-id" hidden>
                            <label for="barcode_manifest">Tambah barcode</label>
                            <textarea class="form-control form-control-sm" name="" id="barcode_manifest" cols="20" rows="7"></textarea>
                        </div>
                    </form>
                    <button id="save-barcode" onclick="saveBarcode()" class="btn btn-success btn-sm">
                        <i class="bi bi-save"></i>
                        Simpan
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-5" style="display: none;" id="edit_barcode_tab">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Barcode</h5>
                    <form>
                        <div class="form-group">
                            <label for="manifest-id-edit">ID Manifest</label>
                            <input type="text" readonly class="form-control form-control-sm" id="manifest-id-edit">
                        </div>
                        <div class="form-group">
                            <input type="text" readonly id="mnf-id" hidden>
                            <label for="barcode_manifest_edit">Edit barcode</label>
                            <textarea class="form-control form-control-sm" name="" id="barcode_manifest_edit" cols="20" rows="7"></textarea>
                        </div>
                    </form>
                    <button id="save-barcode" onclick="updateBarcode()" class="btn btn-success btn-sm">
                        <i class="ri-save-3-line"></i>
                        Perbarui
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" tabindex="-1" id="uploadManifest">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload Manifest</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" id="manifest-upload-form">
                <input type="file" name="file" id="file" class="form-control form-control-sm">
                <input type="text" id="testID">  
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="close-modal">Close</button>
                <button type="submit" id="upload-manifest" class="btn btn-success btn-sm">
                    <i class="bi bi-upload"></i>
                    Upload
                </button>
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
<script>
    $(function() {
        var table = $('#manifestTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('manifestData') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'm_id', name: 'total' },
                { data: 'uploaded_at', name: 'tanggal' },
                { data: 'total', name: 'total' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'proses',
                    name: 'proses',
                    orderable: true,
                    searchable: true,
                }
            ]
        })
    })
</script>