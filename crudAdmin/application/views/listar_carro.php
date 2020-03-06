<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-10">
        <h1 class="page-header">Carros</h1>
    </div>
    <div class="col-md-2">
        <a class="btn btn-primary btn-block" href="<?= base_url() ?>carro/cadastro">Novo Carro</a>
    </div>

    <div class="col-md-12" style="padding-bottom: 12px">
        <form class="form-group" action="<?= base_url() ?>carro/pesquisar" method="post">
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
                <th>Modelo</th>
                <th>Ano</th>
                <th>Marca</th>
                <th>Ações</th>


            </tr>
            <?php foreach ($carro as $car) { ?>
                <tr>
                    <td><?= $car->idCarro; ?></td>
                    <td><?= $car->modelo; ?></td>
                    <td><?= $car->ano; ?></td>
                    <td><?= $car->marca; ?></td>


                    <td><a href="<?= base_url('carro/atualizar/' . $car->idCarro) ?>"
                           class="btn btn-primary btn-group">Editar</a>
                        <a href="<?= base_url('carro/excluir/' . $car->idCarro) ?>" class="btn btn-danger btn-group"
                           onclick="return confirm('Deseja realmente excluir o veiculo');">Deletar</a></td>

                </tr>
            <?php } ?>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="<?= base_url('carro/pag/' . ($value - $reg_p_pag)) ?>" aria-label="Anterior"
                       style="<?= $btnA ?>">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                $n_pag = 1;
                for ($i = 1; $i <= $qtd_botoes; $i++) { ?>
                    <li><a href="<?= base_url('carro/pag/' . $n_pag) ?>"> <?= $i ?></a></li>
                    <?php
                    $n_pag += $reg_p_pag;
                } ?>


                <li>
                    <a href="<?= base_url('carro/pag/' . ($value + $reg_p_pag)) ?>" aria-label="Proximo"
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



