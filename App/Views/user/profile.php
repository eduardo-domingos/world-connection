<div class="container">
    
    <div class="row">
        
        <div class="col perfil-card">
        
            <div class="text-center"> 
                <div class="row">
                    <div class="col">
                        <picture>
                            <i class="bi bi-person-fill perfil-icon"></i>
                        </picture>
                    </div>
                </div>
            </div>

            <form action="<?= URL ?>/profile/edit" method="POST">

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nome de Usuário</label>
                            <input type="text" name="name" value="<?= $this->view->userProfile['name'] ?>" class="form-control" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col">
                        <div class="form-group">
                            <label>Número</label>
                            <input type="tel" name="phone" value="<?= $this->view->userProfile['phone'] ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" value="<?= $this->view->userProfile['email'] ?>" class="form-control" autocomplete="off">
                        </div> 
                    </div>

                </div>

                <div class="form-row">

                    <div class="col">
                        <div class="form-group">
                            <?php if($this->view->userProfile['typePerson']  === "CPF"){ ?>
                                <label>CPF</label>
                            <?php }else{ ?>
                                <label>CNPJ</label>
                            <?php } ?>
                            <input type="text" name="cpfCnpj" value="<?= $this->view->userProfile['cpfCnpj'] ?>" class="form-control" autocomplete="off" readonly>
                        </div>
                    </div>

                </div>

                <div class="form-row">

                    <div class="col">
                        <div class="form-group">
                            <label>Nova Senha</label>
                            <input id="senha" type="password" name="password" class="form-control" autocomplete="off">
                        </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Repetir Nova Senha</label>
                            <input type="password" name="repeatPassword" class="form-control" autocomplete="off" oninput="validaSenha(this)">
                        </div> 
                    </div>

                </div>

                <div class="form-row">

                    <div class="col">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    
        <div class="col perfil-sub-card">
            <form action="<?= URL ?>/profile/delete" method="POST">
                <div class="form-row">
                    <div class="col">
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger">Deletar Conta</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        
    </div>
</div>