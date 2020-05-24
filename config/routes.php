<?php

use Receiv\Controller\Home;

if(empty($_SERVER["PATH_INFO"])){
  header("Location: /home");
}

switch($_SERVER["PATH_INFO"]){
  case "":
  case "/":
  case "\\":
  case "/home":
    $controller = new Home();
    $controller->processaRequisicao();
  break;
  default:
    http_response_code(404);
}