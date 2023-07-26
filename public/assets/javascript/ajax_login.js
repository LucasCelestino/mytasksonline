var app_url = 'http://localhost/tasks-online';

$('#form_login_user').submit(function (e) {
    e.preventDefault();

    var email = $('#email').val();
    var password = $('#password').val();

    $.ajax({
        url:'http://localhost/tasks-online/login',
        method:'POST',
        data: {email: email, password: password},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            $('#gif-wrapper').hide();
            $('#password').val('');

            registerStatusMessageLogin(result);

            if(result == 2)
            {
                setTimeout(() => {
                    window.location.href = app_url;
                }, 2000);
            }
        }
    });
});

function registerStatusMessageLogin(status)
{
    switch (status) {
        case 0:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Nenhum usuário encontrado com o email informado.');
            break;

        case 1:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Senha incorreta, tente novamente.');
            break;

        case 2:
            $('#register-success-text').addClass('success-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Logado com sucesso! Você será redirecionado para a pagina principal.');
            break;
    }
}