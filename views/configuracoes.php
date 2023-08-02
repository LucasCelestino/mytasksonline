<?php $this->layout('layout/template_site', ['title' => 'Configurações']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="<?=IMAGES_URL;?>/settings.png" width="25">
            <p>Configurações</p>
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
    <div class="configuration-wrapper" style="padding: 15px 15px;">
        <div class="itens-wrapper">
            <a href="<?=APP_URL?>/configuracoes/nome"><button>Atualizar Nome</button></a>
            <a href="<?=APP_URL?>/configuracoes/email"><button>Atualizar Email</button></a>
            <a href="<?=APP_URL?>/configuracoes/senha"><button>Atualizar Senha</button></a>
            <a href="<?=APP_URL?>/configuracoes/foto"><button>Atualizar Foto</button></a>
        </div>
    </div>
</div>