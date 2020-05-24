<?php

namespace Receiv\Controller;

use Receiv\Helper\RenderizaHtml;
use Receiv\Infra\Persistencia\CriaConexao;

class Home implements InterfaceControlaRotas
{

  use RenderizaHtml;

  public function processaRequisicao(): void
  {
    
    $html = $this->renderizaHtml("home/home.php", [
      "titulo" => "Home"
    ]);

    echo $html;
  }
}
