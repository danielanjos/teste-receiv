<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titulo ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/global.css">
  <link rel="stylesheet" href="/css/cabecalho.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/dashboard"><button class="btn btn-outline-light my-2 my-sm-0"><i class="fas fa-home"></i></button></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/dashboard">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastros
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/colaboradores/cadastro">Colaboradores</a>
            <a class="dropdown-item" href="/clientes/cadastro">Clientes</a>
            <a class="dropdown-item" href="/titulos/cadastro">Titulos</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Consulta e Alterações
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/colaboradores/listar">Colaboradores</a>
            <a class="dropdown-item" href="/clientes/listar">Clientes</a>
            <a class="dropdown-item" href="/titulos/listar">Titulos</a>
          </div>
        </li>
      </ul>
      <ul class="my-2 my-lg-0 list-inline">
        <li>
          <button class="btn btn-outline-light my-2 my-sm-0"><i class="fas fa-power-off"></i></button>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">

  
    <?php if (isset($_SESSION['mensagem'])) : ?>
      <div class="alert text-center h4 mt-2 alert-<?= $_SESSION['tipo_mensagem']; ?>">
        <?= $_SESSION['mensagem']; ?>
      </div>
    <?php
      unset($_SESSION['mensagem']);
      unset($_SESSION['tipo_mensagem']);
    endif;
    ?>