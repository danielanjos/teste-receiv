<?php include __DIR__ . '/../cabecalho.php'; ?>

<h2 class="mt-3 text-center"><?= $titulo ?></h2>

<table class="table table-striped table-bordered table-sm mt-2 w-100" id="tabelaListaEquipamentos">
  <thead class="thead-dark text-center">
    <th>Pessoa</th>
    <th>Nome</th>
    <th>CPF/CNPJ</th>
    <th>Nascimento/Criação</th>
    <th colspan="2">Ações</th>
  </thead>
  <tbody>
    <?php
    foreach ($clienteList as $cliente) :
    ?>
      <tr>
        <td>
          <?= $cliente->tiposPessoa->getDescricao() ?>
        </td>
        <td>
          <?= $cliente->getNome() ?>
        </td>
        <td>
          <?= $cliente->getCpf_cnpjFormatados() ?>
        </td>
        <td>
          <?= $cliente->getDtNascimento()->format("d/m/Y") ?>
        </td>
        <td class="text-center"><a class="text-primary" title="Editar" href="/clientes/cadastro?id=<?=$cliente->GetId()?>"><i class="fas fa-edit"></i></a></td>
        <td class="text-center"><a class="text-danger" title="Remover" href="/clientes/remover?id=<?=$cliente->getId()?>"><i class="far fa-trash-alt"></i></a></td>
      </tr>
    <?php
    endforeach;
    ?>
  </tbody>
</table>

<?php include __DIR__ . '/../rodape.php'; ?>