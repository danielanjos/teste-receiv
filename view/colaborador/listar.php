<?php include __DIR__ . '/../cabecalho.php'; ?>

<h2 class="mt-3 text-center"><?= $titulo ?></h2>

<table class="table table-striped table-bordered table-sm mt-2 w-100" id="tabelaListaEquipamentos">
    <thead class="thead-dark text-center">
        <th>Nome</th>
        <th>Login</th>
        <th>Email</th>
        <th colspan="2">Ações</th>
    </thead>
    <tbody>
        <?php
        foreach ($colaboradorList as $colaborador) :
        ?>
            <tr>
                <td>
                    <?= $colaborador->getNome() ?>
                </td>
                <td>
                    <?= $colaborador->getLogin() ?>
                </td>
                <td>
                    <?= $colaborador->getEmail() ?>
                </td>
                <td class="text-center"><a class="text-primary" title="Editar" href="/colaboradores/cadastro?id=<?=$colaborador->getId()?>"><i class="fas fa-edit"></i></a></td>
                <td class="text-center"><a class="text-danger" title="Remover" href="/colaboradores/remover?id=<?=$colaborador->getId()?>"><i class="far fa-trash-alt"></i></a></td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>

<?php include __DIR__ . '/../rodape.php'; ?>