<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="#">
        <img src="<?= URL ?>/Resources/icons/wc.png" id="logo" alt="logo">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU NAVBAR -->
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
                <a class="nav-link" id="item-menu" href="<?= URL ?>/">Home</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" id="item-menu" href="<?= URL ?>/about">Sobre</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" id="item-menu" href="<?= URL ?>/projects">Projetos</a>
            </li>
            
            <div class="btn-group">
                
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="bi bi-person-circle" id="icon-person"></i>
                </button>
                
                <?php if(!isset($_SESSION['user']) && empty($_SESSION['user'])){ ?>
                
                     <section class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?= URL ?>/register">Cadastro</a>
                        <a class="dropdown-item" href="<?= URL ?>/login">Login</a>
                    </section>
                
                <?php }else{ ?>
                
                    <section class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?= URL ?>/profile">Meu Perfil</a>
                        <a class="dropdown-item" href="<?= URL ?>/myprojects">Meus Projetos</a>
                        <a class="dropdown-item" href="<?= URL ?>/project/create">Criar Projeto</a>
                        <a class="dropdown-item" href="myfinancing">Meus Financiamentos</a>
                        <section class="dropdown-divider"></section>
                        <a class="dropdown-item" href="<?= URL ?>/logout">Sair</a>
                    </section>
                   
                <?php } ?>
                
            </div>
        </ul>
    </div>
</nav>
<!-- NAVBAR -->