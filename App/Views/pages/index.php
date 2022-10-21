<div class="text-center">
    <div class="card-carousel">

        <div id="meu_slideshow" class="carousel slide carousel-fade" data-ride="carousel" style="text-align:center;">

            <!-- indicadores -->
            <ol class="carousel-indicators">
                <li data-target="#meu_slideshow" data-slide-to="0" class="ative"></li>
                <li data-target="#meu_slideshow" data-slide-to="1"></li>
                <li data-target="#meu_slideshow" data-slide-to="2"></li>
            </ol>

            <!-- conteudo = imagens -->
            <div class="carousel-inner">

                <!-- Imagem 1 -->
                <div class="carousel-item active">
                    <img class="card-img-top img-fluid" src="<?= URL ?>/Resources/img/pesquisa.jpg"  alt="investimento">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="text-shadow:  black 0.1em 0.1em 0.2em;">Crie sua Startup</h5>
                        <p style="text-shadow:  black 0.1em 0.1em 0.2em;">Crie o futuro do seu projeto</p>
                    </div>
                </div>
                

                <!-- Imagem 2 -->
                <div class="carousel-item">
                    <img  class="card-img-top img-fluid " src="<?= URL ?>/Resources/img/desenvolvimento.jpg"  alt="financiamento">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="text-shadow:  black 0.1em 0.1em 0.2em;">Financie um projeto</h5>
                        <p style="text-shadow:  black 0.1em 0.1em 0.2em;"> E se torne parte dele</p>
                    </div>
                </div>
                

                <!-- Imagem 3 -->
                <div class="carousel-item">
                    <img class="card-img-top img-fluid" src="<?= URL ?>/Resources/img/anotações.jpg"   alt="organização">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="text-shadow:  black 0.1em 0.1em 0.2em;">O sucesso do projeto</h5>
                        <p style="text-shadow:  black 0.1em 0.1em 0.2em;">Alavanca um futuro próspero</p>
                    </div>
                </div>

            </div>

            <!-- Voltar -->
            <a class="carousel-control-prev" href="#meu_slideshow" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Anterior</span>
            </a>

            <!-- Pr[oximo -->
            <a class="carousel-control-next" href="#meu_slideshow" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Posterior</span>
            </a>
        </div>
    </div>
</div>

<div class="text-center">
    <div class="card-video">
        <video class="size-video" controls>
            <source src="<?= URL ?>/Resources/video/Final.mp4" type="video/mp4">
        </video>
    </div>
</div>