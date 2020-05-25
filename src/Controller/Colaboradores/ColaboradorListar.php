<?php

namespace Receiv\Controller\Colaboradores;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOColaboradoresRepository;

class ColaboradorListar implements InterfaceControlaRotas
{
  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {

    $conexao = CriaConexao::criaConexao();
    $pdoColaboradoresRepository = new PDOColaboradoresRepository($conexao);
    $colaboradorList = $pdoColaboradoresRepository->Todos();


    $html = $this->renderizaHtml("colaborador/listar.php", [
      "titulo" => "Colaboradores",
      "colaboradorList" => $colaboradorList
    ]);

    echo $html;
  }
  
}