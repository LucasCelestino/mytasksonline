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
<?=$this->section('content')?>
<script src="<?=JS_URL."/jquery.min.js"?>"></script>
<script src="<?=JS_URL."/ajax_login.js"?>"></script>
<script src="<?=JS_URL."/ajax_register.js"?>"></script>
<script src="<?=JS_URL."/configs.js"?>"></script>
</body>
</html>