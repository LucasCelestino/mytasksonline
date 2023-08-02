<?php $this->layout('layout/template_site', ['title' => 'Minhas Tarefas']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="<?=IMAGES_URL;?>/user-icon.png" width="25">
            <p style="margin-right:10px;">Pesquisa</p>
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
    <div class="users-wrapper" style="padding:15px; max-height:400px !important; height:100% !important;">
        <?php if(isset($users_search)): ?>
        <?php foreach ($users_search as $user): ?>
        <div class="item" style="margin-bottom: 19px; display:flex; align-items:center;">
            <div class="img" style="margin-right: 10px;">
                <?php if(isset($user['picture_url'])): ?>
                    <img src="<?=IMAGES_URL?>/<?=$user['picture_url'];?>" width="70" style="border-radius:50%;">
                <?php else: ?>
                    <div style="background-color: rgb(223, 223, 223) !important; width:70px; height:70px; border-radius:50%;"></div>
                <?php endif; ?>
            </div>
            <div class="infos">
                <p style="margin-bottom: 5px; font-size:15px; color:#6200EA; font-weight:bold;"><?=$user['name'];?> - Nível <?=$user[0]->actual_level;?></p>
                <!-- <p style="margin-bottom: 5px; font-size:13px; color:#6200EA;">Tarefas cadastradas: 3 | Anotações cadastradas: 3</p> -->
                <p style="font-size:13px;"><a href="<?=APP_URL?>/perfil?id=<?=$user['slug'];?>" style="text-decoration:none !important; color: rgb(167, 167, 167);">Acessar Perfil</a></p>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
            <p style="font-size:14px; color: rgb(167, 167, 167);">Nenhum usuário encontrado com o nome informado.</p>
        <?php endif; ?>
    </div>
</div>