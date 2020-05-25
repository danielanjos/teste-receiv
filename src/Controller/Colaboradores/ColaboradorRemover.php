<?php

namespace Receiv\Controller\Colaboradores;

use Exception;
use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOColaboradoresRepository;

class ColaboradorRemover implements InterfaceControlaRotas
{
  public function ProcessaRequisicao(): void
  {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    try {

      $conexao = CriaConexao::criaConexao();
      $pdoColaboradoresRepository = new PDOColaboradoresRepository($conexao);
      
      if(!$pdoColaboradoresRepository->Remover($id)){
        throw new Exception("Não foi possível remover");
      }

      $_SESSION["tipo_mensagem"] = "success";
      $_SESSION["mensagem"] = "Concluído";
      header("Location: /colaboradores/listar");
    } catch (Exception $e) {
      $_SESSION["tipo_mensagem"] = "danger";
      $_SESSION["mensagem"] = $e->getMessage();
      echo $e->getMessage();
      // print_r($e);
      header("Location: /colaboradores/listar");
    }
  }
}
