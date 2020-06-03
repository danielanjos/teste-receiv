<?php

namespace Receiv\Infra\Persistence;

class CriaConexao
{
  public static function criaConexao(): \PDO
  {

    // define("CONEXAO_HOST", "localhost");
    // define("CONEXAO_USER", "root");
    // define("CONEXAO_DATABASE", "newDatabase");
    // define("CONEXAO_PASSWORD", "");

    define("CONEXAO_HOST", "localhost");
    define("CONEXAO_USER", "phpnao12_receiv");
    define("CONEXAO_DATABASE", "phpnao12_receiv");
    define("CONEXAO_PASSWORD", "gbtcb7VGz5FXNQH");

    $conexao =
      new \PDO(
        "mysql:
        host=" . CONEXAO_HOST . ";"
          . "dbname=" . CONEXAO_DATABASE . ";charset=utf8",
        CONEXAO_USER,
        CONEXAO_PASSWORD
      );

    $conexao->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
    $conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $conexao->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

    return $conexao;
  }
}
