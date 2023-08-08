<?php $this->layout('layout/template', ['title' => 'Tasks Online - Login']) ?>
<div class="content-wrapper" style="height:300px;">
    <h1 class="title-site">Tasks Online</h1>
    <form action="<?=APP_URL?>/login" method="post" id="form_login_user">
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" id="email" placeholder="Seu e-mail...">
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" id="password" placeholder="Sua senha...">
        </div>
        <!-- <input type="hidden" name="csrf_token" value="{{data['csrf_token']}}"> -->
        <input type="submit" value="Entrar" id="submit_button">
        <p>Não possui uma conta? <a href="<?=APP_URL;?>/cadastro" class="link-cadastro">Cadastre-se</a></p>
        <div id="gif-wrapper" style="width:100%; height:45px; margin-bottom:5px; display:none;">
            <img id="gif-item" src="http://localhost/tasks-online/public/assets/images/2.gif" width="45" style="margin:auto; display:block;">
        </div>
        <p id="register-success-text" style="display: none; font-weight:normal; font-size:17px !important;"></p>
    </form>
</div>