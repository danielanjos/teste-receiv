<?php

namespace Receiv\Controller\Cliente;

use Exception;
use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOClienteRepository;

class ClienteRemover implements InterfaceControlaRotas
{
  public function ProcessaRequisicao(): void
  {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    try {

      $conexao = CriaConexao::criaConexao();
      $pdoClienteRepository = new PDOClienteRepository($conexao);
      
      if(!$pdoClienteRepository->Remover($id)){
        throw new Exception("Não foi possível remover");
      }

      $_SESSION["tipo_mensagem"] = "success";
      $_SESSION["mensagem"] = "Concluído";
      header("Location: /clientes/listar");
    } catch (Exception $e) {
      $_SESSION["tipo_mensagem"] = "danger";
      $_SESSION["mensagem"] = $e->getMessage();
      echo $e->getMessage();
      // print_r($e);
      // header("Location: /clientes/cadastro");
    }
  }
}
