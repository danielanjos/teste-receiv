<?php

namespace Receiv\Controller\Colaboradores;

use Receiv\Controller\InterfaceControlaRotas;

class Logout implements InterfaceControlaRotas
{
  public function ProcessaRequisicao(): void
  {
      session_destroy();
      header("Location: /home");
  }
}
