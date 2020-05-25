<?php

namespace Receiv\Controller\Titulos;

use Exception;
use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOTitulosRepository;

class TituloRemover implements InterfaceControlaRotas
{
  public function ProcessaRequisicao(): void
  {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    try {

      $conexao = CriaConexao::criaConexao();
      $pdoTitulosRepository = new PDOTitulosRepository($conexao);
      
      if(!$pdoTitulosRepository->Remover($id)){
        throw new Exception("Não foi possível remover");
      }

      $_SESSION["tipo_mensagem"] = "success";
      $_SESSION["mensagem"] = "Concluído";
      header("Location: /titulos/listar");
    } catch (Exception $e) {
      $_SESSION["tipo_mensagem"] = "danger";
      $_SESSION["mensagem"] = $e->getMessage();
      echo $e->getMessage();
      // print_r($e);
      header("Location: /titulos/listar");
    }
  }
}
