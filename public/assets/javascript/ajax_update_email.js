$('#form_update_email').submit(function (e) {
    e.preventDefault();

    var email = $('#email').val();
    var password = $('#password').val();

    $.ajax({
        url:'http://localhost/tasks-online/configuracoes/email',
        method:'POST',
        data: {email: email, password: password},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            console.log(result);
            $('#gif-wrapper').hide();

            registerStatusMessageUpdateEmail(result);
        }
    });
});

function registerStatusMessageUpdateEmail(status)
{
    switch (status) {
        case 0:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('O email informado já está em uso.');
            break;

        case 1:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Senha incorreta, tente novamente.');
            break;

        case 2:
            $('#register-success-text').addClass('success-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Email Atualizado com Sucesso!.');
            break;
    }
}