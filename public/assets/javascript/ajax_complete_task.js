var app_url = 'http://localhost/tasks-online';

$('#form_complete_task').submit(function (e) {
    e.preventDefault();

    var task_id = $('#task_id').val();

    $.ajax({
        url:'http://localhost/tasks-online/concluir-tarefa',
        method:'POST',
        data: {task_id: task_id},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function(result) {
            console.log(result);
            $('#gif-wrapper').hide();

            window.location.href = app_url+"/minhas-tarefas";
        }
    });
});