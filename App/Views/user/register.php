<div class="container" id="cadastro">

    <div id="cadastro_logo">
        <picture>
            <img src="<?= URL ?>/Resources/icons/logo_wc.png" alt="logo">
        </picture>
    </div>

    <form action="<?= URL ?>/register" method="POST">
    
        <input type="hidden" name="token" value="<?= \App\Core\Csrf::generateToken() ?>">

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text"  name="name" value="<?= $this->view->userForm['name'] ?>" class="form-control <?= $this->view->userForm['name_error'] ? 'is-invalid' : '' ?>" placeholder="Nome Completo">

                    <div class="invalid-feedback">
                        <?= $this->view->userForm['name_error'] ?>
                    </div>

                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text"  name="email" value="<?= $this->view->userForm['email'] ?>" class="form-control <?= $this->view->userForm['email_error'] ? 'is-invalid' : '' ?>" placeholder="exemplo@email.com">

                    <div class="invalid-feedback">
                        <?= $this->view->userForm['email_error'] ?>
                    </div>

                </div> 
            </div>
        </div>

        <div class="form-group">
            <label>Pessoa</label>
            <select name="person" class="form-control" onchange="typePerson(this)" >
                <option value="CPF" <?= $this->view->userForm['typePerson'] === "CPF" ? "selected" : " " ?> >Pessoa Física</option>
                <option value="CNPJ" <?= $this->view->userForm['typePerson'] === "CNPJ" ? "selected" : " " ?> >Pessoa Jurídica</option>
            </select>
        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" maxlength="15" onkeyup="maskPhone(this)" name="phone" value="<?= $this->view->userForm['phone'] ?>" class="form-control <?= $this->view->userForm['phone_error'] ? 'is-invalid' : '' ?>" placeholder="(99)99999-9999">

                    <div class="invalid-feedback">
                        <?= $this->view->userForm['phone_error'] ?>
                    </div>

                </div>
            </div>

            <div class="col" id="div-cpf" <?= $this->view->userForm['typePerson'] === "CPF" || empty($this->view->userForm['typePerson']) ? "" : "hidden" ?>>
                <div class="form-group">
                    <label>CPF</label>
                    <input type="text" id="cpf" name="cpf" onkeyup="maskCpf(this)" value="<?= $this->view->userForm['cpf'] ?>" class="form-control <?= $this->view->userForm['cpf_error'] ? 'is-invalid' : '' ?>" placeholder="000.000.000-00">

                    <div class="invalid-feedback">
                        <?= $this->view->userForm['cpf_error'] ?>
                    </div>

                </div>
            </div>

            <div class="col" id="div-cnpj" <?= $this->view->userForm['typePerson'] === "CNPJ" ? "" : "hidden" ?>>
                <div class="form-group">
                    <label>CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj" onkeyup="maskCnpj(this)" value="<?= $this->view->userForm['cnpj'] ?>" class="form-control <?= $this->view->userForm['cnpj_error'] ? 'is-invalid' : '' ?>" placeholder="XX.XXX.XXX/XXXX-XX">

                    <div class="invalid-feedback">
                        <?= $this->view->userForm['cnpj_error'] ?>
                    </div>

                </div>
            </div>

        </div>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Senha</label>
                    <input id="password" type="password" name="password" value="<?= $this->view->userForm['password'] ?>" class="form-control <?= $this->view->userForm['password_error'] ? 'is-invalid' : '' ?>"  placeholder="*******">

                    <div class="invalid-feedback">
                        <?= $this->view->userForm['password_error'] ?>
                    </div>

                </div> 
            </div>

            <div class="col">
                <div class="form-group">
                    <label>Repetir Senha</label>
                    <input id="repeatPassword" type="password"  name="repeatPassword" value="<?= $this->view->userForm['repeatPassword'] ?>" class="form-control <?= $this->view->userForm['repeatPassword_error'] ? 'is-invalid' : '' ?>" placeholder="*******">

                    <div class="invalid-feedback">
                        <?= $this->view->userForm['repeatPassword_error'] ?>
                    </div>

                </div> 
            </div>
        </div>

        <div class="text-right">
            <button name="Cadastrar" value="Cadastrar" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        
    </form>
</div>