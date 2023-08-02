$('#form_update_password').submit(function (e) {
    e.preventDefault();

    var newPassword = $('#new_password').val();
    var password = $('#password').val();

    $.ajax({
        url:app_url+'/configuracoes/senha',
        method:'POST',
        data: {new_password: newPassword, password: password},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            console.log(result);
            $('#gif-wrapper').hide();

            registerStatusMessageUpdatePassword(result);
        }
    });
});

function registerStatusMessageUpdatePassword(status)
{
    switch (status) {
        case 0:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Senha incorreta, tente novamente.');
            break;

        case 1:
            $('#register-success-text').addClass('success-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Senha Atualizada com Sucesso!.');
            break;
    }
}