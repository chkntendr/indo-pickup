// Token
$(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
        }
    })
})

/**
 * @DataTable
 */
// Invoice Table
$(function() {
    var table = $('#invoiceTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/invoice/data'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'mnf_id', name: 'mnf_id' },
            { data: 'uploaded_at', name: 'tanggal' },
            { data: 'tujuan', name: 'tujuan' },
            { data: 'barcode', name: 'barcode' },
            { data: 'koli', name: 'koli',  render: function (data, type, row) {
                return data +' '+ "pcs";
            }},
            { data: 'berat', name: 'berat', render: function(data, type, row) {
                return data +' '+ "KG";
            }},
            { data: 'harga', name: 'harga', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
            { data: 'packing', name: 'packing', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
            { data: 'total_kiriman', name: 'total_kiriman', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
            { data: 'keterangan', name: 'keterangan' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true,
            }
        ]
    })
})

// Manifest Table
$(function() {
    var table = $('#manifestTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/manifest/data'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'm_id', name: 'm_id' },
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

// Pickup Table
$(function() {
    var table = $('#pickupTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/home/kargo'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'tipe', name: 'tipe' },
            { data: 'driver', name: 'driver' },
            { data: 'client', name: 'client' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'dalam_kota', name: 'dalam_kota' },
            { data: 'luar_kota', name: 'luar_kota' },
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

$(function() {
    var table = $('#dokumenTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/home/dokumen'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'tipe', name: 'tipe' },
            { data: 'driver', name: 'driver' },
            { data: 'client', name: 'client' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'tanggal_pic', name: 'tanggal_pic'},
            { data: 'sp1', name: 'sp1' },
            { data: 'sp2', name: 'sp2' },
            { data: 'sp3', name: 'sp3' },
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

// Barang Table
$(function() {
    var table = $('#barangTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/barang/data'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'barang', name: 'barang' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    })
})

// Users table
$(function() {
    var table = $('#userTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/users/data'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'roles', name: 'role' },
            {
                data: 'formatedDate',
                name: 'formatedDate',
                orderable: true,
                searchable: true
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    })
})

// Client Table
$(function() {
    var table = $('#clientTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/client/data'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'kode_client', name: 'kode_client' },
            { data: 'client', name: 'client' },
            {
                data: 'formatedDate',
                name: 'formatedDate',
                orderable: true,
                searchable: true
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    })
})

// Driver Table
$(function() {
    var table = $('#driverTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/driver/data'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            }
        ]
    })
})

// Roles Table
$(function() {
    var table = $('#roleTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/roles/data'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'role', name: 'role' },
            {
                data: 'formatedDate',
                name: 'formatedDate',
                orderable: true,
                searchable: true
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    })
})

// Detail manifest
$('body').on('click', '#btn-detail-manifest[data-remote]', function(e) {
    e.preventDefault()
    var id = $(this).data('remote');
    $.ajax({
        url: `/manifest/mid/${id}`,
        type: 'GET',
        success: function(response) {
            $('#card-title span').text(response.data[0].m_id);
        }
    })
    $('#manifest_detail').show()
    // Detail Manifest Table
    $(function() {
        var table = $('#detailManifestTable').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: {
                url: `/manifest/detail/${id}`
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'uploaded_at', name: 'tanggal' },
                { data: 'tujuan', name: 'tujuan' },
                { data: 'barcode', name: 'barcode' },
                { data: 'koli', name: 'koli',  render: function (data, type, row) {
                    return data +' '+ "pcs";
                }},
                { data: 'berat', name: 'berat', render: function(data, type, row) {
                    return data +' '+ "KG";
                }},
                { data: 'harga', name: 'harga', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
                { data: 'packing', name: 'packing', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
                { data: 'total_kiriman', name: 'total_kiriman', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
                { data: 'keterangan', name: 'keterangan' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                }
            ]
        })
    })
    $('#manifest_tab').hide()

    $('body').on('click', '#backButtonManifest', function(e) {
        $('#manifest_detail').hide()
        $('#manifest_tab').show()
    })
})

// Detail Pickup
$('body').on('click', '#btn-detail-pickup[data-remote]', function(e) {
    e.preventDefault();
    var id = $(this).data('remote');
    
})

// Invoice
$('body').on('click', '#prosesInv[data-remote]', function(e) {
    e.preventDefault();
    var id = $(this).data('remote');
    var table = $('#manifestTable').DataTable();

    $.ajax({
        url: `/manifest/cek/${id}`,
        type: 'put',
        data: { "is_processed": 1 },
        success: function(response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw()
            }
            if (response.status == 403) {
                Swal.fire({
                    icon: 'error',
                    title: `${ response.message }`,
                    showConfirmButton: true,
                })
            }
        }
    })
})

// Add barcode
$('body').on('click', '#btn-manifest-barcode[data-remote]', function(e) {
    e.preventDefault();
    $('#add_barcode_tab').toggle();
    $('#edit_barcode_tab').hide();
    var id = $(this).data('remote');
    $('#id_manifest_upload').val(id);
    $('#mnf-id').val(id)

    $.ajax({
        url: `/manifest/mid/${id}`,
        type: 'GET',
        success: function(response) {
            $('#barcode-manifest').val('')
            $('#manifest-id').val(response.data[0].m_id)
        }
    })
})

function saveBarcode() {
    var barcode = $('#barcode_manifest').val();
    var table   = $('#manifestTable').DataTable();
    var id      = $('#mnf-id').val();

    $.ajax({
        url: `/manifest/update/${id}`,
        type: 'PUT',
        data: {
            "barcode": barcode
        },
        success: function(response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#add_barcode_tab').toggle();
                table.draw();
            }
        }
    })
}

function updateBarcode() {
    var barcode = $('#barcode_manifest_edit').val();
    var table   = $('#manifestTable').DataTable();
    var id      = $('#mnf-id').val();

    Swal.fire({
        title: "Data akan di update!",
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya"
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: `/manifest/update/${id}`,
                type: 'PUT',
                data: {
                    "barcode": barcode
                },
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: `${ response.message }`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#edit_barcode_tab').toggle();
                        table.draw();
                    }
                }
            })
        }
    })
}

// Toggle detail
$(function() {
    $('body').on('click', '#dokumenCheck', function(e) {
        $('#kargo').hide()
        $('#dokumen').show()
        $('#tanggal_tipe').text('Tanggal Doc')
        $('#dokumenCheck').is(':checked')
        $('#kargoCheck').is('disabled')
    })
    $('body').on('click', '#kargoCheck', function(e) {
        $('#kargo').show()
        $('#tanggal_tipe').text('Tanggal Request')
        $('#dokumen').hide()
        $(this).is(':checked')
    })
})

// Input Form
function inputForm() {
    $('#inputForm').toggle()
    $('#moreTab').hide()
}

function moreTab() {
    $('#moreTab').toggle()
    $('#inputForm').hide()
}

/**
 * @Store function
 */

// Upload manifest
$(document).ready(function(e) {
    var manifestTable = $('#manifestTable').DataTable();
    var id_manifest = $('#id_manifest_upload').val();

    $('#upload-manifest-to-invoice').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('mnf_id', $('#id_manifest_upload').val())
        var id = $('#mnf-id').val();
        var completed = function() {
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil di upload!',
                showConfirmButton: false,
                timer: 1000
            });
        }
        var loading = function() {
            Swal.fire({
                title: 'Please Wait!',
                html: 'Loading ...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            })
        }
        var error = function() {
            Swal.fire({
                title: 'Error!',
                icon: 'error',
                message: 'Import Gagal!',
                showConfirmButton: false,
                timer: 1500
            })
        }

        $.ajax({
            url: `/invoice/import`,
            type: "POST",
            data: formData,
            beforeSend: function() {
                loading();
            },
            error: function() {
                swal.close()
                error();
            },
            success: function(response) {
                if (response.status == 200) {
                    swal.close();
                    completed();
                }
                manifestTable.draw()
            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })
})

// Upload excel pickup
$(document).ready(function(e) {
    var dokumenTable = $('#dokumenTable').DataTable();
    var kargoTable = $('#pickupTable').DataTable();
    
    $('#upload-excel-to-database').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var completed = function() {
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil diupload!',
                showConfirmButton: false,
                timer: 1000
            });
        }
        var loading = function() {
            Swal.fire({
                title: 'Please Wait!',
                html: 'Loading ...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            })
        }

        $.ajax({
            url: "/home/import",
            type: "POST",
            data: formData,
            beforeSend: function() {
                loading();
            },
            complete: function(response) {
                swal.close()
                completed()
                dokumenTable.draw()
                kargoTable.draw()
            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })
})

// Save role
function roleSave() {
    var table = $('#roleTable').DataTable();
    var role = $('#role').val();

    $.ajax({
        url: '/roles/store',
        type: 'post',
        chache: false,
        data: {
            "role": role
        },
        success: function(response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1000
                });
                table.draw()
            }
        }
    })
}

// Create manifest
function createManifest() {
    var table = $('#manifestTable').DataTable();    

    $.ajax({
        url: '/manifest/store',
        type: 'get',
        success: function(response) {
            if (response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw()
            }
        }
    })
}

// Simpan User
function userSave() {
    var table = $('#userTable').DataTable();
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var role = $('#role-select').val();

    $.ajax({
        url: '/users/post',
        type: 'POST',
        data: {
            "name": name,
            "email": email,
            "password": password,
            "role": role
        },
        dataType: 'JSON',
        success: function(response) {
            if (response.status == 200) {
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw()
            }
        }
    })
}

// Simpan client
function clientSave() {
    var table   = $('#clientTable').DataTable();
    var data    = {
        'kode_client': $('#kode_client').val(),
        'client': $('#clientInput').val()
    }

    $.ajax({
        url: '/client/post',
        type: 'POST',
        data: data,
        dataType: 'JSON',
        success: function(response) {
            if (response.status == 200) {
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw()
            }
        }
    })
}

// Simpan barang
function barangSave() {
    var table = $('#barangTable').DataTable();
    var data = {
        'tipe': $('#tipeInput').val()
    }

    $.ajax({
        url: '/barang/post',
        type: 'POST',
        data: data,
        dataType: "JSON",
        success: function(response) {
            if(response.status == 200) {
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw();
            } else {
                Swal.fire({
                    type: 'failed',
                    icon: 'danger',
                    title: "Failed to input data",
                    showConfirmButton: false,
                    time: 1500
                })
            }
        }
    });
}

// Simpan driver
function driverSave() {
    var table = $('#driverTable').DataTable();
    var data = {
        'nama': $('#driverInput').val()
    }

    $.ajax({
        url: '/driver/post',
        type: 'POST',
        data: data,
        dataType: "JSON",
        success: function(response) {
            if(response.status == 200) {
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1500
                });
                table.draw();
            }
        }
    });
}

// Simpan Pickup
function simpanPickup() {
    var checkTipe       = $('input[name="gridRadios"]:checked').val();
    var tableKargo      = $('#pickupTable').DataTable()
    var tableDokumen    = $('#dokumenTable').DataTable()
    var beratDokumen    = $('#beratDokumen').val()
    var beratKargo      = $('#beratKargo').val()
    var jumlahDokumen   = $('#jumlahDokumen').val()
    var jumlahKargo     = $('#jumlahKargo').val()

    if (checkTipe === "Dokumen") {
        var total = jumlahDokumen
        var berat = beratDokumen
    } else {
        var total = jumlahKargo
        var berat = beratKargo
    }
    var data = {
        'tipe':     $('input[name="gridRadios"]:checked').val(),
        'driver':   $('#driver').val(),
        'client':   $('#client').val(),
        'tanggal_pic': $('#tanggal_pic').val(),
        'tanggal':  $('#tanggal').val(),
        'sp1':      $('#sp1').val(),
        'sp2':      $('#sp2').val(),
        'sp3':      $('#sp3').val(),
        'dk':       $('#dk').val(),
        'lk':       $('#lk').val(),
        'jumlah': total,
        'description': $('#description').val(),
        'berat': berat,
    }

    $.ajax({
        url: '/home/post',
        type: 'POST',
        data: data,
        dataType: "JSON",
        success: function(response) {
            if(response.status == 200) {
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1500
                });
                tableKargo.draw();
                tableDokumen.draw();
            }
            $('#tipe').select2('val', '');
            $('#driver').select2('val', '');
            $('#client').select2('val', '');
            $('#tanggal').val('');
            $('#tanggal_pickup').val('');
            $('#sp1').val('');
            $('#sp2').val('');
            $('#sp3').val('');
            $('#dk').val('');
            $('#lk').val('');
            $('#description').val('');
            $('#jumlahKargo').val('');
            $('#jumlahDokumen').val('');
            $('#beratKargo').val('');
            $('#beratDokumen').val('');
        }
    });
}

// Select Role
$('document').ready(function () {
    $('#role-select').select2({
        placeholde: "Pilih Role",
        ajax: {
            url: '/roles/select2',
            dataType: 'JSON',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.role,
                            id: item.role
                        }
                    })
                }
            }
        }
    })
})

// Select Driver
$('document').ready(function () {
    $('#driver').select2({
        placeholder: "Pilih Driver",
        ajax: {
            url: '/driver/select2',
            dataType: 'JSON',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.name
                        }
                    })
                };
            },
            cache: true
        }
    })
})

// Select Barang
$('document').ready(function () {
    $('#tipe').select2({
        placeholder: "Pilih Tipe",
        ajax: {
            url: '/barang/select2',
            dataType: 'JSON',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.barang,
                            id: item.barang
                        }
                    })
                };
            },
            cache: true
        }
    })
})

// Select Client
$('document').ready(function () {
    $('#client').select2({
        placeholder: "Pilih Client",
        ajax: {
            url: '/client/select2',
            dataType: 'JSON',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.client,
                            id: item.client
                        }
                    })
                };
            },
            cache: true
        }
    })
})

/**
 * @Delete function
 */
// Delete role
$('body').on('click', '#btn-delete-role[data-remote]', function(e) {
    e.preventDefault();
    var url = $(this).data('remote');

    Swal.fire({
        title: 'Role akan dihapus',
        text: 'Lanjutkan?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                data: {
                    method: '_DELETE', submit: true
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            }).always(function (data) {
                $('#roleTable').DataTable().draw(false)
            })
        }
    })
})

// Delete manifest
$('body').on('click', '#btn-delete-manifest[data-remote]', function(e) {
    e.preventDefault();
    var url = $(this).data('remote');

    Swal.fire({
        title: "Data akan dihapus secara permanen!",
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya"
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                data: {
                    method: '_DELETE', submit: true
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            }).always(function (data) {
                $('#manifestTable').DataTable().draw(false)
            })
        }
    })
})

// Delete user
$('body').on('click', '#btn-delete-user[data-remote]', function (e) {
    e.preventDefault();
    var url = $(this).data('remote');
    Swal.fire({
        title: "Data akan dihapus secara permanen!",
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya"
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                data: {
                    method: '_DELETE', submit: true
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            }).always(function (data) {
                $('#userTable').DataTable().draw(false)
            })
        }
    })
})

// Delete Barang
$('body').on('click', '#btn-delete-barang[data-remote]', function (e) {
    e.preventDefault();
    var url = $(this).data('remote');
    
    Swal.fire({
        title: "Data akan dihapus secara permanen!",
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya"
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                data: {
                    method: '_DELETE', submit: true
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            }).always(function (data) {
                $('#barangTable').DataTable().draw(false)
            })
        }
    })
})

// Delete Client
$('body').on('click', '#btn-delete-client[data-remote]', function (e) {
    e.preventDefault();

    var url = $(this).data('remote');
    
    Swal.fire({
        title: "Data akan dihapus secara permanen!",
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya"
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                data: {
                    method: '_DELETE', submit: true
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            }).always(function (data) {
                $('#clientTable').DataTable().draw(false)
            })
        }
    })
})

// Delete Driver
$('body').on('click', '#btn-delete-driver[data-remote]', function (e) {
    e.preventDefault();
    var url = $(this).data('remote');
    
    Swal.fire({
        title: "Data akan dihapus secara permanen!",
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya"
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                data: {
                    method: '_DELETE', submit: true
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            }).always(function (data) {
                $('#driverTable').DataTable().draw(false)
            })
        }
    })
})

// Delete Pickup
$('body').on('click', '#btn-delete-pickup[data-remote]', function (e) {
    e.preventDefault()
    var url = $(this).data('remote');
    Swal.fire({
        title: "Data akan dihapus secara permanen!",
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya"
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                data: {
                    method: '_DELETE', submit: true
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            }).always(function (data) {
                $('#pickupTable').DataTable().draw(false)
                $('#dokumenTable').DataTable().draw(false)
            })
        }
    })
})

/**
 * @Edit function
 */

// Edit invoice barcode
$('body').on('click', '#btn-edit-barInvoice[data-remote]', function(e) {
    e.preventDefault();
    var span = document.getElementById('barcodeSpan');
    var id = $(this).data('remote');
    $('#manifest_table_col').hide();
    $('#edit-barcode-detail').show();
    $.ajax({
        url: `/invoice/edit/${id}`,
        type: 'GET',
        success: function(response) {
            if (response.status == 200) {
                var barcode = response.data.barcode
                span.innerHTML(`<span>${barcode}</span>`)
            }
        }
    })

    $('body').on('click', '#backButtonInvoice', function(e) {
        e.preventDefault()
        $('#manifest_table_col').show();
        $('#edit-barcode-detail').hide();
    })
})

// Edit barcode
$('body').on('click', '#btn-edit-barcode[data-remote]', function(e) {
    e.preventDefault();
    $('#edit_barcode_tab').show();
    $('body').on('click', '#close-edit-barcode-tab', function(e) {
        $('#edit_barcode_tab').hide();
    })
    $('#add_barcode_tab').hide();
    var id = $(this).data('remote');
    $('#mnf-id').val(id)

    $.ajax({
        url: `/manifest/barcode/${id}`,
        type: 'GET',
        cache: false,
        success: function(response) {
            $('#barcode_manifest_edit').val(response.data[0].barcode)
            $('#manifest-id-edit').val(response.data[0].m_id)
        }
    })
})

// Edit pickup
$('body').on('click', '#btn-edit-pickup[data-remote]', function(e) {
    $('body').on('click', '#close-modal', function(e) {
        $('#editPickup').modal('hide')
    })
    e.preventDefault();
    var url = $(this).data('remote');

    $.ajax({
        url: url,
        type: 'GET',
        cache: false,
        dataType: 'json',
        success: function(response) {
            $('#editPickup').modal('show')
            $('#driver-modal').val(response.data[0].driver)
            $('#pickup_id').val(response.data[0].id);
            $('#tipe-modal').val(response.data[0].tipe);
            $('#client-modal').val(response.data[0].client)
            $('#tanggal-modal').val(response.data[0].tanggal)
            $('#jumlah-modal').val(response.data[0].jumlah)
            if (response.data[0].tipe == "Dokumen") {
                $('#dokumenSP').show()
                $('#kargoLKDK').hide()
                $('#sp1-modal').val(response.data[0].sp1)
                $('#sp2-modal').val(response.data[0].sp2)
                $('#sp3-modal').val(response.data[0].sp3)
            } else {
                $('#dokumenSP').hide()
                $('#kargoLKDK').show()
                $('#description-modal').val(response.data[0].description)
                $('#lk-modal').val(response.data[0].luar_kota)
                $('#dk-modal').val(response.data[0].dalam_kota)
            }
            $('#berat-modal').val(response.data[0].berat)
        }
    })    
})

$('body').on('click', '#editSave', function(e) {
    e.preventDefault();
    var tableKargo      = $('#pickupTable').DataTable()
    var tableDokumen    = $('#dokumenTable').DataTable()
    let id      = $('#pickup_id').val();
    let tipe    = $('#tipe-modal').val();

    var dokumen = {
        'tipe'      : $('#tipe-modal').val(),
        'client'    : $('#client-modal').val(),
        'tanggal'   : $('#tanggal-modal').val(),
        'driver'    : $('#driver-modal').val(),
        'sp1'       : $('#sp1-modal').val(),
        'sp2'       : $('#sp2-modal').val(),
        'sp3'       : $('#sp3-modal').val(),
        'jumlah'    : $('#jumlah-modal').val(),
        'berat'     : $('#berat-modal').val()
    }
    var kargo = {
        'tipe'      : $('#tipe-modal').val(),
        'client'    : $('#client-modal').val(),
        'lk'       : $('#lk-modal').val(),
        'dk'       : $('#dk-modal').val(),
        'tanggal'   : $('#tanggal-modal').val(),
        'jumlah'    : $('#jumlah-modal').val(),
        'driver'    : $('#driver-modal').val(),
        'berat'     : $('#berat-modal').val()
    }

    if (tipe == "Dokumen") {
        $.ajax({
            url: `/home/pickup/update/${id}`,
            type: 'PUT',
            dataType: 'json',
            cache: false,
            data: dokumen,
            success: function(response) {
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1000
                })
                $('#editPickup').modal('hide')
                tableDokumen.draw()
                tableKargo.draw()
            }
        })
    } else {
        $.ajax({
            url: `/home/pickup/update/${id}`,
            type: 'PUT',
            dataType: 'json',
            cache: false,
            data: kargo,
            success: function(response) {
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${ response.message }`,
                    showConfirmButton: false,
                    timer: 1000
                })
                $('#editPickup').modal('hide')
                tableDokumen.draw()
                tableKargo.draw()
            }
        })
        console.log(kargo, "Run ajax cargo")
    }
})