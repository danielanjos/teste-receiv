<?php

namespace Receiv\Controller\Titulos;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOColaboradoresRepository;
use Receiv\Infra\Repository\PDOTitulosRepository;

class TituloListar implements InterfaceControlaRotas
{
  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {

    $conexao = CriaConexao::criaConexao();
    $pdoTitulosRepository = new PDOTitulosRepository($conexao);
    $tituloList = $pdoTitulosRepository->Todos();

    $html = $this->renderizaHtml("titulo/listar.php", [
      "titulo" => "Titulos",
      "tituloList" => $tituloList
    ]);

    echo $html;
  }
  
}