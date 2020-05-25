<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\TiposTitulo;

class PDOTiposTitulo
{
  private \PDO $conexao;

  public function __construct(\PDO $conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(){
    $sqlQuery = "SELECT * FROM tipos_titulo";
    $statement = $this->conexao->query($sqlQuery);
    
    $tiposPessoaDataList = $statement->fetchAll();
    $tiposPessoaList = [];

    foreach ($tiposPessoaDataList as $row) {
      $tiposPessoaList[] = new TiposTitulo($row["id"], $row["descricao"]);
    }

    return $tiposPessoaList;
  }
}