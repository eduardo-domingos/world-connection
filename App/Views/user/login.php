<div class="container" id="login">

    <div id="login_logo">
        <picture>
            <img src="<?= URL ?>/Resources/icons/logo_wc.png" id="img_login" alt="logo">
        </picture>
    </div>
    
    <?php if(!empty($this->view->userForm['login_error'])){ ?>
        <div class="alert alert-danger text-center mt-3">
            <?= $this->view->userForm['login_error'] ?>
        </div>
    <?php } ?>

    <form action="<?= URL ?>/login" method="POST">
        
        <div class="form-group">
            <label>Usuário</label>
            <input type="email" name="email" value="<?= $this->view->userForm['email'] ?>" class="form-control" placeholder="Email">
        </div>

        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" value="<?= $this->view->userForm['password'] ?>" class="form-control" placeholder="Senha">
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
        
    </form>
</div>

<div class="text-center">
    <small>Você não possuí cadastro? Clique <a href="<?= URL ?>/register">aqui</a></small>
</div>
