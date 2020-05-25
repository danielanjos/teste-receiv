<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\TiposPessoa;

class PDOTiposPessoa
{
  private \PDO $conexao;

  public function __construct(\PDO $conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(){
    $sqlQuery = "SELECT * FROM tipos_pessoa";
    $statement = $this->conexao->query($sqlQuery);
    
    $tiposPessoaDataList = $statement->fetchAll();
    $tiposPessoaList = [];

    foreach ($tiposPessoaDataList as $row) {
      $tiposPessoaList[] = new TiposPessoa($row["id"], $row["descricao"]);
    }

    return $tiposPessoaList;
  }
}