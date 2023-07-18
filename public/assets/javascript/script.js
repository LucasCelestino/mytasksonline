$('#form_register_user').submit(function (e) {
    e.preventDefault();

    $('#register-success-text').html('');

    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var confirmPassword = $('#confirm_password').val();
    var photo = $('#user_photo').val();

    $.ajax({
        url:'http://localhost/tasks-online/cadastro',
        method:'POST',
        data: {name: name, email: email, password: password},
        dataType: 'json',
        beforeSend: function(error) {
            $('#gif-wrapper').show();
            console.log(error);
        },
        success: function() {
            $('#gif-wrapper').hide();
            $('#register-success-text').show();
            $('#register-success-text').html('Usuário inserido com sucesso!');
        }
    });
});