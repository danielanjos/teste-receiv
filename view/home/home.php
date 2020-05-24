<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titulo ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/global.css">
  <link rel="stylesheet" href="/css/home.css">
</head>

<body>
  <div class="container">

    <section>
    </section>

    <section class="form">
      <?php if (isset($_SESSION['mensagem'])) : ?>
        <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
          <?= $_SESSION['mensagem']; ?>
        </div>
      <?php
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
      endif;
      ?>
      <form action="/autenticacao" method="POST">
        <div class="form-group">
          <label for="login">Login</label>
          <input type="text" name="login" id="login" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <button class="button">Entrar</button>
      </form>
    </section>
  </div>
</body>

</html>