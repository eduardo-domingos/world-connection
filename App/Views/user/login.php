<div class="container" id="login">

    <div id="login_logo">
        <picture>
            <img src="<?= URL ?>/Resources/icons/logo_wc.png" id="img_login" alt="logo">
        </picture>
    </div>

    <form action="<?= URL ?>/autentication" method="POST">
        
        <div class="form-group">
            <label>Usuário</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" class="form-control" placeholder="Senha" autocomplete="off" required>
        </div>
        
        <?php if($this->view->login === "error"){ ?>
            <div class="text-center">
                <span class="text text-danger">* Email ou Senha inválido(s)</span>
            </div>
        <?php } ?>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
        
    </form>
</div>

<div class="text-center">
    <small>Você não possuí cadastro? Clique <a href="<?= URL ?>/register">aqui</a></small>
</div>
