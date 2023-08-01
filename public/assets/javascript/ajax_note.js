$('#form_note').submit(function (e) {
    e.preventDefault();

    var category = $('#note-category').val();
    var title = $('#note-title').val();
    var anotation_text = $('#anotation-text').val();
    var public = $('#note-public').val();

    $.ajax({
        url:'http://localhost/tasks-online/adicionar-anotacao',
        method:'POST',
        data: {title: title, category: category, anotation_text: anotation_text,public: public},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            console.log(result);
            $('#gif-wrapper').hide();
            $('#task-title').val('');

            registerStatusMessageNote(result);
        }
    });
});

function registerStatusMessageNote(status)
{
    switch (status) {
        case 0:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Você não possui mais tarefas ou anotações disponiveis para serem cadastradas.');
            break;

        case 1:
            $('#register-success-text').addClass('error-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Preencha todos os campos antes de inserir uma anotação.');
            break;

        case 2:
            $('#register-success-text').addClass('success-message');
            $('#register-success-text').show();
            $('#register-success-text').html('Anotação adicionada com sucesso!');
            break;
    }
}