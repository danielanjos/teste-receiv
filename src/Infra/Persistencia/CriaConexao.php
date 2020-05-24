<?php

namespace Receiv\Infra\Persistencia;

class CriaConexao
{
  public static function criaConexao() : \PDO
  {
    
    define("CONEXAO_HOST", "localhost");
    define("CONEXAO_USER", "root");
    define("CONEXAO_DATABASE", "newDatabase");
    define("CONEXAO_PASSWORD", "");
 
    $conexao = 
      new \PDO(
        "mysql:
        host=" . CONEXAO_HOST . ";"
        ."dbname=". CONEXAO_DATABASE,
        CONEXAO_USER,
        CONEXAO_PASSWORD);
  
    $conexao->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
    $conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

    return $conexao;

}
}

