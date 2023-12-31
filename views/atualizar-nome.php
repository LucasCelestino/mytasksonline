<?php $this->layout('layout/template_site', ['title' => 'Tasks Online - Atualizar Nome']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="<?=IMAGES_URL;?>/settings.png" width="25">
            <p>Atualizar Nome</p>
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
    <div class="form-update-configuration-wrapper" style="padding: 15px 15px;">
        <form action="<?=APP_URL;?>/configuracoes/nome" method="post" id="form_update_name">
            <div class="form-group">
                <label for="">Novo Nome:</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="">Confirme sua senha:</label>
                <input type="password" name="password" id="password">
            </div>
            <div style="display:flex; align-items:center;">
            <button class="btn-task" type="submit">Atualizar</button>
            <div id="gif-wrapper" style="width:100%; height:45px; margin-bottom:5px; display:none;">
            <img id="gif-item" src="http://localhost/tasks-online/public/assets/images/2.gif" width="35" style="margin-top:8px; margin-left:5px;">
            </div>
            <p id="register-success-text" style="display: none; font-weight:normal; font-size:17px !important; margin-left:5px;"></p>
            </div>
        </form>
    </div>
</div>