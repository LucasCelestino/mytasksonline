<?php $this->layout('layout/template_site', ['title' => 'Atualizar Senha']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="assets/images/to-do-list.png" width="25">
            <p>Atualizar Senha</p>
        </div>
        <div class="menu">
            <ul style="display: flex;">
                <a href="/profile"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Meu Perfil</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Minhas Tarefas</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Anotações</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Configurações</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Sair</li></a>
            </ul>
        </div>
    </header>
    <div class="form-update-configuration-wrapper" style="padding: 15px 15px;">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Nova Senha:</label>
                <input type="text" >
            </div>
            <div class="form-group">
                <label for="">Senha Atual:</label>
                <input type="password">
            </div>
            <a href="{{url}}/tarefa/cadastro"><button class="btn-task" type="submit">Atualizar</button></a>
        </form>
    </div>
</div>