<?php include __DIR__ . '/../cabecalho.php'; ?>

<h2 class="mt-3 text-center"><?= $titulo ?></h2>

<!-- Cliente -->

<h5 class="mt-4 text-center">Informações Pessoais</h5>

<section class="formularioCadastro mt-3 w-50 mx-auto">
  <form action="/clientes/salvar-cliente" method="POST">
    <input type="hidden" name="id" value="<?=$cliente->GetId()?>">
    <input type="hidden" name="idEndereco1" value="<?php echo $cliente->getId() != null ? $cliente->getEnderecos()[0]->getId() : ""?>">
    <input type="hidden" name="idEndereco2" value="<?php echo $cliente->getId() != null ? $cliente->getEnderecos()[1]->getId() : ""?>">
    <div class="info-cliente form-row mb-2">
      <div class="col-md-6">
        <label for="tipo_pessoa">Pessoa</label>
        <select name="tipo_pessoa" id="tipo_pessoa" class="form-control custom-select">
          <?php
          foreach ($tiposPessoaList as $tiposPessoa) :
            $select = "";
            if($cliente->tiposPessoa->getId() == $tiposPessoa->getId()) $select = "selected";
          ?>
            <option <?=$select?> value="<?= $tiposPessoa->getId() ?>"><?= $tiposPessoa->getDescricao() ?></option>
          <?php
          endforeach;
          ?>
        </select>
      </div>

      <div class="col-md-6">
        <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="number" name="cpf_cnpj" id="cpf_cnpj" class="form-control" value="<?=$cliente->getCpf_cnpj()?>" required>
      </div>
    </div>

    <div class="form-row mb-2">
      <div class="col-md-6">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" autocomplete="off" value="<?=$cliente->getNome()?>" required>
      </div>
      <div class="col-md-6">
        <label for="dtNascimento">Data de Nascimento/Criação</label>
        <input type="date" name="dtNascimento" id="dtNascimento" class="form-control" value="<?= $cliente->getId() != null ? $cliente->getDtNascimento()->format("Y-m-d") : ""?>" required>
      </div>
    </div>

    <!-- Endereco 01 -->

    <h5 class="mt-5 mb-3 text-center">Endereço Principal</h5>

    <div class="info-endereco form-row mb-2">
      <div class="col-md-6">
        <label for="tipo_endereco">Endereço</label>
        <select name="tipo_endereco[]" id="tipo_endereco" class="form-control custom-select">
          <?php
          foreach ($tiposEnderecosList as $tiposEnderecos) :
            $select = "";
            if($cliente->getId() != null){
              if($cliente->getEnderecos()[0]->tiposEnderecos->getId() == $tiposEnderecos->getId()) $select = "selected";
            }
          ?>
            <option <?=$select?> value="<?= $tiposEnderecos->getId() ?>"><?= $tiposEnderecos->getDescricao() ?></option>
          <?php
          endforeach;
          ?>
        </select>
      </div>

      <div class="col-md-6">
        <label for="CEP">CEP</label>
        <input type="number" name="CEP[]" id="CEP" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ? $cliente->getEnderecos()[0]->getCep() : ""?>" required>
      </div>
    </div>

    <div class="info-endereco form-row mb-2">
      <div class="col-md-10">
        <label for="descricao">Logradouro</label>
        <input type="text" name="descricao[]" id="descricao" class="form-control" autocomplete="off" value="<?=$cliente->getId() != null ? $cliente->getEnderecos()[0]->getDescricao() : ""?>" required>
      </div>

      <div class="col-md-2">
        <label for="numero">Numero</label>
        <input type="number" name="numero[]" id="numero" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ? $cliente->getEnderecos()[0]->getNumero() : ""?>" required>
      </div>
    </div>

    <div class="info-endereco form-row mb-2">
      <div class="col-md-12">
        <label for="bairro">Bairro</label>
        <input type="text" name="bairro[]" id="bairro" class="form-control" autocomplete="off" value="<?=$cliente->getId() != null ? $cliente->getEnderecos()[0]->getBairro() : ""?>" required>
      </div>
    </div>

    <div class="info-endereco form-row mb-2">
      <div class="col-md-10">
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade[]" id="cidade" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ? $cliente->getEnderecos()[0]->getCidade() : ""?>" required>
      </div>
      <div class="col-md-2">
        <label for="estado">Estado</label>
        <input type="text" name="estado[]" id="estado" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ?  $cliente->getEnderecos()[0]->getEstado() : ""?>" required>
      </div>
    </div>

    <!-- Endereco 02 -->

    <h5 class="mt-5 mb-3 text-center">Endereço Secundário</h5>

    <div class="info-endereco form-row mb-2">
      <div class="col-md-6">
        <label for="tipo_endereco_2">Endereço</label>
        <select name="tipo_endereco[]" id="tipo_endereco_2" class="form-control custom-select">
          <?php
          foreach ($tiposEnderecosList as $tiposEnderecos) :
            $select = "";
            if($cliente->getId() != null){
              if($cliente->getEnderecos()[1]->tiposEnderecos->getId() == $tiposEnderecos->getId()) $select = "selected";
            }
          ?>
            <option <?=$select?> value="<?= $tiposEnderecos->getId() ?>"><?= $tiposEnderecos->getDescricao() ?></option>
          <?php
          endforeach;
          ?>
        </select>
      </div>

      <div class="col-md-6">
        <label for="CEP_2">CEP</label>
        <input type="number" name="CEP[]" id="CEP_2" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ?  $cliente->getEnderecos()[1]->getCep() : ""?>" required>
      </div>
    </div>

    <div class="info-endereco form-row mb-2">
      <div class="col-md-10">
        <label for="descricao_2">Logradouro</label>
        <input type="text" name="descricao[]" id="descricao_2" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ?  $cliente->getEnderecos()[1]->getDescricao() : ""?>" required>
      </div>

      <div class="col-md-2">
        <label for="numero_2">Numero</label>
        <input type="number" name="numero[]" id="numero_2" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ?   $cliente->getEnderecos()[1]->getNumero() : ""?>" required>
      </div>
    </div>

    <div class="info-endereco form-row mb-2">
      <div class="col-md-12">
        <label for="bairro_2">Bairro</label>
        <input type="text" name="bairro[]" id="bairro_2" class="form-control" autocomplete="off" value="<?=$cliente->getId() != null ? $cliente->getEnderecos()[1]->getBairro() : ""?>" required>
      </div>
    </div>

    <div class="info-endereco form-row mb-2">
      <div class="col-md-10">
        <label for="cidade_2">Cidade</label>
        <input type="text" name="cidade[]" id="cidade_2" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ?  $cliente->getEnderecos()[1]->getCidade() : ""?>" required>
      </div>
      <div class="col-md-2">
        <label for="estado_2">Estado</label>
        <input type="text" name="estado[]" id="estado_2" class="form-control" autocomplete="off" value="<?= $cliente->getId() != null ?  $cliente->getEnderecos()[1]->getEstado() : ""?>" required>
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