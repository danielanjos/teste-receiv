<?php

namespace Receiv\Controller\Titulos;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOMoedas;
use Receiv\Infra\Repository\PDOStatusTitulo;
use Receiv\Infra\Repository\PDOTiposTitulo;

class TituloFormularioCadastro implements InterfaceControlaRotas
{
  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {

    $conexao = CriaConexao::criaConexao();
    $pdoTiposTitulo = new PDOTiposTitulo($conexao);
    $tiposTituloList = $pdoTiposTitulo->Todos();

    $pdoStatusTitulo = new PDOStatusTitulo($conexao);
    $statusTituloList = $pdoStatusTitulo->Todos();

    $pdoMoedas = new PDOMoedas($conexao);
    $moedasList = $pdoMoedas->Todos();

    $html = $this->renderizaHtml("titulo/formularioCadastro.php", [
      "titulo" => "Cadastrar Titulo",
      "tiposTituloList" => $tiposTituloList,
      "statusTituloList" => $statusTituloList,
      "moedasList" => $moedasList
    ]);

    echo $html;
  }
  
}