<?php

namespace Receiv\Infra\Repository;

use Exception;
use Receiv\Entity\Colaborador;

class PDOAutenticacaoRepository  
{

  private \PDO $conexao;

  public function __construct(\PDO $conexao)
  {
    $this->conexao = $conexao;
  }

  public function Autentica($login, $senha) : Colaborador
  {
    $sqlQuery = "SELECT id, nome, login, email, senha, fl_administrador FROM colaboradores WHERE login = ?";
    $statement = $this->conexao->prepare($sqlQuery);
    $statement->bindValue(1, $login);
    $statement->execute();

    $colaboradorData =$statement->fetch();

    if(!$colaboradorData){
      throw new Exception("Login ou senha inválidos");
      exit;
    }

    if(!password_verify($senha, $colaboradorData["senha"])){
      throw new Exception("Senha incorreta");
    } 

    $colaborador = new Colaborador(
      $colaboradorData["id"],
      $colaboradorData["nome"],
      $colaboradorData["login"],
      $colaboradorData["email"],
      $colaboradorData["senha"],
      $colaboradorData["fl_administrador"]
    );

    return $colaborador;
  }

}
