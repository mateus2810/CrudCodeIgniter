<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-10">
        <h1 class="page-header">Cadastro Carro</h1>
    </div>


    <div class="col-lg-12">
        <form class="form-group" action="<?= base_url() ?>carro/cadastrar" method="post">
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" required>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano" required>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca"
                               required>

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

<script>
    function verificarCampo() {
        if ($("#checkbox").is(":checked")) {
            $("#text").css("display", "block");
        } else {
            $("#text").css("display", "none");
        }
    }
</script>
