<?php

namespace Receiv\Entity;

class Moeda
{
  private ?int $id;
  private string $codigo;

  public function __construct(int $id, string $codigo)
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