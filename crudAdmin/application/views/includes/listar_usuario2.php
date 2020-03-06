
<h1>
    Usuarios
    <small>Control panel</small>
</h1>

<!-- Main content -->

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">

                <div class="col-md-2 pull-right">
                    <a class="btn btn-primary btn-block" href="<?= base_url() ?>usuario/cadastro">Novo Usuário</a>
                </div>
            </div>


            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">

                    <div class="col-md-12 pull-right">
                        <table class="table table-condensed">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Nivel</th>

                                <th>Status</th>
                                <th>Ações</th>


                            </tr>
                            <?php foreach ($usuarios as $usu) { ?>
                                <tr>
                                    <td><?= $usu->idUsuario; ?></td>
                                    <td><?= $usu->nome; ?></td>
                                    <td><?= $usu->cpf; ?></td>
                                    <td><?= $usu->email; ?></td>
                                    <td><?= $usu->endereco; ?></td>
                                    <td><?= $usu->nivel == 1 ? 'Administrador' : 'Usuario'; ?></td>

                                    <td><?= $usu->status == 1 ? 'Ativo' : 'Inativo'; ?></td>
                                    <td><a href="<?= base_url('usuario/atualizar/' . $usu->idUsuario) ?>"
                                           class="btn btn-primary">Editar</a>
                                        <a href="<?= base_url('usuario/excluir/' . $usu->idUsuario) ?>" class="btn btn-danger"
                                           onclick="return confirm('Deseja realmente excluir o usuário');">Deletar</a></td>

                                </tr>
                            <?php } ?>
                        </table>

                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="<?= base_url('usuario/pag/' . ($value - $reg_p_pag)) ?>" aria-label="Anterior"
                                       style="<?= $btnA ?>">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <?php
                                $n_pag = 1;
                                for ($i = 1; $i <= $qtd_botoes; $i++) { ?>
                                    <li><a href="<?= base_url('usuario/pag/' . $n_pag) ?>"> <?= $i ?></a></li>
                                    <?php
                                    $n_pag += $reg_p_pag;
                                } ?>


                                <li>
                                    <a href="<?= base_url('usuario/pag/' . ($value + $reg_p_pag)) ?>" aria-label="Proximo"
                                       style="<?= $btnP ?>">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
                <!-- /.box-body -->


            </form>
        </div>
        <!-- /.box -->


        </section>


    </div>
