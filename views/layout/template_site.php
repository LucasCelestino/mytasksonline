<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="<?=CSS_URL."/reset.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."/login.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."/home.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."/layout.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."/add-task.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."/welcome.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."/configuration.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."/my-tasks.css"?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class="body-container">
<div class="main-container-content">
<div style="margin-bottom:50px;">
    <form action="" method="get">
        <div class="form-group" style="display: flex;">
            <input class="search_input" type="text" name="" id="" placeholder="Pesquisar Usuário...">
            <button style="border: none; background-color:#6200EA; display:flex;"><img src="assets/images/search.png"></button>
        </div>
    </form>
</div>
<div class="add-task-wrapper">
    <a href="{{url}}/tarefa/cadastro"><button class="btn-task" style="margin-right: 10px;">Adicionar Tarefa</button></a>
    <a href="{{url}}/tarefa/cadastro"><button class="btn-task">Adicionar Anotação</button></a>
    <div style="background-image:url('assets/images/ee48d3d2-bf27-49bf-8b0d-ac2f41206be0.jpg'); background-size:cover; margin-left:10px; width: 35px; height:35px; border-radius:50%;"></div>
    <p style="margin-left: 5px; color:#FFF;">Lucas Celestino</p>
    <p style="margin-left: 5px; color:#FFF; font-weight:bold;">Nível 0</p>
</div>
<?=$this->section('content')?>
</div>
<script src="<?=JS_URL."/jquery.min.js"?>"></script>
<script src="<?=JS_URL."/ajax_login.js"?>"></script>
<script src="<?=JS_URL."/ajax_register.js"?>"></script>
</body>
</html>