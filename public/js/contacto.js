$('#form-contacto').submit(function(event) {
    event.preventDefault();
    var email = $('#email').val();

    grecaptcha.ready(function() {
        grecaptcha.execute(cSK, {action: 'contact_form'}).then(function(token) {
            $('#form-contacto').prepend('<input type="hidden" name="token" value="' + token + '">');
            $('#form-contacto').prepend('<input type="hidden" name="action" value="contact_form">');
            $('#form-contacto').unbind('submit').submit();
        });;
    });
});