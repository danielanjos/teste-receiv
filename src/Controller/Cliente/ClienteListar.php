<?php

namespace Receiv\Controller\Cliente;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOClienteRepository;
use Receiv\Infra\Repository\PDOColaboradoresRepository;

class ClienteListar implements InterfaceControlaRotas
{
  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {

    $conexao = CriaConexao::criaConexao();
    $pdoClienteRepository = new PDOClienteRepository($conexao);
    $clienteList = $pdoClienteRepository->Todos();

    // var_dump($clienteList);
    $html = $this->renderizaHtml("cliente/listar.php", [
      "titulo" => "Clientes",
      "clienteList" => $clienteList
    ]);

    echo $html;
  }
  
}