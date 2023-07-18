<?php $this->layout('layout/template', ['title' => 'Home']) ?>
<div class="main-container-content">
<div style="margin-bottom:50px;">
    <form action="" method="get">
        <div class="form-group" style="display: flex;">
            <input class="search_input" type="text" name="" id="" placeholder="Pesquisar Usuário...">
            <button style="border: none; background-color:#6200EA; display:flex;"><img src="assets/images/search.png"></button>
        </div>
    </form>
</div>
<div class="add-task-wrapper">
    <a href="{{url}}/tarefa/cadastro"><button class="btn-task" style="margin-right: 10px;">Adicionar Tarefa</button></a>
    <a href="{{url}}/tarefa/cadastro"><button class="btn-task">Adicionar Anotação</button></a>
    <div style="background-image:url('assets/images/ee48d3d2-bf27-49bf-8b0d-ac2f41206be0.jpg'); background-size:cover; margin-left:10px; width: 35px; height:35px; border-radius:50%;"></div>
    <p style="margin-left: 5px; color:#FFF;">Lucas Celestino</p>
    <p style="margin-left: 5px; color:#FFF; font-weight:bold;">Nível 0</p>
</div>
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
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Sair</li></a>
            </ul>
        </div>
    </header>
    <div class="welcome-wrapper" style="padding: 15px 15px;">
        <p>Bem-vindo, Lucas Celestino.</p>
        <p>De começo você possui um total de 3 tarefas e anotações (somadas) disponiveis para serem cadastradas.</p>
        <p>Ao concluir tarefas e anotações você ganha experiência que te ajuda a subir de nível.</p>
        <p>A cada 5 níveis você ganha mais 2 tarefas e anotações (somadas).</p>
        <p>Para saber quantas tarefas ou anotações disponiveis você possui, basta acessar "Minhas Tarefas" ou "Minhas Anotações" no menu.</p>
        <button class="btn-task">Fechar</button>
    </div>
</div>
</div>