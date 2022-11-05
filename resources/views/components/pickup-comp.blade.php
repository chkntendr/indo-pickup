<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="createPickup" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pickup Baru</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="tipe" class="control-label">Tipe</label>
                    <select name="tipe" id="tipe" class="form-control">
                        <option value="0">- Pilih Tipe -</option>
                        @foreach ($type as $tp)
                        <option value="{{ $tp->id }}">{{ $tp->tipe }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tipe"></div>
                </div>

                <div class="form-group">
                    <label for="client" class="control-label">Client</label>
                    <input type="text" class="form-control" id="client">
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
                    <input type="text" class="form-control" id="driver">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-driver"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" id="store">Simpan</button>
            </div>
        </div>
    </div>
</div>