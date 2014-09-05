<h1>Area restrita</h1>
<?php //echo $this->message; ?>

<div class="formLogin">
    <form id="loginForm" action="<?php echo SITE_PATH ?>adm-login" method="post">
        <label>Login</label>
        <input type="text" name="login" value="" /><br/>
        <label>Senha</label>
        <input type="password" name="senha" value="" /><br/>

        <button type="submit" class="submit">Enviar</button>

        <div class="formMessage"></div>
    </form>
</div>