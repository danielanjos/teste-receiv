<?php

namespace Receiv\Controller\Cliente;

use Exception;
use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Entity\Cliente;
use Receiv\Entity\Enderecos;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOClienteRepository;
use Receiv\Infra\Repository\PDOEnderecosRepository;

class ClienteSalvar implements InterfaceControlaRotas
{
  public function ProcessaRequisicao(): void
  {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if($id == 0) $id = null;

    $idEndereco1 = filter_input(INPUT_POST, 'idEndereco1', FILTER_VALIDATE_INT);
    $idEndereco2 = filter_input(INPUT_POST, 'idEndereco2', FILTER_VALIDATE_INT);
    if($idEndereco1 == 0) $idEndereco1 = null;
    if($idEndereco2 == 0) $idEndereco2 = null;

    $idTipoPessoa = filter_input(INPUT_POST, 'tipo_pessoa', FILTER_VALIDATE_INT);
    $cpf_cnpj = filter_input(INPUT_POST, 'cpf_cnpj', FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $dtNascimento = filter_input(INPUT_POST, 'dtNascimento', FILTER_DEFAULT);

    $tipoEndereco[] = filter_var($_POST["tipo_endereco"][0], FILTER_VALIDATE_INT);
    $tipoEndereco[] = filter_var($_POST["tipo_endereco"][1], FILTER_VALIDATE_INT);

    $cep[] = filter_var($_POST["CEP"][0], FILTER_DEFAULT);
    $cep[] = filter_var($_POST["CEP"][1], FILTER_DEFAULT);

    $descricao[] = filter_var($_POST["descricao"][0], FILTER_SANITIZE_STRING);
    $descricao[] = filter_var($_POST["descricao"][1], FILTER_SANITIZE_STRING);

    $numero[] = filter_var($_POST["numero"][0], FILTER_VALIDATE_INT);
    $numero[] = filter_var($_POST["numero"][1], FILTER_VALIDATE_INT);

    $bairro[] = filter_var($_POST["bairro"][0], FILTER_SANITIZE_STRING);
    $bairro[] = filter_var($_POST["bairro"][1], FILTER_SANITIZE_STRING);

    $cidade[] = filter_var($_POST["cidade"][0], FILTER_DEFAULT);
    $cidade[] = filter_var($_POST["cidade"][1], FILTER_DEFAULT);

    $estado[] = filter_var($_POST["estado"][0], FILTER_SANITIZE_STRING);
    $estado[] = filter_var($_POST["estado"][1], FILTER_SANITIZE_STRING);

    try {
      $cliente = new Cliente($id, $idTipoPessoa, "", $cpf_cnpj, $nome, new \DateTimeImmutable($dtNascimento));

      $conexao = CriaConexao::criaConexao();
      $pdoClienteRepository = new PDOClienteRepository($conexao);
      $idCliente = $pdoClienteRepository->Salvar($cliente);

      if (!$idCliente) {
        throw new Exception("Não foi possível cadastrar o cliente");
      }

      $endereco01 = new Enderecos($idEndereco1, $tipoEndereco[0], $cep[0], "", $descricao[0], $bairro[0], $cidade[0], $estado[0], $numero[0], $cliente->getId(), 1);
      $endereco02 = new Enderecos($idEndereco2, $tipoEndereco[1], $cep[1], "", $descricao[1], $bairro[1], $cidade[1], $estado[1], $numero[1], $cliente->getId(), 0);

      $pdoEnderecosRepository = new PDOEnderecosRepository($conexao);

      if (!$pdoEnderecosRepository->Salvar($endereco01)) {
        throw new Exception("Não foi possível cadastrar o endereço principal");
      }

      if (!$pdoEnderecosRepository->Salvar($endereco02)) {
        throw new Exception("Não foi possível cadastrar o endereço secundário");
      }

      $_SESSION["tipo_mensagem"] = "success";
      $_SESSION["mensagem"] = "Concluído";
      header("Location: /clientes/cadastro?id=$id");
    } catch (Exception $e) {
      $_SESSION["tipo_mensagem"] = "danger";
      $_SESSION["mensagem"] = $e->getMessage();
      echo $e->getMessage();
      // print_r($e);
      header("Location: /clientes/cadastro");
    }
  }
}
