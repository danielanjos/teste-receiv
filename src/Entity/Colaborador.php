<?php

namespace Receiv\Entity;

class Colaborador
{
  private ?int $id;
  private string $nome;
  private string $login;
  private string $email;
  private string $senha;
  private bool $flAdministrador;
  
  public function __construct(?int $id, string $nome, string $login, string $email, string $senha, bool $flAdministrador)
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

  public function setId(int $id): void
  {
    if (!is_null($this->id)) {
      throw new \DomainException("Já existe um ID para esse Endereço");
    }

    $this->id = $id;
  }

}