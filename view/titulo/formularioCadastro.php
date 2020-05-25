<?php include __DIR__ . '/../cabecalho.php'; ?>

<h2 class="mt-3 text-center"><?= $titulo ?></h2>

<!-- Cliente -->

<section class="formularioCadastro mt-3 w-50 mx-auto">
  <form action="/titulos/salvar-titulo" method="POST">
    <div class="form-row mb-2">
      <div class="col-md-6">
        <label for="tipo_titulo">Tipo Titulo</label>
        <select name="tipo_titulo" id="tipo_titulo" class="form-control custom-select">
          <?php
          foreach ($tiposTituloList as $tiposTitulo) :
          ?>
            <option value="<?= $tiposTitulo->getId() ?>"><?= $tiposTitulo->getDescricao() ?></option>
          <?php
          endforeach;
          ?>
        </select>
      </div>

      <div class="col-md-6">
        <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="number" name="cpf_cnpj" id="cpf_cnpj" class="form-control">
      </div>
    </div>


    <div class="form-row mb-2">
      <div class="col-md-6">
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" class="form-control" autocomplete="off">
      </div>
      <div class="col-md-6">
        <label for="valor">Valor</label>
        <input type="number" step="0.01" name="valor" id="valor" class="form-control" autocomplete="off">
      </div>
    </div>

    <div class="form-row mb-2">
      <div class="col-md-6">
        <label for="dtCriacao">Data de Criação</label>
        <input type="date" name="dtCriacao" id="dtCriacao" class="form-control">
      </div>
      <div class="col-md-6">
        <label for="dtVencimento">Data de Vencimento</label>
        <input type="date" name="dtVencimento" id="dtVencimento" class="form-control">
      </div>
    </div>

    <div class="form-row mb-2">
      <div class="col-md-6">
        <label for="status_titulo">Status do Titulo</label>
        <select name="status_titulo" id="status_titulo" class="form-control custom-select">
          <?php
          foreach ($statusTituloList as $statusTitulo) :
          ?>
            <option value="<?= $statusTitulo->getId() ?>"><?= $statusTitulo->getDescricao() ?></option>
          <?php
          endforeach;
          ?>
        </select>
      </div>
      <div class="col-md-6">
        <label for="dtQuitacao">Data de Quitação</label>
        <input type="date" name="dtQuitacao" id="dtQuitacao" class="form-control">
      </div>
    </div>


    <div class="form-row mb-2">
      <div class="col-md-4">
        <label for="valorPago">Valor Pago</label>
        <input type="number" step="0.01" name="valorPago" id="valorPago" class="form-control" autocomplete="off">
      </div>
      <div class="col-md-4">
        <label for="saldoDevedor">Saldo Devedor</label>
        <input type="number" step="0.01" name="saldoDevedor" id="valor" class="form-control" autocomplete="off">
      </div>
      <div class="col-md-4">
        <label for="moeda">Moeda</label>
        <select name="moeda" id="moeda" class="form-control custom-select">
          <?php
          foreach ($moedasList as $moedas) :
          ?>
            <option value="<?= $moedas->getId() ?>"><?= $moedas->getCodigo() ?></option>
          <?php
          endforeach;
          ?>
        </select>
      </div>
    </div>

    <div class="endereco form-row mb-2">
      <div class="col-md-6"></div>
      <div class="col-md-6">
        <button class="button">Salvar</button>
      </div>
    </div>


  </form>
</section>

<?php include __DIR__ . '/../rodape.php'; ?>