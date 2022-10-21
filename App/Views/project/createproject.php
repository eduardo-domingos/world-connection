<div class="container card-create-project">
    <form action="<?= URL ?>/project/create" method="POST" enctype="multipart/form-data">
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Titulo do Projeto</label>
                    <input type="text"  name="title" class="form-control" autocomplete="off" required placeholder="Nome do Projeto">
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Equipe</label>
                        <textarea class="form-control" name="team" rows="5"></textarea>
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Resumo</label>
                    <textarea class="form-control" name="summary" rows="5"></textarea>
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Localidade</label>
                    <input type="text"  name="locality" class="form-control" autocomplete="off" required placeholder="Localidade">
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Vídeo</label>
                    <input type="url"  name="video" class="form-control" autocomplete="off" placeholder="url do youtube">
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" class="form-control-file" name="photo">
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Valor de Financiamento</label>
                    <input type="text" name="price" class="form-control" autocomplete="off" required placeholder="dinheiro">
                </div>
            </div>
        </div>
        
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        
    </form>
</div>