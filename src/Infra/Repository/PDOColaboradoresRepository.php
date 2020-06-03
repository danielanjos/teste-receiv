<?php

namespace Receiv\Infra\Repository;

use Exception;
use Receiv\Entity\Colaborador;
use Receiv\Repository\CRUDColaboradores;
use Receiv\Repository\CRUDRepository;

class PDOColaboradoresRepository implements CRUDRepository, CRUDColaboradores
{

  private $conexao;

  public function __construct($conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(): array
  {
    $sqlQuery = "SELECT id, nome, login, email, senha, fl_administrador FROM colaboradores";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarListaColaboradores($statement);
  }

  public function BuscaPorId($id): array
  {
    $sqlQuery = "SELECT id, nome, login, email, senha, fl_administrador FROM colaboradores WHERE id = ?";

    $statement = $this->conexao->prepare($sqlQuery);
    $statement->bindValue(1, $id);
    $statement->execute();

    return $this->hidratarListaColaboradores($statement); 
  }

  private function hidratarListaColaboradores($statement) : array
  {
    $colaboradorDataList = $statement->fetchAll();
    $colaboradorList = [];

    foreach ($colaboradorDataList as $row) {
      $colaboradorList[] = new Colaborador(
        $row["id"], $row["nome"], $row["login"], $row["email"], $row["senha"], $row["fl_administrador"]);
    }

    return $colaboradorList;
  }

  public function Salvar(Colaborador $colaborador): bool
  {
    if($colaborador->getId() === null){
      return $this->insert($colaborador);
    }

    return $this->update($colaborador);
  }

  private function insert(Colaborador $colaborador): bool
  {
    $sqlInsert = "INSERT INTO colaboradores (nome, login, email, senha, fl_administrador)
              VALUES (:nome, :login, :email, :senha, :fl_administrador)";
    $statement = $this->conexao->prepare($sqlInsert);

    $success = $statement->execute([
      ":nome" => $colaborador->getNome(),
      ":login" => $colaborador->getLogin(),
      ":email" => $colaborador->getEmail(),
      ":senha" => $colaborador->getSenha(),
      ":fl_administrador" => $colaborador->getFlAdministrador()
    ]);

    if($success){
      $colaborador->setId($this->conexao->lastInsertId());
    }

    return $success;
  }

  private function update(Colaborador $colaborador) : bool
  {
    $sqlUpdate = "UPDATE colaboradores SET nome = :nome, login = :login, email = :email, senha = :senha, fl_administrador = :fl_administrador WHERE id = :id";
    $statement = $this->conexao->prepare($sqlUpdate);
    $statement->bindValue(":nome", $colaborador->getNome());
    $statement->bindValue(":login", $colaborador->getLogin());
    $statement->bindValue(":email", $colaborador->getEmail());
    $statement->bindValue(":senha", $colaborador->getSenha());
    $statement->bindValue(":fl_administrador", $colaborador->getFlAdministrador());
    $statement->bindValue(":id", $colaborador->getId());

    return $statement->execute();
  }

  public function Remover($id): bool
  {
    $sqlDelete = "DELETE FROM colaboradores WHERE id = :id";
    $statement = $this->conexao->prepare($sqlDelete);
    $statement->bindValue(":id", $id, \PDO::PARAM_INT);

    return $statement->execute();
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
