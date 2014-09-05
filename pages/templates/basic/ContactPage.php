<form id="contactForm" action="<?php echo SITE_PATH ?>contato" method="post">
    <label>Nome</label><br/>
    <input type="text" name="name" value="<?php echo $this->name ?>" /><br/>
    <label>E-mail</label><br/>
    <input type="text" name="email" value="<?php echo $this->email ?>" /><br/>
    <label>Telefone</label><br/>
    <input type="text" name="tel" value="<?php echo $this->tel ?>" /><br/>
    <textarea name="msg"><?php echo $this->msg ?></textarea><br/>
    <button type="submit">Enviar</button>

    <div class="formMessage"></div>
</form>