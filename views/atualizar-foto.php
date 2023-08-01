<?php $this->layout('layout/template_site', ['title' => 'Atualizar Foto']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="assets/images/to-do-list.png" width="25">
            <p>Atualizar Foto</p>
        </div>
        <div class="menu">
            <ul style="display: flex;">
                <a href="<?=APP_URL?>/perfil?id=<?=$_SESSION['user_auth']->slug;?>"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Meu Perfil</li></a>
                <a href="<?=APP_URL?>/minhas-tarefas"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Minhas Tarefas</li></a>
                <a href="<?=APP_URL?>/minhas-anotacoes"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Anotações</li></a>
                <a href="<?=APP_URL?>/configuracoes"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Configurações</li></a>
                <a href="<?=APP_URL?>/loggout"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Sair</li></a>
            </ul>
        </div>
    </header>
    <div class="form-update-configuration-wrapper" style="padding: 15px 15px;">
        <form action="<?=APP_URL?>/configuracoes/foto" method="post" id="form_update_photo" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Escolha sua nova foto de perfil:</label>
                <input type="file" name="user_photo" id="user_photo">
                <small>Formatos permitidos: JPG,PNG,JPEG</small>
            </div>
            <div class="form-group">
                <label for="">Confirme sua senha:</label>
                <input type="password" name="password" id="password">
            </div>
            <div style="display: flex; align-items:center;">
            <button class="btn-task" type="submit">Atualizar</button>
            <?php if(isset($status)): ?>
                <?php if($status == "error-password"): ?>
                <p id="register-success-text" style="font-weight:normal; font-size:17px !important; margin-left:5px; color:#d82b00;">Senha incorreta, tente novamente.</p>
                <?php elseif($status == "success"): ?>
                    <p id="register-success-text" style="font-weight:normal; font-size:17px !important; margin-left:5px; color:#3baf79;">Foto atualizada com sucesso.</p>
                <?php endif; ?>
            <?php endif; ?>
            </div>
        </form>
    </div>
</div>