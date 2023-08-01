<?php $this->layout('layout/template_site', ['title' => 'Minhas Anotações']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px; padding-bottom:20px;">
    <header class="header-home">
    <div class="logo">
            <img src="<?=IMAGES_URL;?>/to-do-list.png" width="25">
            <p style="margin-right:10px;">Minhas Anotações</p>
            <div id="gif-wrapper" style="height:25px; display:none;">
            <img id="gif-item" src="http://localhost/tasks-online/public/assets/images/2.gif" width="30" style="margin:auto; display:block;">
            </div>
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
            <p class="completed">Total de Anotações Cadastradas: <?=$note_total;?></p>
            <p class="deleted">Tarefas Excluidas: <?=$note_deleted;?></p>
        </div>
        <?php if($available_tasks_notes->available != 0): ?>
            <p class="available-tasks">Anotações Disponíveis: <?=$available_tasks_notes->available;?></p>
        <?php else: ?>
            <p class="available-tasks">Anotações Disponíveis: 0</p>
        <?php endif; ?>
    </div>
    <div class="tasks-wrapper" style="max-height:400px !important; height:100% !important;">
        <?php if(isset($notes) && !empty($notes)): ?>
        <?php foreach ($notes as $note): ?>
        <div class="item">
            <div class="title">
                <p><?=$note['title'] ?></p>
                <div class="category-item">
                    <p style="margin-bottom:10px;">Categoria: <?=$note[0]->title ?></p>
                </div>
                <div class="dates">
                    <p>Adicionado em: <?=$note['created_at'] ?></p>
                </div>
            </div>
            <div class="actions" style="display:flex;">
                <a href="<?=APP_URL?>/anotacao/<?=$note['id']?>" style="margin-right:10px;" class="btn-task">Exibir</a>
                <form action="<?=APP_URL?>/excluir-anotacao" id="form_delete_note" method="post">
                    <input type="hidden" name="note_id" id="note_id" value="<?=$note['id']; ?>">
                    <button type="submit" style="background-color: #d82b00;">Excluir</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif;?>
    </div>
</div>