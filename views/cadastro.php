<?php $this->layout('layout/template', ['title' => 'Cadastro']) ?>
<div class="content-wrapper" style="padding: 20px 35px;">
    <p>Cadastro</p>
    <form action="<?=APP_URL?>/cadastro" method="post" enctype="multipart/form-data" id="form_register_user">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" id="name" placeholder="Seu nome..." style="margin-bottom: 15px;">
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" id="email" placeholder="Seu e-mail..." style="margin-bottom: 15px;">
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" id="password" placeholder="Sua senha..." style="margin-bottom: 15px;">
        </div>
        <div class="form-group">
            <label>Confirme sua senha</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Sua senha..." style="margin-bottom: 15px;">
        </div>
        <input type="hidden" name="csrf_token" value="<?=$csrf_token;?>">
        <input type="submit" value="Cadastrar" id="submit_button">
        <p>Já possui uma conta? <a href="<?=APP_URL?>/login" class="link-cadastro">Log in</a></p>
        <div id="gif-wrapper" style="width:100%; height:45px; margin-bottom:5px; display:none;">
            <img id="gif-item" src="http://localhost/tasks-online/public/assets/images/2.gif" width="45" style="margin:auto; display:block;">
        </div>
        <p id="register-success-text" style="display: none; font-weight:normal; font-size:17px !important;"></p>
    </form>
</div>
