<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-10">
        <h1 class="page-header">Atualizar Carro</h1>
    </div>


    <div class="col-lg-12">
        <form class="form-group" action="<?= base_url() ?>carro/salvar_atualizacao" method="post">
            <input type="hidden" id="idCarro" name="idCarro" value="<?= $carro[0]->idCarro; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo"
                       value="<?= $carro[0]->modelo; ?> " required>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano"
                               value="<?= $carro[0]->ano; ?> " required>

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="marca"
                               value="<?= $carro[0]->marca; ?> " required>

                    </div>
                </div>
            </div>

                <div style="text-align: right">
                    <button type="submit" class="btn btn-success">Enviar</button>
                    <button type="reset" class="btn btn-default">Cancelar</button>

        </form>

    </div>




</div>
</div>
</div>
</div>


