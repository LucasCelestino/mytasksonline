$('#form_task').submit(function (e) {
    e.preventDefault();

    var title = $('#task-title').val();
    var category = $('#task-category').val();
    var public = $('#task-public').val();

    $.ajax({
        url:'http://localhost/tasks-online/adicionar-tarefa',
        method:'POST',
        data: {title: title, category: category, public: public},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            console.log(result);
            $('#gif-wrapper').hide();
            $('#task-title').val('');

            registerStatusMessageTask(result);
        }
    });
});

function registerStatusMessageTask(status)
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

        case 3:
            $('#register-success-text').addClass('success-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Tarefa adicionada com sucesso!.');
            break;
    }
}