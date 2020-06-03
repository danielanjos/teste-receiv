<?php

namespace Receiv\Entity;

class Moeda
{
  private $id;
  private $codigo;

  public function __construct($id, $codigo)
  {
    $this->id = $id;
    $this->codigo = $codigo;
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
  public function getCodigo()
  {
    return $this->codigo;
  }
}