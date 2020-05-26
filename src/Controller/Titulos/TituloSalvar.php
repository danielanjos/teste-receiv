<?php

namespace Receiv\Controller\Titulos;

use Exception;
use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Entity\Titulo;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOClienteRepository;
use Receiv\Infra\Repository\PDOTitulosRepository;

class TituloSalvar implements InterfaceControlaRotas
{
  public function ProcessaRequisicao(): void
  {
    
    $idTipoTitulo = filter_input(INPUT_POST, 'tipo_titulo', FILTER_VALIDATE_INT);
    $cpf_cnpj = filter_input(INPUT_POST, 'cpf_cnpj', FILTER_VALIDATE_INT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
    $dtCriacao = filter_input(INPUT_POST, 'dtCriacao', FILTER_DEFAULT);
    $dtVencimento = filter_input(INPUT_POST, 'dtVencimento', FILTER_DEFAULT);
    $idStatusTitulo = filter_input(INPUT_POST, 'status_titulo', FILTER_VALIDATE_INT);
    $dtQuitacao = filter_input(INPUT_POST, 'dtQuitacao', FILTER_DEFAULT);
    $valorPago = filter_input(INPUT_POST, 'valorPago', FILTER_VALIDATE_FLOAT);
    $saldoDevedor = filter_input(INPUT_POST, 'saldoDevedor', FILTER_VALIDATE_FLOAT);
    $idMoeda = filter_input(INPUT_POST, 'moeda', FILTER_VALIDATE_INT);

    try {
      
      $conexao = CriaConexao::criaConexao();
      $pdoClienteRepository = new PDOClienteRepository($conexao);
      $clienteList = $pdoClienteRepository->BuscaPorCPF_CNPJ($cpf_cnpj);
      $cliente = $clienteList[0];

      if(count($clienteList) == 0){
        throw new Exception("Cliente não encontrado");
      }

      $titulo = new Titulo(
        null, 
        $idTipoTitulo, 
        "", 
        $descricao, 
        $valor, 
        new \DateTimeImmutable($dtCriacao), 
        new \DateTimeImmutable($dtVencimento), 
        $cliente->getId(), 
        $idStatusTitulo, 
        "", 
        new \DateTimeImmutable($dtQuitacao), 
        $valorPago, 
        $saldoDevedor, 
        new \DateTimeImmutable("now"), 
        $idMoeda, 
        "",
        ""
      );

      $pdoTitulosRepository = new PDOTitulosRepository($conexao);
      $pdoTitulosRepository->Salvar($titulo);

      $_SESSION["tipo_mensagem"] = "success";
      $_SESSION["mensagem"] = "Concluído";
      header("Location: /titulos/cadastro");
    } catch (Exception $e) {
      $_SESSION["tipo_mensagem"] = "danger";
      $_SESSION["mensagem"] = $e->getMessage();
      // print_r($e);
      header("Location: /titulos/cadastro");
    }
  }
}
