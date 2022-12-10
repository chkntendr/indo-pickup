// Toggle detail
$(function() {
    $('body').on('click', '#dokumenCheck', function(e) {
        $('#kargo').hide()
        $('#dokumen').show()
        $('#dokumenCheck').is(':checked')
        $('#kargoCheck').is('disabled')
    })
    $('body').on('click', '#kargoCheck', function(e) {
        $('#kargo').show()
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

// Upload
$('document').ready(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('#form-upload-excel').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this)

        $.ajax({
            url: "{{ route('import') }}",
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            proccessData: false,
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    })
})

// Create report
$('document').ready(function(e) {
    $('#reportClient').select2({
        placeholder: "Pilih Client",
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/report/select2',
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

// Simpan User
function userSave() {
    console.log("TEST")
}

// Simpan client
function clientSave() {
    var table   = $('#clientTable').DataTable();
    var data    = {
        'kode_client': $('#kode_client').val(),
        'client': $('#clientInput').val()
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
        }
    });

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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
        }
    });

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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
        }
    });

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
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        simpanPickup()
    }
});
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

    console.log(data)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
        }
    });

    $.ajax({
        url: '/home/post',
        type: 'POST',
        data: data,
        dataType: "JSON",
        success: function(response) {
            console.log(response)
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

// Select Driver
$('document').ready(function () {
    $('#driver').select2({
        placeholder: "Pilih Driver",
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
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

 function deleteUser() {
    $('body').on('click', '#btn-delete-user', function(e) {
        e.preventDefault();

        let user_id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Data akan dihapus secara permanen!',
            text: 'Lanjutkan?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/users/delete/${user_id}`,
                    type: 'DELETE',
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success: function(response) {
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 1000
                        });

                        $(`#tr_${user_id}`).remove();
                    }
                })
            }
        })
    })
}

// Delete Barang
$('body').on('click', '#btn-delete-barang[data-remote]', function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = $(this).data('remote');
    console.log(url)
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
 * Edit function
 */

// Edit pickup
$('body').on('click', '#btn-edit-pickup[data-remote]', function(e) {
    $('body').on('click', '#close-modal', function(e) {
        $('#editPickup').modal('hide')
    })
    e.preventDefault();
    var url = $(this).data('remote');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log(url)

    $.ajax({
        url: url,
        type: 'GET',
        cache: false,
        dataType: 'json',
        success: function(response) {
            console.log(response)
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
        'lk'       : $('#lk-modal').val(),
        'dk'       : $('#dk-modal').val(),
        'jumlah'    : $('#jumlah-modal').val(),
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
        console.log(jumlah, berat, kargo, "Run ajax cargo")
    }
})