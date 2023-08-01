<?php $this->layout('layout/template_site', ['title' => 'Meu Perfil']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px; padding-bottom:20px;">
    <header class="header-home">
        <div class="logo">
            <img src="assets/images/user-icon.png" width="25">
            <p>Meu Perfil</p>
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
    <div class="profile-wrapper">
        <div class="header">
            <div class="img" style="background-image:url(<?=IMAGES_URL."/".$_SESSION['user_auth']->picture_url;?>);">
            </div>
            <div class="nivel" style="margin-bottom: 10px;">Lucas Celestino</div>
            <div class="nivel" style="margin-bottom: 10px;">Nível 50</div>
        </div>
        <div class="content" style="padding:0 15px;">
            <div class="tasks">
                <h2>Últimas Tarefas</h2>
                <div class="wrapper">
                    <div class="item">
                        <p>Estudar para a prova da FATEC</p>
                        <div class="tasks-status-wrapper">
                            <p class="completed">Em andamento</p>
                        </div>
                    </div>
                    <div class="item">
                        <p>Estudar para a prova da FATEC</p>
                        <div class="tasks-status-wrapper">
                            <p class="progress">Em andamento</p>
                        </div>
                    </div>
                    <div class="item">
                        <p>Estudar para a prova da FATEC</p>
                        <div class="tasks-status-wrapper">
                            <p class="deleted">Em andamento</p>
                        </div>
                    </div>
                    <a href="#">Ver todas as tarefas</a>
                </div>
            </div>
            <div class="notes">
                <h2>Últimas Anotações</h2>
                <div class="wrapper">
                    <div class="item">
                        <p><a href="#">Resumo sobre a história dos computadores</a></p>
                        <p>Adicionado em: 25/08/2023</p>
                    </div>
                    <div class="item">
                        <p><a href="#">Resumo sobre a história dos computadores</a></p>
                        <p>Adicionado em: 25/08/2023</p>
                    </div><div class="item">
                        <p><a href="#">Resumo sobre a história dos computadores</a></p>
                        <p>Adicionado em: 25/08/2023</p>
                    </div>
                    <a href="#">Ver todas as anotações</a>
                </div>
            </div>
        </div>
    </div>
</div>