<?php $this->layout('layout/template_site', ['title' => 'Adicionar Tarefa']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="assets/images/to-do-list.png" width="25">
            <p>Adicionar Tarefa</p>
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
    <div class="form-add-task-wrapper" style="padding: 15px 15px;">
        <form action="<?=APP_URL?>/adicionar-tarefa" method="post" id="form_task">
            <div class="form-group">
                <label for="">Título da Tarefa:</label>
                <input type="text" name="title" id="task-title">
            </div>
            <div class="form-group">
                <label for="">Categoria da Tarefa:</label>
                <select name="category" id="task-category">
                    <option value="0">-</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?=$category->id?>"><?=$category->title?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tarefa Publica:</label>
                <select name="public" id="task-public">
                    <option value="0">-</option>
                    <option value="1">Sim</option>
                    <option value="2">Não</option>
                </select>
                <small>Tarefas públicas aparecem no seu perfil e podem ser visualizadas por outros usuários.</small>
            </div>
            <a href="{{url}}/tarefa/cadastro"><button class="btn-task" type="submit">Adicionar</button></a>
            <div id="gif-wrapper" style="width:100%; height:45px; margin-bottom:5px; display:none;">
            <img id="gif-item" src="http://localhost/tasks-online/public/assets/images/2.gif" width="45" style="margin:auto; display:block;">
            </div>
            <p id="register-success-text" style="display: none; font-weight:normal; font-size:17px !important; text-align:center;"></p>
        </form>
    </div>
</div>