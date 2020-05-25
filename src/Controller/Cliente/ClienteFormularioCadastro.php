<?php

namespace Receiv\Controller\Cliente;

use Receiv\Controller\InterfaceControlaRotas;
use Receiv\Helper\RenderizaHtmlTrait;
use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDOTiposEndereco;
use Receiv\Infra\Repository\PDOTiposPessoa;

class ClienteFormularioCadastro implements InterfaceControlaRotas
{
  use RenderizaHtmlTrait;

  public function ProcessaRequisicao(): void
  {

    $conexao = CriaConexao::criaConexao();
    $pdoTiposPessoa = new PDOTiposPessoa($conexao);
    $tiposPessoaList = $pdoTiposPessoa->Todos();

    $pdoTiposEndereco = new PDOTiposEndereco($conexao);
    $tiposEnderecoList = $pdoTiposEndereco->Todos();
    
    $html = $this->renderizaHtml("cliente/formularioCadastro.php", [
      "titulo" => "Cadastrar Cliente",
      "tiposPessoaList" => $tiposPessoaList,
      "tiposEnderecosList" => $tiposEnderecoList
    ]);

    echo $html;
  }
  
}