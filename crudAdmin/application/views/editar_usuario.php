<h1>
    Editar Usuario
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
        <form class="form-group" action="<?= base_url() ?>usuario/salvar_atualizacao" method="post">
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->idUsuario; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
                       value="<?= $usuario[0]->nome; ?> " required>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF"
                               value="<?= $usuario[0]->cpf; ?> " required>

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="endereco"
                               value="<?= $usuario[0]->endereco; ?> " required>

                    </div>
                </div>

                <div class="col-md-2">
                    <label for="status">Nivel</label>
                    <select id="status" class="form-control" name="nivel" required>
                        <option value="0"> ---</option>
                        <option value="1" <?= $usuario[0]->nivel == 1 ? 'selected ' : ''; ?>> Administrador</option>
                        <option value="2" <?= $usuario[0]->nivel == 2 ? 'selected ' : ''; ?>> Usuario</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="email" name="email"
                               placeholder="email" value="<?= $usuario[0]->email; ?> " required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="button" class="btn btn-default btn-block" value="Atualizar senha"
                               data-toggle="modal" data-target="#myModal">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status" required>
                        <option value="0"> ---</option>
                        <option value="1" <?= $usuario[0]->status == 1 ? ' selected ' : ''; ?>> Ativo</option>
                        <option value="2" <?= $usuario[0]->status == 2 ? ' selected ' : ''; ?>> Inativo</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="cidade">Cidades</label>
                    <select id="cidade" class="form-control" name="cidade" required>
                        <option value="0"> ---</option>

                        <?php
                        foreach ($cidades as $cidade) {
                            if ($cidade->idCidade == $usuario[0]->cidade_idCidade) {
                                ?>

                                <option value="<?= $cidade->idCidade ?>" selected> <?= $cidade->nome_cidade; ?></option>
                            <?php } else { ?>
                                <option value="<?= $cidade->idCidade ?>"> <?= $cidade->nome_cidade; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="datanascimento">Data de Nascimento</label>
                            <input type="text" class="form-control" id="datanascimento" name="datanascimento"
                                   value="<?= date('d/m/Y', strtotime($usuario[0]->dataNascimento)); ?> "
                                   placeholder="__/__/____" required>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" value="1" name="funcao" id="checkbox"
                                   onchange="verificarCampo()"<?= $usuario[0]->funcao == 1 ? 'checked' : ''; ?>>
                            Possui função extra?
                        </label>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Digite a função extra."
                               name="descricao_funcao" id="text"
                               value="<?= $usuario[0]->descricao_funcao ?>" <?= !$usuario[0]->funcao == 1?'style="display:none" ':''; ?>>
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>usuario/salvar_senha" method="post">
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $usuario[0]->idUsuario; ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Atualizar Senha</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="senha_antiga">Senha antiga:</label>
                            <input type="password" name="senha_antiga" id="senha_antiga" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="senha_nova">Nova senha:</label>
                            <input type="password" name="senha_nova" id="senha_nova" onkeyup="checarSenha()"
                                   class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="senha_confirmar">Confirmar Senha:</label>
                            <input type="password" name="senha_confirmar" id="senha_confirmar" onkeyup="checarSenha()"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div id="divcheck">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="enviarsenha" disabled>Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        $("#senha_nova").keyup(checkPasswordMatch);
        $("#senha_confirmar").keyup(checkPasswordMatch);
    });

    function checarSenha() {
        var password = $("#senha_nova").val();
        var confirmPassword = $("#senha_confirmar").val();

        if (password == '' || '' == confirmPassword) {
            $("#divcheck").html("<span style='color:red' > Campo de senha vazio</span>");
            document.getElementById("enviarsenha").disabled = false;
        } else if (password != confirmPassword) {
            $("#divcheck").html("<span style='color:red' > Senhas não conferem!</span>");
            document.getElementById("enviarsenha").disabled = True;
        } else {
            $("#divcheck").html("<span style='color:green' > Senhas iguais!</span>");
            document.getElementById("enviarsenha").disabled = false;
        }

    }
</script>


<script>
    function verificarCampo() {
        if ($("#checkbox").is(":checked")) {
            $("#text").css("display", "block");
        } else {
            $("#text").css("display", "none");
        }
    }
</script>
