// Delete Barang
$('body').on('click', '#btn-delete-barang', function() {
    let barang_id = $(this).data('id');
    let token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: 'Data akan dihapus secara permanen!',
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log("TEST")

            $.ajax({
                url: `/barang/hapus/${barang_id}`,
                type: "DELETE",
                cache: false,
                data: {
                    "_token": token
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $(`#index_${barang_id}`).remove();
                }
            })
        }
    })
})

// Delete Pickup
$('body').on('click', '#btn-delete-pickup', function() {
    let pickup_id = $(this).data('id');
    let token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: 'Data akan dihapus secara permanen!',
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log("TEST")

            $.ajax({
                url: `/home/hapus/${pickup_id}`,
                type: "DELETE",
                cache: false,
                data: {
                    "_token": token
                },
                success: function(response) {
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${ response.message }`,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        location.reload();
                    });

                    $(`#index_${pickup_id}`).remove();
                }
            })
        }
    })
})

// Input pickup
$('body').on('click', '#btn-create-pickup', function() {
    //  Open Modal
    $('#modal-create').modal('show');
});

// Action create pickup
$('#store').click(function(e) {
    e.preventDefault();

    // Define variable
    let tipe     = $('#tipe').val();
    let client   = $('#client').val();
    let jumlah   = $('#jumlah').val();
    let berat    = $('#berat').val();
    let tanggal  = $('#tanggal').val();
    let driver   = $('#driver').val();
    let token    = $("meta[name='csrf-token']").attr("content");


    $.ajax({
        url: `/home/post`,
        type: "POST",
        cache: false,
        data: {
            "tipe": tipe,
            "client": client,
            "jumlah": jumlah,
            "berat": berat,
            "tanggal": tanggal,
            "driver": driver,
            "_token": token
        },

        success:function(response) {
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                location.reload()
            });

            // // Data Pickup
            // let pickup = `
            // <tr id="index_${response.data.id}">
            //     <td>${response.data.tipe_id}</td>
            //     <td>${response.data.client_id}</td>
            //     <td>${response.data.jumlah}</td>
            //     <td>${response.data.berat}</td>
            //     <td>${response.data.tanggal}</td>
            //     <td>${response.data.driver}</td>
            // </tr>
            // `;

            // // Append to table
            // $('#table-pickups').prepend(pickup);

            // // Clear form
            // $('#tipe').val();
            // $('#client').val();
            // $('#jumlah').val();
            // $('#berat').val();
            // $('#tanggal').val();
            // $('#driver').val();

            // Close modal
            $('#modal-create').modal('hide');
        },

        error:function(error) {
            if (error.responseJSON.tipe[0]) {
                // Show alert
                $('#alert-tipe').removeClass('d-none');
                $('#alert-tipe').addClass('d-block');

                // Add message to alert
                $('#alert-tipe').html(error.responseJSON.tipe[0]);
            }

            if(error.responseJSON.client[0]) {
                // Show alert
                $('#alert-client').removeClass('d-none');
                $('#alert-client').addClass('d-block');

                // Add message to alert
                $('#alert-client').html(error.responseJSON.client[0]);
            }

            if(error.responseJSON.jumlah[0]) {
                // Show alert
                $('#alert-jumlah').removeClass('d-none');
                $('#alert-jumlah').addClass('d-block');

                // Add message to alert
                $('#alert-jumlah').html(error.responseJSON.jumlah[0]);
            }

            if(error.responseJSON.berat[0]) {
                // Show alert
                $('#alert-berat').removeClass('d-none');
                $('#alert-berat').addClass('d-block');

                // Add message to alert
                $('#alert-berat').html(error.responseJSON.berat[0]);
            }

            if(error.responseJSON.tanggal[0]) {
                // Show alert
                $('#alert-tanggal').removeClass('d-none');
                $('#alert-tanggal').addClass('d-block');

                // Add message to alert
                $('#alert-tanggal').html(error.responseJSON.tanggal[0]);
            }

            if(error.responseJSON.driver[0]) {
                // Show alert
                $('#alert-driver').removeClass('d-none');
                $('#alert-driver').addClass('d-block');

                // Add message to alert
                $('#alert-driver').html(error.responseJSON.driver[0]);
            }
        }
    })
})

// Cari client
// $('.livesearch').select2({
//     placeholder: 'Select movie',
//     ajax: {
//         url: '/home/client-search',
//         dataType: 'json',
//         delay: 250,
//         processResults: function (data) {
//             return {
//                 results: $.map(data, function (item) {
//                     return {
//                         text: item.name,
//                         id: item.id
//                     }
//                 })
//             };
//         },
//         cache: true
//     }
// });

// Create Client
$('body').on('click', '#btn-create-client', function() {
    //  Open Modal
    $('#modal-create').modal('show');
});

// Action create pickup
$('#clientStore').click(function(e) {
    e.preventDefault();

    // Define variable
    let kode     = $('#kode').val();
    let nama     = $('#nama').val();
    let token    = $("meta[name='csrf-token']").attr("content");


    $.ajax({
        url: `/client/post`,
        type: "POST",
        cache: false,
        data: {
            "kode": kode,
            "nama": nama,
            "_token": token
        },

        success:function(response) {
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                location.reload()
            });

            // // Data Pickup
            // let pickup = `
            // <tr id="index_${response.data.id}">
            //     <td>${response.data.tipe_id}</td>
            //     <td>${response.data.client_id}</td>
            //     <td>${response.data.jumlah}</td>
            //     <td>${response.data.berat}</td>
            //     <td>${response.data.tanggal}</td>
            //     <td>${response.data.driver}</td>
            // </tr>
            // `;

            // // Append to table
            // $('#table-pickups').prepend(pickup);

            // // Clear form
            // $('#tipe').val();
            // $('#client').val();
            // $('#jumlah').val();
            // $('#berat').val();
            // $('#tanggal').val();
            // $('#driver').val();

            // Close modal
            $('#modal-create').modal('hide');
        },

        error:function(error) {
            if (error.responseJSON.tipe[0]) {
                // Show alert
                $('#alert-kode').removeClass('d-none');
                $('#alert-kode').addClass('d-block');

                // Add message to alert
                $('#alert-kode').html(error.responseJSON.kode[0]);
            }

            if(error.responseJSON.client[0]) {
                // Show alert
                $('#alert-nama').removeClass('d-none');
                $('#alert-nama').addClass('d-block');

                // Add message to alert
                $('#alert-nama').html(error.responseJSON.nama[0]);
            }
        }
    })
})

// Input Driver
$('body').on('click', '#btn-create-driver', function() {
    //  Open Modal
    $('#modal-create').modal('show');
});

$('#driverStore').click(function(e) {
    e.preventDefault();

    // Define variable
    let nama     = $('#nama').val();
    let token    = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: `/driver/store`,
        type: "POST",
        cache: false,
        data: {
            "nama": nama,
            "_token": token
        },

        success:function(response) {
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                location.reload()
            })

            $('#modal-create').modal('hide');
        },

        error:function(error) {
            if (error.responseJSON.nama[0]) {
                $('#alert-nama').removeClass('d-none');
                $('#alert-nama').addClass('d-block')
            }
        }
    });
})