<?php

namespace Receiv\Controller\Colaboradores;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Helper\RenderizaHtmlTrait;

class ColaboradorFormularioCadastro implements InterfaceControlaRotas
{
  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {

    $html = $this->renderizaHtml("colaborador/formularioCadastro.php", [
      "titulo" => "Cadastrar Colaborador"
    ]);

    echo $html;
  }
  
}