<div class="dataTable-container" id="table_data">
    <table class="table dataTable dataTable-table" id="datatable">
        <thead>
            <tr>
                <th scope="col" data-sortable="">
                    <a href="#" class="dataTable-sorter">Tipe</a>
                </th>
                <th scope="col" data-sortable="">
                    <a href="#" class="dataTable-sorter">Client</a>
                </th>
                <th scope="col" data-sortable="">
                    <a href="#" class="dataTable-sorter">Jumlah</a>
                </th>
                <th scope="col" data-sortable="">
                    <a href="#" class="dataTable-sorter">Berat</a>
                </th>
                <th scope="col" data-sortable="">
                    <a href="#" class="dataTable-sorter">Tanggal</a>
                </th>
                <th scope="col" data-sortable="">
                    <a href="#" class="dataTable-sorter">Driver</a>
                </th>
                <th scope="col" data-sortable="">
                    <a href="#" class="dataTable-sorter">Opsi</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($data->count()) {
            ?>
            @foreach($data as $key => $d)
            <tr id="tr_{{ $d->id }}">
                <td>{{ $d->tipe->barang }}</td>
                <td>{{ $d->client->client }}</td>
                @if ($d->tipe_id == "7")
                    <td>{{ $d->jumlah }} Koli</td>
                @else
                    <td>{{ $d->jumlah }} pcs</td>
                @endif
                <td>{{ $d->berat }} Kg</td>
                <td>{{ $d->created_at }}</td>
                <td>{{ $d->driver->name }}</td>
                <td>
                    <a id="btn-edit-pickup" data-id="{{ $d->id }}" type="button" style="color: orange"><i class="bi bi-pencil-square"></i></a>
                    <a id="btn-delete-pickup" data-id="{{ $d->id }}" type="button" style="color: red"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
            @endforeach
            <?php } else { ?>
                <tr>
                    <td colspan="8">Tidak ada barang!</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>