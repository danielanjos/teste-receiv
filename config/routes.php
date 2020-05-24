<?php

use Receiv\Controller\{Home, Autenticacao, Dashboard};

if(empty($_SERVER["PATH_INFO"])){
  header("Location: /home");
}

echo $_SERVER["PATH_INFO"];

switch($_SERVER["PATH_INFO"]){
  case "":
  case "/":
  case "\\":
  case "/home":
    $controller = new Home();
  break;
  case "/autenticacao":
    $controller = new Autenticacao();
  case "/dashboard":
    $controller = new Dashboard();
  break;
  default:
    http_response_code(404);
}

$controller->ProcessaRequisicao();