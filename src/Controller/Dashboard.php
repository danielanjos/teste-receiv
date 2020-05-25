<?php

namespace Receiv\Controller;

use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDODashboardRepository;

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