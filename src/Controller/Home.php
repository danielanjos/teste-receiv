<?php

namespace Receiv\Controller;

use Receiv\Helper\RenderizaHtml;

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
