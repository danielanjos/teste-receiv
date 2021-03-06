<?php

namespace Receiv\Controller;

use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistencia\CriaConexao;

class Home implements InterfaceControlaRotas
{

  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {

    $html = $this->renderizaHtml("home/home.php", [
      "titulo" => "Home"
    ]);

    echo $html;
  }
}
