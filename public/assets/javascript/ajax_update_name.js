$('#form_update_name').submit(function (e) {
    e.preventDefault();

    var name = $('#name').val();
    var password = $('#password').val();

    $.ajax({
        url:'http://localhost/tasks-online/configuracoes/nome',
        method:'POST',
        data: {name: name, password: password},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            console.log(result);
            $('#gif-wrapper').hide();

            registerStatusMessageUpdateName(result);
        }
    });
});

function registerStatusMessageUpdateName(status)
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
            $('#register-success-text').html('Nome Atualizado com Sucesso!.');
            break;
    }
}