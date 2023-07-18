<?php $this->layout('layout/template', ['title' => 'Minhas Anotações']) ?>
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
<div class="content-wrapper-home" style="margin-bottom: 20px; padding-bottom:20px;">
    <header class="header-home">
        <div class="logo">
            <img src="assets/images/to-do-list.png" width="25">
            <p>Minhas Anotações</p>
        </div>
        <div class="menu">
            <ul style="display: flex;">
            <a href="profile"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Feed</li></a>
                <a href="profile"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Meu Perfil</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Minhas Tarefas</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Anotações</li></a>
                <a href="#"><li style="padding: 0 5px; color:#6200EA; font-size:13px; font-weight:bold;">Sair</li></a>
            </ul>
        </div>
    </header>
    <div class="tasks-status-wrapper">
        <div class="status">
            <p class="completed">Total de Anotações Cadastradas: 0</p>
        </div>
        <p class="available-tasks">Anotações Disponíveis: 5</p>
    </div>
    <div class="tasks-wrapper" style="max-height:400px !important; height:100% !important;">
        <div class="item">
            <div class="title">
                <p>A história dos computadores</p>
                <div class="category-item">
                    <p>Categoria: Trabalho</p>
                </div>
                <div class="dates">
                    <p>Adicionado em: 20/05/2023</p>
                </div>
            </div>
            <div class="actions">
                <a href="#" class="btn-task">Exibir</a>
            </div>
        </div>
        <div class="item">
            <div class="title">
                <p>A história dos computadores</p>
                <div class="category-item">
                    <p>Categoria: Trabalho</p>
                </div>
                <div class="dates">
                    <p>Adicionado em: 20/05/2023</p>
                </div>
            </div>
            <div class="actions">
                <a href="#" class="btn-task">Exibir</a>
            </div>
        </div>
        <div class="item">
            <div class="title">
                <p>A história dos computadores</p>
                <div class="category-item">
                    <p>Categoria: Trabalho</p>
                </div>
                <div class="dates">
                    <p>Adicionado em: 20/05/2023</p>
                </div>
            </div>
            <div class="actions">
                <a href="#" class="btn-task">Exibir</a>
            </div>
        </div>
    </div>
</div>
</div>