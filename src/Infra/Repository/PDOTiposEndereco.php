<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\TiposPessoa;

class PDOTiposEndereco
{
  private $conexao;

  public function __construct($conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(){
    $sqlQuery = "SELECT * FROM tipos_endereco";
    $statement = $this->conexao->query($sqlQuery);
    
    $tiposEnderecoDataList = $statement->fetchAll();
    $tiposEnderecoList = [];

    foreach ($tiposEnderecoDataList as $row) {
      $tiposEnderecoList[] = new TiposPessoa($row["id"], $row["descricao"]);
    }

    return $tiposEnderecoList;
  }
}