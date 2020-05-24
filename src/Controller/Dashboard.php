<?php

namespace Receiv\Controller;

use Receiv\Helper\RenderizaHtmlTrait;

class Dashboard implements InterfaceControlaRotas
{

  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {
    
    $html = $this->renderizaHtml("/dashboard/dashboard.php", [
      "titulo" => "Dashboard"
    ]);

    echo $html;

  }
}