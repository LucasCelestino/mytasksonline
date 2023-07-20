<?php $this->layout('layout/template_site', ['title' => 'Home']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home" style="padding: 1px 0 !important;">
        <div class="logo">
            <p></p>
        </div>
        <div class="menu">
            <ul style="display: flex;">
                <a href="/profile"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Meu Perfil</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Minhas Tarefas</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Anotações</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Configurações</li></a>
                <a href="<?=APP_URL?>/loggout"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Sair</li></a>
            </ul>
        </div>
    </header>
    <div class="welcome-wrapper" style="padding: 15px 15px;">
        <p>Bem-vindo, Lucas Celestino.</p>
        <p>De começo você possui um total de 3 tarefas e anotações (somadas) disponiveis para serem cadastradas.</p>
        <p>Ao concluir tarefas e anotações você ganha experiência que te ajuda a subir de nível.</p>
        <p>A cada 5 níveis você ganha mais 2 tarefas e anotações (somadas).</p>
        <p>Para saber quantas tarefas ou anotações disponiveis você possui, basta acessar "Minhas Tarefas" ou "Minhas Anotações" no menu.</p>
        <a href="<?=APP_URL?>/perfil?id=<?=$_SESSION['user_auth']->slug;?>"><button class="btn-task">Fechar</button></a>
    </div>
</div>