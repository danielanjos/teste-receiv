<?php

namespace Receiv\Controller\Colaboradores;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Entity\Colaborador;
use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOColaboradoresRepository;

class ColaboradorFormularioCadastro implements InterfaceControlaRotas
{
  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $colaborador = new Colaborador(null, null, null, null, null, null);
    if(!empty($id)){
      $conexao = CriaConexao::criaConexao();
      $pdoColaboradorRepository = new PDOColaboradoresRepository($conexao);
      $colaboradorList = $pdoColaboradorRepository->BuscaPorId($id);
      $colaborador = $colaboradorList[array_key_first($colaboradorList)];
    }

    $html = $this->renderizaHtml("colaborador/formularioCadastro.php", [
      "titulo" => "Cadastrar Colaborador",
      "colaborador" => $colaborador
    ]);

    echo $html;
  }
  
}