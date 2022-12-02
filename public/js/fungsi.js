// Toggle detail
$('#tipe').on('select2:select', function (e) {
    var data = e.params.data.id
    
    if (data === "Kargo") {
        $('#kargo').show()
        $('#dokumen').hide()
    } else {
        $('#kargo').hide()
        $('#dokumen').show()
    }
});

// Input Form
function inputForm() {
    $('#inputForm').toggle()
}
/**
 * Store function
 */

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
function simpanPickup() {
    var checkTipe       = $('#tipe').val()
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
        'tipe':     $('#tipe').val(),
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

// Chart
function getDataPickup() {
    $.ajax({
        url: '/report/data',
        type: 'GET',
        cache: false,
        success: function(response) {
            console.log(response)

            const labels = [
                new Date().getFullYear(),
            ]

            const data = {
                labels: labels,
                datasets: [
                {
                    label: "Paket",
                    backgroundColor: 'rgb(0, 90, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [ response.paket ]
                },
                {
                    label: "Dokumen",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [ response.dokumen ]
                },
                {
                    label: "Kargo",
                    backgroundColor: 'rgb(0, 100, 203)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [ response.kargo ]
                }
            ]
            }

            const config = {
                type: 'bar',
                data: data,
                options: {}
            };
        
            new Chart(
                document.getElementById('laporan'),
                config
            )
        }
    })
}

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
            })
        }
    })
})