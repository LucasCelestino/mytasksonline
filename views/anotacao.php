<?php $this->layout('layout/template_site', ['title' => 'Tasks Online - '.$note->title]) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px; padding-bottom:20px;">
    <header class="header-home">
    <div class="logo">
            <img src="<?=IMAGES_URL;?>/to-do-list.png" width="25">
            <p style="margin-right:10px;"><?=$note->title;?></p>
            <a href="<?=APP_URL?>/minhas-anotacoes" style="text-decoration:none; font-size:13px;">Voltar</a>
            <div id="gif-wrapper" style="height:25px; display:none;">
            <img id="gif-item" src="http://localhost/tasks-online/public/assets/images/2.gif" width="30" style="margin:auto; display:block;">
            </div>
        </div>
        <div class="menu">
            <ul style="display: flex;">
                <a href="<?=APP_URL?>/perfil?id=<?=$_SESSION['user_auth']->slug;?>"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Meu Perfil</li></a>
                <a href="<?=APP_URL?>/minhas-tarefas"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Minhas Tarefas</li></a>
                <a href="<?=APP_URL?>/minhas-anotacoes"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Minhas Anotações</li></a>
                <a href="<?=APP_URL?>/configuracoes"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Configurações</li></a>
                <a href="<?=APP_URL?>/sair"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Sair</li></a>
            </ul>
        </div>
    </header>
    <div class="tasks-wrapper" style="max-height:500px !important; height:100% !important;">
        <div class="item">
            <div class="content">
                <p style="font-size:13px; margin-bottom:10px;"><?=$note->note_text;?></p>
                <div class="category-item">
                    <p style="margin-bottom:10px; font-size:13px; font-weight:bold;">Categoria: <?=$category->title;?></p>
                </div>
                <div class="dates">
                    <p style="font-size:12px; font-weight:bold;">Adicionado em: <?=date('d/m/Y', strtotime($note->created_at));?></p>
                </div>
            </div>
        </div>
    </div>
</div>