function showReportForm() {
    $('#form').toggle()
}

$('.livesearch').select2({
    placeholder: 'Pilih Client',
    ajax: {
        url: '/report/search',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function(item) {
                    $.ajax({
                        url: '/report/print',
                        dataType: 'json',
                        delay: 500,
                        data: {
                            "keyword": item.kode_client
                        },
                        success: function(response) {
                            console.log(response)
                        }
                    })

                    return {
                        text: item.client,
                        id: item.id
                    }
                }),
            }
        }
    },
    cache: false
})

function getDataPickup() {
    $.ajax({
        url: '/report/data',
        type: 'GET',
        cache: false,
        success: function(response) {
            console.log(response)

            const labels = [
                '2022',
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

function deleteMultiple() {
    $('#multiDelete').on('click', function() {
        var button   = $(this);
        var selected = [];
        var token    = $("meta[name='csrf-token']").attr("content");

        $('#datatable #check:checked').each(function() {
            selected.push($(this).val());
        });

        Swal.fire({
            icon: 'warning',
            title: 'Data akan dihapus!',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: "Ya"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/home/delete/multiple/${selected}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success: function(response) {
                        console.log(response)
                    }
                });
            }
        })
    })
}

function deleteDriver() {
    $('body').on('click', '#btn-delete-driver', function(e) {
        e.preventDefault();

        let driver_id = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Data akan dihapus secara permanen!',
            text: 'Lanjutkan?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/driver/delete/${driver_id}`,
                    type: 'DELETE',
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
    
                        $(`#tr_${driver_id}`).remove();
                    }
                })
            }
        })
    })
}

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

function deleteBarang() {
	$('body').on('click', function() {
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
}

// Delete Pickup
function deletePickup() {
    $('body').on('click', '#btn-delete-pickup', function (e) {
        e.preventDefault();

        let pickup_id   = $(this).data('id');
        let token       = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: "Data akan dihapus secara permanen!",
            text: "Lanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: "Tidak",
            confirmButtonText: "Ya"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/home/delete/${pickup_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response) {
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${ response.message }`,
                            showConfirmButton: false,
                            timer: 1000
                        });

                        $(`#tr_${pickup_id}`).remove();
                    }
                })
            }
        })
    })
}

// Delete Client
$('body').on('click', '#btn-delete-client', function() {
    let client_id = $(this).data('id');
    let token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: "Data akan dihapus secara permanen!",
        text: "Lanjutkan?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya"
    }).then((result) => {
        if (result.isConfirmed) {
            console.log("Delete client");

            $.ajax({
                url: `/client/hapus/${client_id}`,
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

                    $(`#tr_${client_id}`).remove();
                }
            })
        }
    })
})

// Upload modal
$('body').on('click', '#open-upload-modal', function (event) {
    event.preventDefault();
    $('#modal-upload').modal('show');
    $('body').on('click', '#modal-close', function() {
        $('#modal-upload').modal('hide');
    })
});

// Input pickup
$('body').on('click', '#btn-create-pickup', function() {
    //  Open Modal
    $('#modal-create').modal('show');
});

// Edit Pickup
$('body').on('click', '#btn-edit-pickup', function(e) {
    e.preventDefault();
    $('#btn-edit-pickup').attr("disabled", true);
    $('#modal-create').modal('show');
    var id = $(this).data('id');

    $.ajax({
        url: `/home/edit/${id}`,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            console.log(data)
        }
    });
});

// Create Client
$('body').on('click', '#btn-create-client', function() {
    //  Open Modal
    $('#create-client').modal('show');

    // Close Modal
    $('body').on('click', '#close-modal-client', function() {
        $('#create-client').modal('hide');
    })
});

// Create User
$('body').on('click', '#btn-create-user', function(e) {
    e.preventDefault();

    // Open Modal
    $('#create-user').modal('show');

    // Close Modal
    $('body').on('click', '#close-modal-user', function(e) {
        e.preventDefault();
        $('#create-user').modal('hide');
    })

    $('body').on('click', '#user-store', function(e) {
        e.preventDefault();

        var nama     = $('#nama').val();
        var email    = $('#email').val();
        var password = $('#password').val();
        var status   = $('#status').val();
        let token    = $("meta[name='csrf-token']").attr("content");

        console.log(nama, email, password, status, token)

        $.ajax({
            url: `/users/post`,
            type: "POST",
            cache: false,
            data: {
                "nama": nama,
                "email": email,
                "password": password,
                "status": status,
                "_token": token
            },

            success:function(response) {
                // Swal.fire({
                //     type: 'success',
                //     icon: 'success',
                //     title: `${response.message}`,
                //     showConfirmButton: false,
                //     timer: 1500,
                // }).then((result)=>{
                //     location.reload()
                // });
                console.log(data)
            },

            // error:function(error) {
            //     if (error.responseJSON.nama[0]) {
            //         // Show Alert
            //         $('#alert-nama').removeClass('d-none');
            //         $('#alert-nama').addClass('d-block', 'show');
            //     }
            // }
        })
    })
})

// Input Driver
$('body').on('click', '#btn-create-driver', function() {
    //  Open Modal
    $('#modal-create').modal('show');
});

$('body').on('click', '#close-modal', function() {
    // Close modal
    $('#modal-create').modal('hide');
});

$('#driverStore').click(function(e) {
    e.preventDefault();

    // Define variable
    let nama     = $('#nama').val();
    let token    = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: `/driver/post`,
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
            if (error.responseJSON.name[0]) {
                $('#alert-nama').removeClass('d-none');
                $('#alert-nama').addClass('d-block')
            }
        }
    });
})

// Tambah tipe barang
$('body').on('click', '#btn-open-create', function() {
    //  Open Modal
    $('#modal-create').modal('show');
});

$('body').on('click', '#close-modal', function() {
    // Close modal
    $('#modal-create').modal('hide');
});

$('#barangStore').click(function(e) {
    e.preventDefault();

    // Define variable
    let tipe     = $('#tipe').val();
    let token    = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: `/barang/post`,
        type: "POST",
        cache: false,
        data: {
            "tipe": tipe,
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
            if (error.responseJSON.name[0]) {
                $('#alert-tipe').removeClass('d-none');
                $('#alert-tipe').addClass('d-block')
            }
        }
    });
})



function getInputValue() {
    var keyword = document.getElementById("cari-pickup").value;
    var token   = $("meta[name='csrf-token']").attr("content");
    console.log(keyword)

    $.ajax({
        url: `/home/search`,
        method: "POST",
        cache: false,
        data: {
            "keyword":  keyword,
            "_token": token
        }
    })
}