function showError(field, message) {
    if(!message) {
        $('#' + field)
        .addClass('is-valid')
        .removeClass('is-invalid')
        .siblings('.invalid-feedback')
        .text('')
    } else {
        $('#' + field)
        .addClass('is-invalid')
        .removeClass('is-valid')
        .siblings('.invalid-feedback')
        .text(message)
    }
}

function removeValidationClass(form) {
    $(form).each(function() {
        $(form).find(':input').removeClass('is-valid is-invalid');
    })
}

function showMessage(type, message) {

    if(!type || type === '' || !message || message === ''){
        return;
    }

    return Swal.fire({
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 2000
    })

}