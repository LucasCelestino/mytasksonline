<?php $this->layout('layout/template_site', ['title' => 'Adicionar Tarefa']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="assets/images/to-do-list.png" width="25">
            <p>Adicionar Tarefa</p>
        </div>
        <div class="menu">
            <ul style="display: flex;">
            <a href="/profile"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Feed</li></a>
                <a href="/profile"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Meu Perfil</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Minhas Tarefas</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Anotações</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Sair</li></a>
            </ul>
        </div>
    </header>
    <div class="form-add-task-wrapper" style="padding: 15px 15px;">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Título da Tarefa:</label>
                <input type="text" >
            </div>
            <div class="form-group">
                <label for="">Categoria da Tarefa:</label>
                <select name="" id="">
                    <option value="0">-</option>
                    <option value="1">Casa</option>
                    <option value="1">Estudo</option>
                    <option value="1">Trabalho</option>
                    <option value="1">Pessoal</option>
                    <option value="1">Familia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tarefa Publica:</label>
                <select name="" id="">
                    <option value="0">-</option>
                    <option value="1">Sim</option>
                    <option value="2">Não</option>
                </select>
                <small>Tarefas públicas aparecem no seu perfil e podem ser visualizadas por outros usuários.</small>
            </div>
            <a href="{{url}}/tarefa/cadastro"><button class="btn-task" type="submit">Adicionar</button></a>
        </form>
    </div>
</div>