<?php
setlocale(LC_ALL,'pt_BR.UTF8');
mb_internal_encoding('UTF8'); 
mb_regex_encoding('UTF8');
ini_set ("default_charset", 'utf-8');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once "../autoload.php";
$caminho =@ $_SERVER["SCRIPT_URL"];
$rotas = require __DIR__ . "/../config/routes.php";

// echo "<pre>";
// var_dump($_SERVER);
// echo "caminho = " . $caminho;

if (!array_key_exists($caminho, $rotas)) {
  http_response_code(404);
  exit();
}

$isRotaHome = stripos($caminho, 'home');
$isRodaAutenticacao = stripos($caminho, 'autenticacao');
if (!isset($_SESSION['usuario_logado']) && $isRotaHome === false && $isRodaAutenticacao === false) {
    header('Location: /home');
    exit();
}

$classeControladora = $rotas[$caminho];

$classeControladoraInstancia = new $classeControladora;
$classeControladoraInstancia->ProcessaRequisicao();
