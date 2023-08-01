var app_url = 'http://localhost/tasks-online';

$('#form_delete_note').submit(function (e) {
    e.preventDefault();

    var note_id = $('#note_id').val();

    $.ajax({
        url:app_url+'/excluir-anotacao',
        method:'POST',
        data: {note_id: note_id},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            console.log(result);
            $('#gif-wrapper').hide();

            window.location.href = app_url+"/minhas-anotacoes";
        }
    });
});