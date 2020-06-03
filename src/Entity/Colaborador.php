<?php

namespace Receiv\Entity;

class Colaborador
{
  private $id;
  private $nome;
  private $login;
  private $email;
  private $senha;
  private $flAdministrador;
  
  public function __construct($id = null, $nome = null, $login = null, $email = null, $senha = null, $flAdministrador = null)
  {
    $this->id = $id;
    $this->nome = $nome;
    $this->login = $login;
    $this->email = $email;
    $this->senha = $senha;
    $this->flAdministrador = $flAdministrador;
  }
  
  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }
  
  /**
   * Get the value of nome
   */ 
  public function getNome()
  {
    return $this->nome;
  }

  /**
   * Get the value of login
   */ 
  public function getLogin()
  {
    return $this->login;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Get the value of senha
   */ 
  public function getSenha()
  {
    return $this->senha;
  }

  /**
   * Get the value of flAdministrador
   */ 
  public function getFlAdministrador()
  {
    return $this->flAdministrador;
  }

  public function setId($id): void
  {
    if (!is_null($this->id)) {
      throw new \DomainException("Já existe um ID para esse Endereço");
    }

    $this->id = $id;
  }

}