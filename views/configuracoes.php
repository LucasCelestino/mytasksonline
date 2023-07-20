<?php $this->layout('layout/template_site', ['title' => 'Configurações']) ?>
<div class="content-wrapper-home" style="margin-bottom: 20px;">
    <header class="header-home">
        <div class="logo">
            <img src="assets/images/to-do-list.png" width="25">
            <p>Configurações</p>
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
    <div class="configuration-wrapper" style="padding: 15px 15px;">
        <div class="itens-wrapper">
            <button>Atualizar Nome</button>
            <button>Atualizar Email</button>
            <button>Atualizar Senha</button>
            <button>Atualizar Foto</button>
        </div>
    </div>
</div>