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