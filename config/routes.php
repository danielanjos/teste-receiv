<?php

use Receiv\Controller\{Home, Autenticacao, Dashboard};

return [
  "/" => Dashboard::class,
  "/home" => Home::class,
  "/autenticacao" => Autenticacao::class,
  "/dashboard" => Dashboard::class
];