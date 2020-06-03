<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\Moeda;

class PDOMoedas
{
  private $conexao;

  public function __construct($conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(){
    $sqlQuery = "SELECT * FROM moeda";
    $statement = $this->conexao->query($sqlQuery);
    
    $tiposPessoaDataList = $statement->fetchAll();
    $tiposPessoaList = [];

    foreach ($tiposPessoaDataList as $row) {
      $tiposPessoaList[] = new Moeda($row["id"], $row["codigo"]);
    }

    return $tiposPessoaList;
  }
}