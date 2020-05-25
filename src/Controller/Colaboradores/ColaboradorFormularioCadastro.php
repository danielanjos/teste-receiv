<?php

namespace Receiv\Controller\Colaboradores;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOColaboradoresRepository;
use Receiv\Infra\Repository\PDOTiposEndereco;
use Receiv\Infra\Repository\PDOTiposPessoa;

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