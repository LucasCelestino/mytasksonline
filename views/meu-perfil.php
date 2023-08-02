<?php $this->layout('layout/template_site', ['title' => 'Meu Perfil']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px; padding-bottom:20px;">
    <header class="header-home">
        <div class="logo">
            <img src="<?=IMAGES_URL;?>/user-icon.png" width="25">
            <p>Meu Perfil</p>
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
    <div class="profile-wrapper">
        <div class="header">
            <div class="img" style="background-image:url(<?=IMAGES_URL."/".$user->picture_url;?>);">
            </div>
            <div class="nivel" style="margin-bottom: 10px;"><?=$user->name;?></div>
            <div class="nivel" style="margin-bottom: 10px;">Nível <?=$level_system->actual_level;?></div>
        </div>
        <div class="content" style="padding:0 15px;">
            <div class="tasks">
                <h2>Últimas Tarefas</h2>
                <div class="wrapper">
                    <?php if(isset($tasks)): ?>
                        <?php foreach ($tasks as $task): ?>
                    <div class="item">
                        <p><?=$task->title;?></p>
                        <div class="tasks-status-wrapper">
                            <?php if($task->status == 0): ?>
                                <p class="progress">Em andamento</p>
                            <?php elseif($task->status == 1): ?>
                                <p class="completed">Completa</p>
                            <?php elseif($task->status == 2): ?>
                                <p class="deleted">Deletada</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <p style="font-size:13px; color:#636363;">Sem novas tarefas cadastradas</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="notes">
                <h2>Últimas Anotações</h2>
                <div class="wrapper">
                    <?php if(isset($notes)): ?>
                    <?php foreach ($notes as $note): ?>
                            <div class="item">
                                <p><a href="<?=APP_URL?>/anotacao/<?=$note->id;?>"><?=$note->title;?></a></p>
                                <p>Adicionado em: <?=date('d/m/Y', strtotime($note->created_at));?></p>
                            </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <p style="font-size:13px; color:#636363;">Sem novas anotações cadastradas</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>