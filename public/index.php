<?php
session_start();

require_once "../autoload.php";

$caminho = $_SERVER["PATH_INFO"];
$rotas = require __DIR__ . "/../config/routes.php";

if (!array_key_exists($caminho, $rotas)) {
  http_response_code(404);
  exit();
}

$isRotaHome = stripos($caminho, 'home');
if (!isset($_SESSION['usuario_logado']) && $isRotaHome === false) {
    header('Location: /home');
    exit();
}

$classeControladora = $rotas[$caminho];

$classeControladoraInstancia = new $classeControladora;
$classeControladoraInstancia->ProcessaRequisicao();



