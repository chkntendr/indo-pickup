// // Simpan pickup
// // function simpan() {
// //     console.log("Test")
// // }



// // // // Select tujuan
// // // $('document').ready(function() {
// // //     $('#tujuan').select2({
// // //         ajax: {
// // //             headers: {
// // //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// // //             },
// // //             url: '/home/tujuan',
// // //             dataType: 'JSON',
// // //             delay: 250,
// // //             processResults: function(data) {
// // //                 return {
// // //                     results: $.map(data, function (item) {
// // //                         return {
// // //                             text: item.tujuan,
// // //                             id: item.tujuan
// // //                         }
// // //                     })
// // //                 }
// // //             },
// // //             cache: true
// // //         }
// // //     })
// // // })



// // 



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







// function inputForm() {
//     $('#inputForm').toggle()
// }

// // function showReportForm() {
// //     $('#form').toggle()
// // }

// // function newPickup() {
// //     $('#newPickup').toggle()
// // }



// // function deleteDriver() {
// //     $('body').on('click', '#btn-delete-driver', function(e) {
// //         e.preventDefault();

// //         let driver_id = $(this).data('id');
// //         let token = $("meta[name='csrf-token']").attr("content");

// //         Swal.fire({
// //             title: 'Data akan dihapus secara permanen!',
// //             text: 'Lanjutkan?',
// //             icon: 'warning',
// //             showCancelButton: true,
// //             cancelButtonText: 'Tidak',
// //             confirmButtonText: 'Ya',
// //         }).then((result) => {
// //             if (result.isConfirmed) {
// //                 $.ajax({
// //                     url: `/driver/delete/${driver_id}`,
// //                     type: 'DELETE',
// //                     cache: false,
// //                     data: {
// //                         "_token": token
// //                     },
// //                     success: function(response) {
// //                         Swal.fire({
// //                             type: 'success',
// //                             icon: 'success',
// //                             title: `${ response.message }`,
// //                             showConfirmButton: false,
// //                             timer: 1500
// //                         });
    
// //                         $(`#tr_${driver_id}`).remove();
// //                     }
// //                 })
// //             }
// //         })
// //     })
// // }









// // // Edit Pickup
// // $('body').on('click', '#btn-edit-pickup[data-id]', function (e) {
// //     var id = $(this).data('id');

// //     $(function () {
// //         $.ajaxSetup({
// //             headers: {
// //                 'X-CSRF-TOKEN': '{{csrf_token()}}'
// //             }
// //         });
    
// //         $('#pickupTable').on('click', 'tbody td:not(:first-child)', function (e) {
// //             editor.inline(this);
// //         });
// //     })
// // })



// // function deletePickup() {
// //     let pickup_id   = $(this).data('id');
// //     let token       = $("meta[name='csrf-token']").attr("content");

// //     console.log([
// //         pickup_id,
// //         token
// //     ])

// //     // Swal.fire({
// //     //     title: "Data akan dihapus secara permanen!",
// //     //     text: "Lanjutkan?",
// //     //     icon: 'warning',
// //     //     showCancelButton: true,
// //     //     cancelButtonText: "Tidak",
// //     //     confirmButtonText: "Ya"
// //     // }).then((result) => {
// //     //     if (result.isConfirmed) {
// //     //         $.ajax({
// //     //             url: `/home/delete/${pickup_id}`,
// //     //             type: "DELETE",
// //     //             cache: false,
// //     //             data: {
// //     //                 "_token": token
// //     //             },
// //     //             success:function(response) {
// //     //                 Swal.fire({
// //     //                     type: 'success',
// //     //                     icon: 'success',
// //     //                     title: `${ response.message }`,
// //     //                     showConfirmButton: false,
// //     //                     timer: 1000
// //     //                 });

// //     //                 $(`#tr_${pickup_id}`).remove();
// //     //             }
// //     //         })
// //     //     }
// //     // })
// // }

// // // Upload modal
// // $('body').on('click', '#open-upload-modal', function (event) {
// //     event.preventDefault();
// //     $('#modal-upload').modal('show');
// //     $('body').on('click', '#modal-close', function() {
// //         $('#modal-upload').modal('hide');
// //     })
// // });

// // // Create Client
// // $('body').on('click', '#btn-create-client', function() {
// //     //  Open Modal
// //     $('#create-client').modal('show');

// //     // Close Modal
// //     $('body').on('click', '#close-modal-client', function() {
// //         $('#create-client').modal('hide');
// //     })
// // });

// // // Create User
// // $('body').on('click', '#btn-create-user', function(e) {
// //     e.preventDefault();

// //     // Open Modal
// //     $('#create-user').modal('show');

// //     // Close Modal
// //     $('body').on('click', '#close-modal-user', function(e) {
// //         e.preventDefault();
// //         $('#create-user').modal('hide');
// //     })

// //     $('body').on('click', '#user-store', function(e) {
// //         e.preventDefault();

// //         var nama     = $('#nama').val();
// //         var email    = $('#email').val();
// //         var password = $('#password').val();
// //         var status   = $('#status').val();
// //         let token    = $("meta[name='csrf-token']").attr("content");

// //         console.log(nama, email, password, status, token)

// //         $.ajax({
// //             url: `/users/post`,
// //             type: "POST",
// //             cache: false,
// //             data: {
// //                 "nama": nama,
// //                 "email": email,
// //                 "password": password,
// //                 "status": status,
// //                 "_token": token
// //             },

// //             success:function(response) {
// //                 // Swal.fire({
// //                 //     type: 'success',
// //                 //     icon: 'success',
// //                 //     title: `${response.message}`,
// //                 //     showConfirmButton: false,
// //                 //     timer: 1500,
// //                 // }).then((result)=>{
// //                 //     location.reload()
// //                 // });
// //                 console.log(data)
// //             },

// //             // error:function(error) {
// //             //     if (error.responseJSON.nama[0]) {
// //             //         // Show Alert
// //             //         $('#alert-nama').removeClass('d-none');
// //             //         $('#alert-nama').addClass('d-block', 'show');
// //             //     }
// //             // }
// //         })
// //     })
// // })

// // // Input Driver
// // $('body').on('click', '#btn-create-driver', function() {
// //     //  Open Modal
// //     $('#modal-create').modal('show');
// // });

// // $('body').on('click', '#close-modal', function() {
// //     // Close modal
// //     $('#modal-create').modal('hide');
// // });

// // $('#driverStore').click(function(e) {
// //     e.preventDefault();

// //     // Define variable
// //     let nama     = $('#nama').val();
// //     let token    = $("meta[name='csrf-token']").attr("content");

// //     $.ajax({
// //         url: `/driver/post`,
// //         type: "POST",
// //         cache: false,
// //         data: {
// //             "nama": nama,
// //             "_token": token
// //         },

// //         success:function(response) {
// //             Swal.fire({
// //                 type: 'success',
// //                 icon: 'success',
// //                 title: `${response.message}`,
// //                 showConfirmButton: false,
// //                 timer: 1500
// //             }).then((result) => {
// //                 location.reload()
// //             })

// //             $('#modal-create').modal('hide');
// //         },

// //         error:function(error) {
// //             if (error.responseJSON.name[0]) {
// //                 $('#alert-nama').removeClass('d-none');
// //                 $('#alert-nama').addClass('d-block')
// //             }
// //         }
// //     });
// // })

// // $('#barangStore').click(function(e) {
// //     e.preventDefault();

// //     // Define variable
// //     let tipe     = $('#tipe').val();
// //     let token    = $("meta[name='csrf-token']").attr("content");

// //     $.ajax({
// //         url: `/barang/post`,
// //         type: "POST",
// //         cache: false,
// //         data: {
// //             "tipe": tipe,
// //             "_token": token
// //         },

// //         success:function(response) {
// //             Swal.fire({
// //                 type: 'success',
// //                 icon: 'success',
// //                 title: `${response.message}`,
// //                 showConfirmButton: false,
// //                 timer: 1500
// //             }).then((result) => {
// //                 location.reload()
// //             })

// //             $('#modal-create').modal('hide');
// //         },

// //         error:function(error) {
// //             if (error.responseJSON.name[0]) {
// //                 $('#alert-tipe').removeClass('d-none');
// //                 $('#alert-tipe').addClass('d-block')
// //             }
// //         }
// //     });
// // })



// // function getInputValue() {
// //     var keyword = document.getElementById("cari-pickup").value;
// //     var token   = $("meta[name='csrf-token']").attr("content");
// //     console.log(keyword)

// //     $.ajax({
// //         url: `/home/search`,
// //         method: "POST",
// //         cache: false,
// //         data: {
// //             "keyword":  keyword,
// //             "_token": token
// //         }
// //     })
// // }