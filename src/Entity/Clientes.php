<?php

namespace Receiv\Entity;

use DateTimeImmutable;

class Clientes
{
  private ?int $id;
  public TiposPessoa $tiposPessoa;
  private string $cpf_cnpj;
  private string $nome;
  private DateTimeImmutable $dtNascimento;

  public function __construct(?int $id, int $idTipoPessoa, string $descricaoTipoPessoa, 
    string $cpf_cnpj, string $nome, DateTimeImmutable $dtNascimento)
  {
    $this->id = $id;
    $this->tiposPessoa = new TiposPessoa($idTipoPessoa, $descricaoTipoPessoa);
    $this->cpf_cnpj = $cpf_cnpj;
    $this->nome = $nome;
    $this->dtNascimento = $dtNascimento;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of cpf_cnpj
   */
  public function getCpf_cnpj()
  {
    return $this->cpf_cnpj;
  }

  public function getCpf_cnpjFormatados()
  {
    $cpf_cnpj = preg_replace("/\D/", '', $this->cpf_cnpj);

    if (strlen($cpf_cnpj) === 11) {
      return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf_cnpj);
    }

    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cpf_cnpj);
  }

  /**
   * Get the value of nome
   */
  public function getNome()
  {
    return $this->nome;
  }

  /**
   * Get the value of dtNascimento
   */
  public function getDtNascimento()
  {
    return $this->dtNascimento;
  }
}
