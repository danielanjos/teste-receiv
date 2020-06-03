<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\StatusTitulo;

class PDOStatusTitulo
{
  private $conexao;

  public function __construct($conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(){
    $sqlQuery = "SELECT * FROM status_titulo";
    $statement = $this->conexao->query($sqlQuery);
    
    $tiposPessoaDataList = $statement->fetchAll();
    $tiposPessoaList = [];

    foreach ($tiposPessoaDataList as $row) {
      $tiposPessoaList[] = new StatusTitulo($row["id"], $row["descricao"]);
    }

    return $tiposPessoaList;
  }
}