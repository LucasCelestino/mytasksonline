<?php $this->layout('layout/template_site', ['title' => 'Adicionar Anotação']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="<?=IMAGES_URL;?>/to-do-list.png" width="25">
            <p>Adicionar Anotação</p>
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
    <div class="form-add-task-wrapper" style="padding: 15px 15px;">
        <form action="<?=APP_URL?>/adicionar-anotacao" method="post" id="form_note">
            <div class="form-group">
                <label for="">Título da Anotação:</label>
                <input type="text" name="note-title" id="note-title">
            </div>
            <div class="form-group">
                <label for="">Categoria da Anotação:</label>
                <select name="note-category" id="note-category">
                    <option value="0">-</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?=$category->id?>"><?=$category->title?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Anotação:</label>
                <textarea name="anotation-text" id="anotation-text" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Anotação Publica:</label>
                <select name="note-public" id="note-public">
                    <option value="0">-</option>
                    <option value="1">Sim</option>
                    <option value="2">Não</option>
                </select>
                <small>Anotações públicas aparecem no seu perfil e podem ser visualizadas por outros usuários.</small>
            </div>
            <button class="btn-task" type="submit">Adicionar</button>
            <div id="gif-wrapper" style="width:100%; height:45px; margin-bottom:5px; display:none;">
            <img id="gif-item" src="http://localhost/tasks-online/public/assets/images/2.gif" width="45" style="margin:auto; display:block;">
            </div>
            <p id="register-success-text" style="display: none; font-weight:normal; font-size:17px !important; text-align:center;"></p>
        </form>
    </div>
</div>