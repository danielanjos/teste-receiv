<?php

namespace Receiv\Entity;

class Enderecos
{
  private $id;
  public  $tiposEnderecos;
  private $cep;
  private $descricao;
  private $bairro;
  private $cidade;
  private $estado;
  private $numero;
  private $idCliente;
  private $flPrincipal;
  
  public function __construct($id = null, $idTipoEndereco = null, $cep = null, $descricaoTipoEndereco = null, $descricaoEndereco = null, $bairro = null, $cidade = null, $estado = null, $numero = null, $idCliente = null, $flPrincipal = null)
  {
    $this->id = $id;
    $this->tiposEnderecos = new TiposEndereco($idTipoEndereco, $descricaoTipoEndereco);
    $this->cep = $cep;
    $this->descricao = $descricaoEndereco;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
    $this->estado = $estado;
    $this->numero = $numero;
    $this->idCliente = $idCliente;
    $this->flPrincipal = $flPrincipal;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of cep
   */ 
  public function getCep()
  {
    return $this->cep;
  }

  /**
   * Get the value of descricao
   */ 
  public function getDescricao()
  {
    return $this->descricao;
  }

  /**
   * Get the value of bairro
   */ 
  public function getBairro()
  {
    return $this->bairro;
  }

  /**
   * Get the value of cidade
   */ 
  public function getCidade()
  {
    return $this->cidade;
  }

  /**
   * Get the value of estado
   */ 
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * Get the value of numero
   */ 
  public function getNumero()
  {
    return $this->numero;
  }

  /**
   * Get the value of idCliente
   */ 
  public function getIdCliente()
  {
    return $this->idCliente;
  }

  /**
   * Get the value of flPrincipal
   */ 
  public function getFlPrincipal()
  {
    return $this->flPrincipal;
  }

  public function setId($id): void
  {
    if (!is_null($this->id)) {
      throw new \DomainException("Já existe um ID para esse Endereço");
    }

    $this->id = $id;
  }

  public function getEnderecoFormatado(){

    return $this->descricao . "," . $this->numero;
  }
}