<div class="col-sm-5 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="col-md-10">
        <h1 class="page-header">Usuarios</h1>
    </div>

    <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="<?= base_url() ?>usuario/cadastro">Novo Usuário</a>
    </div>

    <div class="col-md-12" style="padding-bottom: 12px">
        <form class="form-group" action="<?= base_url() ?>usuario/pesquisar" method="post">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" class="form-control" name="pesquisar" placeholder="Pesquisar..." required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </div>
            </div>
        </form>

    </div>

    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nivel</th>
                <!--  <th>Cidade</th>-->
                <th>Status</th>
                <th>Ações</th>


            </tr>
            <?php foreach ($usuarios as $usu) { ?>
                <tr>
                    <td><?= $usu->idUsuario; ?></td>
                    <td><?= $usu->nome; ?></td>
                    <td><?= $usu->email; ?></td>
                    <td><?= $usu->nivel == 1 ? 'Administrador' : 'Usuario'; ?></td>
                    <!-- <td><? /*= $usu->nome_cidade; */ ?></td>-->
                    <td><?= $usu->status == 1 ? 'Ativo' : 'Inativo'; ?></td>
                    <td><a href="<?= base_url('usuario/atualizar/' . $usu->idUsuario) ?>"
                           class="btn btn-primary btn-group">Editar</a>
                        <a href="<?= base_url('usuario/excluir/' . $usu->idUsuario) ?>" class="btn btn-danger btn-group"
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
</div>
</div>

