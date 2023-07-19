<?php $this->layout('layout/template', ['title' => 'Login']) ?>
<div class="content-wrapper" style="height:300px;">
    <h1 class="title-site">Tasks Online</h1>
    <form action="{{url}}/usuarios/login" method="post">
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" placeholder="Seu e-mail...">
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" placeholder="Sua senha...">
        </div>
        <input type="hidden" name="csrf_token" value="{{data['csrf_token']}}">
        <input type="submit" value="Entrar">
        <p>Não possui uma conta? <a href="<?=APP_URL;?>/cadastro" class="link-cadastro">Cadastre-se</a></p>
    </form>
</div>