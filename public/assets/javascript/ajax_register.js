$('#form_register_user').submit(function (e) {
    e.preventDefault();

    $('#register-success-text').html('');

    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var confirmPassword = $('#confirm_password').val();
    var photo = $('#user_photo').val();

    $.ajax({
        url:app_url+'/cadastro',
        method:'POST',
        data: {name: name, email: email, password: password, confirmPassword: confirmPassword},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            cleanInput();
            registerStatusMessage(result);

            $('#gif-wrapper').hide();
        }
    });
});

function registerStatusMessage(status)
{
    switch (status) {
        case 0:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('As senhas não conferem, tente novamente.');
            break;

        case 1:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('A senha precisa ter no mínimo 6 caracteres.');
            break;

        case 2:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('O email informado já esta cadastrado.');
            break;

        case 3:
            $('#register-success-text').addClass('success-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Conta criada com sucesso!');
            break;
    }
}

function cleanInput()
{
    $('#name').val('');
    $('#email').val('');
    $('#password').val('');
    $('#confirm_password').val('');
}