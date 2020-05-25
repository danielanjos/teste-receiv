<?php

namespace Receiv\Controller\Cliente;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Entity\Cliente;
use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOClienteRepository;
use Receiv\Infra\Repository\PDOEnderecosRepository;
use Receiv\Infra\Repository\PDOTiposEndereco;
use Receiv\Infra\Repository\PDOTiposPessoa;

class ClienteFormularioCadastro implements InterfaceControlaRotas
{
  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {
    $conexao = CriaConexao::criaConexao();
    $pdoTiposEndereco = new PDOTiposEndereco($conexao);
    $tiposEnderecosList = $pdoTiposEndereco->Todos();

    $pdoTiposPessoa = new PDOTiposPessoa($conexao);
    $tiposPessoaList = $pdoTiposPessoa->Todos();


    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $cliente = new Cliente(null, null, null, null, null, null);
    if(!empty($id)){
      $pdoClientesRepository = new PDOClienteRepository($conexao);
      $clienteList = $pdoClientesRepository->BuscaPorIdComEndereco($id);
      $cliente = $clienteList[array_key_first($clienteList)];
    }
    

    $html = $this->renderizaHtml("cliente/formularioCadastro.php", [
      "titulo" => "Cadastrar Cliente",
      "tiposEnderecosList" => $tiposEnderecosList,
      "tiposPessoaList" => $tiposPessoaList,
      "cliente" => $cliente

    ]);

    echo $html;
  }
  
}