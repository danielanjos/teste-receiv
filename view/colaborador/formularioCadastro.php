<?php include __DIR__ . '/../cabecalho.php'; ?>

<h2 class="mt-3 text-center"><?= $titulo ?></h2>

<!-- Cliente -->

<section class="formularioCadastro mt-3 w-50 mx-auto">
  <form action="/colaboradores/salvar-colaborador" method="POST">
    <input type="hidden" name="id" value="<?= $colaborador->getId() ?>">
    <input type="hidden" name="hashAtual" value="<?= $colaborador->getSenha() ?>">
    <div class="form-row mb-2">
      <div class="col-md-6">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" autocomplete="off" value="<?php echo $colaborador->getId() != null ? $colaborador->getNome() : "" ?>">
      </div>
      <div class="col-md-6">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" class="form-control" value="<?php echo $colaborador->getId() != null ? $colaborador->getLogin() : "" ?>">
      </div>
    </div>

    <div class="form-row mb-2">
      <div class="col-md-6">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $colaborador->getId() != null ? $colaborador->getEmail() : "" ?>">
      </div>
      <div class="col-md-6">
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" placeholder="*****">
      </div>
    </div>

    <div class="form-row justify-content-center mt-2">
      <div class="col-md-12">
        <div class="form-check-inline">
          <?php
          $check = "";
          if ($colaborador->getId() != null && $colaborador->getFlAdministrador() == true) $check = "checked";
          ?>
          <input class="form-check-input" type="checkbox" name="fl_administrador" id="fl_administrador" <?= $check ?>>
          <label class="form-check-label" for="fl_administrador">
            Administrador
          </label>
        </div>
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