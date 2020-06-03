<?php

namespace Receiv\Abstracts;

abstract class EntidadeFraca
{
  private $id;
  private $descricao;

  public function __construct($id, $descricao)
  {
    $this->id = $id;
    $this->descricao = $descricao;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of descricao
   */ 
  public function getDescricao()
  {
    return $this->descricao;
  }
}