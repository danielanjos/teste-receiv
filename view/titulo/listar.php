<?php include __DIR__ . '/../cabecalho.php'; ?>

<h2 class="mt-3 text-center"><?= $titulo ?></h2>

<table class="table table-striped table-bordered table-sm mt-2 w-100" id="tabelaListaEquipamentos">
  <thead class="thead-dark text-center">
    <th>Tipo</th>
    <th>Cliente</th>
    <th>Descrição</th>
    <th>Valor</th>
    <th>Geração</th>
    <th>Vencimento</th>
    <th colspan="2">Ações</th>
  </thead>
  <tbody>
    <?php
    foreach ($tituloList as $titulo) :
    ?>
      <tr>
        <td>
          <?= $titulo->tiposTitulo->getDescricao() ?>
        </td>
        <td>
          <?= $titulo->cliente->getNome() ?>
        </td>
        <td>
          <?= $titulo->getDescricao() ?>
        </td>
        <td>
          <?= $titulo->getValor() ?>
        </td>
        <td>
          <?= $titulo->getDtCriacao()->format("d/m/Y") ?>
        </td>
        <td>
          <?= $titulo->getDtVencimento()->format("d/m/Y") ?>
        </td>
        <td class="text-center"><a class="text-primary" title="Editar" href="#"><i class="fas fa-edit"></i></a></td>
        <td class="text-center"><a class="text-danger" title="Remover" href="#"><i class="far fa-trash-alt"></i></a></td>
      </tr>
    <?php
    endforeach;
    ?>
  </tbody>
</table>

<?php include __DIR__ . '/../rodape.php'; ?>