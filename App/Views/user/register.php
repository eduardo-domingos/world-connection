<div class="container" id="cadastro">

    <div id="cadastro_logo">
        <picture>
            <img src="<?= URL ?>/Resources/icons/logo_wc.png" alt="logo">
        </picture>
    </div>

    <form action="<?= URL ?>/register" method="POST">
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Nome de Usuário</label>
                    <input type="text"  name="name" value="<?= $this->view->userForm['name'] ?>" maxlength="50" class="form-control" autocomplete="off" required placeholder="Nome Completo">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email"  name="email" value="<?= $this->view->userForm['email'] ?>" maxlength="50" class="form-control" autocomplete="off" required placeholder="E-mail">
                </div> 
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Número</label>
                    <input type="tel" maxlength="15" name="phone" value="<?= $this->view->userForm['phone'] ?>" class="form-control" autocomplete="off" required placeholder="digite apenas números">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label>CPF/CNPJ</label>
                    <input type="text" maxlength="14" id="cpfCnpj" name="cpfCnpj" value="<?= $this->view->userForm['cpfCnpj'] ?>" class="form-control" autocomplete="off" required placeholder="digite apenas números">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Pessoa</label>
            <select name="typePerson" class="form-control" id="typePerson">
                <option value="CPF">Pessoa Física</option>
                <option value="CNPJ">Pessoa Jurídica</option>
            </select>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Senha</label>
                    <input id="password" type="password" name="password" value="<?= $this->view->userForm['password'] ?>" class="form-control" autocomplete="off" required placeholder="Senha">
                </div> 
            </div>

            <div class="col">
                <div class="form-group">
                    <label>Repetir Senha</label>
                    <input id="repeatPassword" type="password"  name="repeatPassword" value="<?= $this->view->userForm['repeatPassword'] ?>" class="form-control" autocomplete="off" required placeholder="Repetir Senha" oninput="validaSenha(this)">
                </div> 
            </div>
        </div>
        
        <?php if($this->view->registerError){ ?>
            <small class="format-text text-danger">
                Erro ao realizar o cadastro, favor verificar os campos a cima
            </small>
        <?php } ?>

        <div class="text-right">
            <button name="Cadastrar" value="Cadastrar" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        
    </form>
</div>