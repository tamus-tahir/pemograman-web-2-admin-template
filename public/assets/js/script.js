$('#form').parsley({
    errorClass: 'is-invalid text-red',
    successClass: 'is-valid',
    errorsWrapper: '<span class="invalid-feedback"></span>',
    errorTemplate: '<span></span>',
    trigger: 'change'
});

// ===== sweetalert2 =====
// ===== alert success =====
let flashSuccess = $('.flash-success').data('flashdata')

if (flashSuccess) {
    Swal.fire({
        // position: 'top-end',
        icon: 'success',
        title: 'Success',
        text: flashSuccess,
        showConfirmButton: false,
        timer: 2000
    })
}

// ===== alert error =====
let flashError = $('.flash-error').data('flashdata')

if (flashError) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: flashError,
    })
}
// ===== end sweetalert2 =====

// =====  preview image before upload =====
$('#upload').on('change', function (event) {
    $('#preview').attr('src', URL.createObjectURL(event.target.files[0]))
})
// ===== end preview image before upload =====