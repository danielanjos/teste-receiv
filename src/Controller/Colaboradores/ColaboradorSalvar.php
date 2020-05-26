<?php

namespace Receiv\Controller\Colaboradores;

use Exception;
use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Entity\Colaborador;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOColaboradoresRepository;

class ColaboradorSalvar implements InterfaceControlaRotas
{
  public function ProcessaRequisicao(): void
  {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if($id == 0) $id = null;

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $flAdministrador = isset($_POST["fl_administrador"]) ? true : false;
    $hashAtual =@ $_POST["hashAtual"];

    $hash = ($senha != "") ? password_hash($senha, PASSWORD_ARGON2I) : $hashAtual;

    try {
      $colaborador = new Colaborador($id, $nome, $login, $email, $hash, $flAdministrador);

      $conexao = CriaConexao::criaConexao();
      $pdoColaboradoresRepository = new PDOColaboradoresRepository($conexao);

      if (!$pdoColaboradoresRepository->Salvar($colaborador)) {
        throw new Exception("Não foi possível cadastrar o cliente");
      }

      $_SESSION["tipo_mensagem"] = "success";
      $_SESSION["mensagem"] = "Concluído";
      header("Location: /colaboradores/cadastro");
    } catch (Exception $e) {
      $_SESSION["tipo_mensagem"] = "danger";
      $_SESSION["mensagem"] = $e->getMessage();
      header("Location: /colaboradores/cadastro");
    }
  }
}
