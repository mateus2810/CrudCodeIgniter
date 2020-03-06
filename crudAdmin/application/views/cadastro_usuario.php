<h1>
    Cadastro de Usuarios
    <small>Control panel</small>
</h1>

<!-- Main content -->

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">


    <div class="col-lg-12">
        <form class="form-group" action="<?= base_url() ?>usuario/cadastrar" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="endereco"
                               required>

                    </div>
                </div>

                <div class="col-md-2">
                    <label for="status">Nivel</label>
                    <select id="status" class="form-control" name="nivel" required>
                        <option value="0"> ---</option>
                        <option value="1"> Administrador</option>
                        <option value="2"> Usuario</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="email" name="email"
                               placeholder="email" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"
                               required>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status" required>
                        <option value="0"> ---</option>
                        <option value="1"> Ativo</option>
                        <option value="2"> Inativo</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="cidade">Cidades</label>
                    <select id="cidade" class="form-control" name="cidade" required>
                        <option value="0"> ---</option>
                        <?php foreach ($cidades as $cidade) { ?>

                            <option value="<?= $cidade->idCidade ?>"> <?= $cidade->nome_cidade; ?></option>
                        <?php } ?>

                    </select>

                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="datanascimento">Data de Nascimento</label>
                            <input type="text" class="form-control" id="datanascimento" name="datanascimento"
                                   placeholder="__/__/____" required>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>
                                <input type="checkbox" value="1" name="funcao"id="checkbox" onchange="verificarCampo()">
                                Possui função extra?
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Digite a função extra."
                                   name="descricao_funcao" style="display:none" id="text">
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
