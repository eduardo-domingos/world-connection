<div class="container card-create-project">
    <form action="<?= URL ?>/project/create" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="token" value="<?= \App\Core\Csrf::generateToken() ?>">
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Titulo do Projeto</label>
                    <input type="text"  name="title"  value="<?= $this->view->projectForm['projectName'] ?>" class="form-control <?= $this->view->projectForm['projectName_error'] ? 'is-invalid' : '' ?>"  placeholder="Nome do Projeto">

                    <div class="invalid-feedback">
                        <?= $this->view->projectForm['projectName_error'] ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Equipe</label>
                        <textarea class="form-control <?= $this->view->projectForm['team_error'] ? 'is-invalid' : '' ?>" name="team" rows="5"><?= $this->view->projectForm['team'] ?></textarea>

                    <div class="invalid-feedback">
                        <?= $this->view->projectForm['team_error'] ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Resumo</label>
                    <textarea class="form-control <?= $this->view->projectForm['summary_error'] ? 'is-invalid' : '' ?>" name="summary" rows="5"><?= $this->view->projectForm['summary'] ?></textarea>

                    <div class="invalid-feedback">
                        <?= $this->view->projectForm['summary_error'] ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Localidade</label>
                    <input type="text" name="locality" class="form-control <?= $this->view->projecForm['locality_error'] ? 'is-invalid' : '' ?>" placeholder="Localidade" value="<?= $this->view->projectForm['locality'] ?>">

                    <div class="invalid-feedback">
                        <?= $this->view->projectForm['locality_error'] ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Vídeo</label>
                    <input type="url"  name="video" class="form-control <?= $this->view->projecForm['video_error'] ? 'is-invalid' : '' ?>" placeholder="url do youtube" value="<?= $this->view->projectForm['video'] ?>">

                    <div class="invalid-feedback">
                        <?= $this->view->projectForm['video_error'] ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" class="form-control-file <?= $this->view->projecForm['video_error'] ? 'is-invalid' : '' ?>" name="photo" value="<?= $this->projecForm['photo'] ?>">

                    <div class="invalid-feedback">
                        <?= $this->view->projectForm['photo_error'] ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Valor de Financiamento</label>
                    <input type="text" name="price" class="form-control <?= $this->view->projecForm['price_error'] ? 'is-invalid' : '' ?>" placeholder="dinheiro" value="<?= $this->view->projecForm['price'] ?>">

                    <div class="invalid-feedback">
                        <?= $this->view->projectForm['price_error'] ?>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        
    </form>
</div>