<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\TiposPessoa;

class PDOTiposPessoa
{
  private $conexao;

  public function __construct($conexao)
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