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
                    <input type="email"  name="email" value="<?= $this->view->userForm['email'] ?>" maxlength="50" class="form-control" autocomplete="off" required placeholder="exemplo@email.com">
                </div> 
            </div>
        </div>

        <div class="form-group">
            <label>Pessoa</label>
            <select name="person" class="form-control" onchange="typePerson(this)" >
                <option value="CPF">Pessoa Física</option>
                <option value="CNPJ">Pessoa Jurídica</option>
            </select>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" maxlength="15" onkeyup="maskPhone(this)" name="phone" value="<?= $this->view->userForm['phone'] ?>" class="form-control" autocomplete="off" required placeholder="(99)99999-9999">
                </div>
            </div>

            <div class="col" id="div-cpf">
                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" id="cpf" name="cpf" onkeyup="maskCpf(this)" value="<?= $this->view->userForm['cpf'] ?>" class="form-control" autocomplete="off" required placeholder="000.000.000-00">
                </div>
            </div>

            <div class="col" id="div-cnpj" hidden>
                <div class="form-group">
                    <label>CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj" onkeyup="maskCnpj(this)" value="<?= $this->view->userForm['cnpj'] ?>" class="form-control" autocomplete="off" placeholder="XX.XXX.XXX/XXXX-XX">
                </div>
            </div>

        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Senha</label>
                    <input id="password" type="password" name="password" value="<?= $this->view->userForm['password'] ?>" class="form-control" autocomplete="off" required placeholder="*******">
                </div> 
            </div>

            <div class="col">
                <div class="form-group">
                    <label>Repetir Senha</label>
                    <input id="repeatPassword" type="password"  name="repeatPassword" value="<?= $this->view->userForm['repeatPassword'] ?>" class="form-control" autocomplete="off" required placeholder="*******">
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