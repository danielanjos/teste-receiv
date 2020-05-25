<?php

namespace Receiv\Entity;

use DateTimeImmutable;
use Receiv\Entity\Moeda;
use Receiv\Entity\StatusTitulo;
use Receiv\Entity\TiposTitulo;

class Titulo
{
  private ?int $id;
  public TiposTitulo $tiposTitulo;
  private string $descricao;
  private float $valor;
  private DateTimeImmutable $dtCriacao;
  private DateTimeImmutable $dtVencimento;
  private int $idCliente;
  public StatusTitulo $statusTitulo;
  private DateTimeImmutable $dtQuitacao;
  private float $valorPago;
  private float $saldoDevedor;
  private DateTimeImmutable $dtUltimaAtualizacao;
  public Moeda $moeda;
  
  public function __construct(?int $id, int $idTipoTitulo, string $descricaoTipoTitulo, string $descricaoTitulo, 
    float $valor, DateTimeImmutable $dtCriacao, DateTimeImmutable $dtVencimento, int $idCliente, int $idStatusTitulo, 
    string $descricaoStatusTitulo, DateTimeImmutable $dtQuitacao, float $valorPago, float $saldoDevedor, 
    DateTimeImmutable $dtUltimaAtualizacao, int $idMoeda, string $descricaoMoeda)
  {
    $this->id = $id;
    $this->tiposTitulo = new TiposTitulo($idTipoTitulo, $descricaoTipoTitulo);
    $this->descricao = $descricaoTitulo;
    $this->valor = $valor;
    $this->dtCriacao = $dtCriacao;
    $this->dtVencimento = $dtVencimento;
    $this->idCliente = $idCliente;
    $this->statusTitulo = new StatusTitulo($idStatusTitulo, $descricaoStatusTitulo);
    $this->dtQuitacao = $dtQuitacao;
    $this->valorPago = $valorPago;
    $this->saldoDevedor = $saldoDevedor;
    $this->dtUltimaAtualizacao = $dtUltimaAtualizacao;
    $this->moeda = new Moeda($idMoeda, $descricaoMoeda);
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

  /**
   * Get the value of valor
   */ 
  public function getValor()
  {
    return $this->valor;
  }

  /**
   * Get the value of dtCriacao
   */ 
  public function getDtCriacao()
  {
    return $this->dtCriacao;
  }

  /**
   * Get the value of dtVencimento
   */ 
  public function getDtVencimento()
  {
    return $this->dtVencimento;
  }

  /**
   * Get the value of idCliente
   */ 
  public function getIdCliente()
  {
    return $this->idCliente;
  }

  /**
   * Get the value of dtQuitacao
   */ 
  public function getDtQuitacao()
  {
    return $this->dtQuitacao;
  }

  /**
   * Get the value of valorPago
   */ 
  public function getValorPago()
  {
    return $this->valorPago;
  }

  /**
   * Get the value of saldoDevedor
   */ 
  public function getSaldoDevedor()
  {
    return $this->saldoDevedor;
  }

  /**
   * Get the value of ultimaAtualizacao
   */ 
  public function dtUltimaAtualizacao()
  {
    return $this->dtUltimaAtualizacao;
  }

  public function setId(int $id): void
  {
    if (!is_null($this->id)) {
      throw new \DomainException("Já existe um ID para esse Endereço");
    }

    $this->id = $id;
  }

}