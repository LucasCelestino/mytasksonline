<?php $this->layout('layout/template_site', ['title' => 'Minhas Anotações']) ?>
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