<?php $this->layout('layout/template_site', ['title' => 'Minhas Tarefas']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px; padding-bottom:20px;">
    <header class="header-home">
        <div class="logo">
            <img src="assets/images/to-do-list.png" width="25">
            <p>Minhas Tarefas</p>
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
    <div class="tasks-status-wrapper">
        <div class="status">
            <p class="completed">Tarefas Concluidas: 0</p>
            <p class="progress">Tarefas em Andamento: 0</p>
            <p class="deleted">Tarefas Excluidas: 0</p>
        </div>
        <p class="available-tasks">Tarefas Disponíveis: 5</p>
    </div>
    <div class="tasks-wrapper" style="max-height:400px !important; height:100% !important;">
            <div class="item">
                <div class="title">
                    <p>{{task.title}}</p>
                    <div class="dates">
                        <p>Adicionado em: {{task.created_at|date("d/m/Y")}}</p>
                    </div>
                </div>
                <div class="actions">
                    <a href="<?=APP_URL?>/tarefa/concluir/{{task.id}}"><img src="assets/images/check.png" width="15"></a>
                    <a href="<?=APP_URL?>/tarefa/excluir/{{task.id}}"><img src="assets/images/trash.png" width="15"></a>
                </div>
            </div>
    </div>
</div>