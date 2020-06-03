<?php

namespace Receiv\Entity;

class Charts implements \JsonSerializable
{
  private $nome;
  private $dias30;
  private $dias60;
  private $dias90;
  private $dias120;
  private $dias180;

  public function __construct($nome = null, $dias30 = null, $dias60 = null, $dias90 = null, $dias120 = null, $dias180 = null)
  {
    $this->nome = $nome;
    $this->dias30 = $dias30;
    $this->dias60 = $dias60;
    $this->dias90 = $dias90;
    $this->dias120 = $dias120;
    $this->dias180 = $dias180;
  }

  /**
   * Get the value of nome
   */ 
  public function getNome()
  {
    return $this->nome;
  }

  /**
   * Get the value of dias30
   */ 
  public function getDias30()
  {
    return $this->dias30;
  }

  /**
   * Get the value of dias60
   */ 
  public function getDias60()
  {
    return $this->dias60;
  }

  /**
   * Get the value of dias90
   */ 
  public function getDias90()
  {
    return $this->dias90;
  }

  /**
   * Get the value of dias120
   */ 
  public function getDias120()
  {
    return $this->dias120;
  }

  /**
   * Get the value of dias180
   */ 
  public function getDias180()
  {
    return $this->dias180;
  }

  public function jsonSerialize()
  {
    return [
      "nome" => $this->nome,
      "dias30" => $this->dias30,
      "dias60" => $this->dias60,
      "dias90" => $this->dias90,
      "dias120" => $this->dias120,
      "dias180" => $this->dias180
    ];
  }
}