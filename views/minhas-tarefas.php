<?php $this->layout('layout/template_site', ['title' => 'Minhas Tarefas']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px; padding-bottom:20px;">
    <header class="header-home">
        <div class="logo">
            <img src="<?=IMAGES_URL;?>/to-do-list.png" width="25">
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
            <p class="completed">Tarefas Concluidas: <?=$task_completed;?></p>
            <p class="progress">Tarefas em Andamento: <?=$task_in_progress;?></p>
            <p class="deleted">Tarefas Excluidas: <?=$task_deleted;?></p>
        </div>
        <?php if($available_tasks_notes->available != 0): ?>
            <p class="available-tasks">Tarefas Disponíveis: <?=$available_tasks_notes->available;?></p>
        <?php else: ?>
            <p class="available-tasks">Tarefas Disponíveis: 0</p>
        <?php endif; ?>
    </div>
    <div class="tasks-wrapper" style="max-height:400px !important; height:100% !important;">
            <?php foreach ($tasks as $task): ?>
            <div class="item">
                <div class="title">
                    <p><?=$task['title'] ?></p>
                    <p style="margin-bottom:10px;">Categoria: <?=$task[0]->title ?></p>
                    <div class="dates">
                        <p>Adicionado em: <?=$task['created_at'] ?></p>
                    </div>
                </div>
                <div class="actions">
                    <form action="<?=APP_URL?>/concluir-tarefa" method="post">
                    <input type="hidden" name="task_id" value="<?=$task['id']; ?>">
                    <button type="submit" style="background-color: #FFF;"><img src="<?=IMAGES_URL;?>/check.png" width="15"></button>
                    </form>
                    <form action="<?=APP_URL?>/excluir-tarefa" method="post">
                    <input type="hidden" name="task_id" value="<?=$task['id']; ?>">
                    <button type="submit" style="background-color: #FFF;"><img src="<?=IMAGES_URL;?>/trash.png" width="15"></button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</div>