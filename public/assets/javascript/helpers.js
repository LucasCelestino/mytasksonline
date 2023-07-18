function registerStatusMessage(status)
{
    switch (result) {
        case 0:
            $('#register-success-text').show();
            $('#register-success-text').html('As senhas não conferem, tente novamente.');
            break;

        case 1:
            $('#register-success-text').show();
            $('#register-success-text').html('A senha precisa ter no mínimo 6 caracteres.');
            break;

        case 2:
            $('#register-success-text').show();
            $('#register-success-text').html('Conta criada com sucesso!');
            break;

        case 2:
            $('#register-success-text').show();
            $('#register-success-text').html('Conta criada com sucesso!');
            break;
    }
}

function cleanInput()
{
    $('#name').html('');
    $('#email').html('');
    $('#password').html('');
    $('#confirm_password').html('');
}