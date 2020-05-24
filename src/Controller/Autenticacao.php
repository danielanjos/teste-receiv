<?php

namespace Receiv\Controller;

use Receiv\Helper\FlashMessageTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOAutenticacaoRepository;

class Autenticacao implements InterfaceControlaRotas
{

  use FlashMessageTrait;

  public function ProcessaRequisicao(): void
  {

    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    try{
      $conexao = CriaConexao::criaConexao();
      $autenticacao = new PDOAutenticacaoRepository($conexao);
      $colaborador = $autenticacao->Autentica($login, $senha);
      $_SESSION["usuario_logado"] = $colaborador;
      header("Location: /dashboard");
    } catch (\Exception $e){
      $this->defineMensagem("danger", $e->getMessage());
      header("Location: /home");
    }
  }
}
