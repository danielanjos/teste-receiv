<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\Titulo;
use Receiv\Repository\CRUDRepository;
use Receiv\Repository\CRUDTitulos;

class PDOTitulosRepository implements CRUDRepository, CRUDTitulos
{
  private $conexao;

  public function __construct($conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(): array
  {
    $sqlQuery = "SELECT 
                  t.id, 
                  t.id_tipo_titulo,
                  tt.descricao as descricao_tipo_titulo,
                  t.descricao as descricao_titulo,
                  t.valor,
                  t.dt_criacao,
                  t.dt_vencimento,
                  t.id_cliente,
                  c.nome as nome_cliente,
                  t.id_status,
                  st.descricao as descricao_status_titulo,
                  t.dt_quitacao,
                  t.valor_pago,
                  t.saldo_devedor,
                  t.ultima_atualizacao,
                  t.id_moeda,
                  m.codigo as codigo_moeda
                FROM titulos t
                JOIN tipos_titulo tt ON tt.id = t.id_tipo_titulo
                JOIN clientes c ON c.id = t.id_cliente
                JOIN status_titulo st ON st.id = t.id_status
                JOIN moeda m ON m.id = t.id_moeda";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarListaTitulos($statement);
  }

  public function BuscaPorId($id): array
  {
    $sqlQuery = "SELECT 
                    t.id, 
                    t.id_tipo_titulo,
                    tt.descricao as descricao_tipo_titulo,
                    t.descricao as descricao_titulo,
                    t.valor,
                    t.dt_criacao,
                    t.dt_vencimento,
                    t.id_cliente,
                    c.nome as nome_cliente,
                    t.id_status,
                    st.descricao as descricao_status_titulo,
                    t.dt_quitacao,
                    t.valor_pago,
                    t.saldo_devedor,
                    t.ultima_atualizacao,
                    t.id_moeda,
                    m.codigo as codigo_moeda
                  FROM titulos t
                  JOIN tipos_titulo tt ON tt.id = t.id_tipo_titulo
                  JOIN clientes c ON c.id = t.id_cliente
                  JOIN status_titulo st ON st.id = t.id_status
                  JOIN moeda m ON m.id = t.id_moeda
                  WHERE id = ?";

    $statement = $this->conexao->query($sqlQuery);
    $statement->bindValue(1, $id);
    $statement->execute();

    return $this->hidratarListaTitulos($statement); 
  }

  private function hidratarListaTitulos($statement) : array
  {
    $tituloDataList = $statement->fetchAll();
    $tituloList = [];

    foreach ($tituloDataList as $row) {
      $tituloList[] = new Titulo(
        $row["id"], $row["id_tipo_titulo"], $row["descricao_tipo_titulo"], $row["descricao_titulo"], $row["valor"], new \DateTimeImmutable($row["dt_criacao"]),
        new \DateTimeImmutable($row["dt_vencimento"]), $row["id_cliente"], $row["id_status"], $row["descricao_status_titulo"], new \DateTimeImmutable($row["dt_quitacao"]),
        $row["valor_pago"], $row["saldo_devedor"], new \DateTimeImmutable($row["ultima_atualizacao"]), $row["id_moeda"], $row["codigo_moeda"], $row["nome_cliente"]
      );
    }

    return $tituloList;
  }

  public function Salvar(Titulo $titulo): bool
  {
    if($titulo->getId() === null){
      return $this->insert($titulo);
    }

    return $this->update($titulo);
  }

  private function insert(Titulo $titulo): bool
  {
    $sqlInsert = "INSERT INTO titulos (id_tipo_titulo, descricao, valor, dt_criacao, dt_vencimento, id_cliente, id_status, dt_quitacao, valor_pago, saldo_devedor, ultima_atualizacao, id_moeda)
                  VALUES (:id_tipo_titulo, :descricao, :valor, :dt_criacao, :dt_vencimento, :id_cliente, :id_status, :dt_quitacao, :valor_pago, :saldo_devedor, :ultima_atualizacao, :id_moeda);";
    
    $statement = $this->conexao->prepare($sqlInsert);
    $statement->bindValue(":id_tipo_titulo", $titulo->tiposTitulo->getId());
    $statement->bindValue(":descricao", $titulo->getDescricao());
    $statement->bindValue(":valor", $titulo->getValor());
    $statement->bindValue(":dt_criacao", $titulo->getDtCriacao()->format("Y-m-d"));
    $statement->bindValue(":dt_vencimento", $titulo->getDtVencimento()->format("Y-m-d"));
    $statement->bindValue(":id_cliente", $titulo->cliente->getId());
    $statement->bindValue(":id_status", $titulo->statusTitulo->getId());
    $statement->bindValue(":dt_quitacao", $titulo->getDtQuitacao()->format("Y-m-d"));
    $statement->bindValue(":valor_pago", $titulo->getValorPago());
    $statement->bindValue(":saldo_devedor", $titulo->getSaldoDevedor());
    $statement->bindValue(":ultima_atualizacao", $titulo->dtUltimaAtualizacao()->format("Y-m-d"));
    $statement->bindValue(":id_moeda", $titulo->moeda->getId());

    $success = $statement->execute();

    if($success){
      $titulo->setId($this->conexao->lastInsertId());
    }

    return $success;
  }

  private function update(Titulo $titulo) : bool
  {
    $sqlUpdate = "UPDATE titulos SET id_tipo_titulo = :id_tipo_titulo, descricao = :descricao, valor = :valor, dt_criacao = :dt_criacao, dt_vencimento = :dt_vencimento
                  id_cliente = :id_cliente, id_status = :id_status, dt_quitacao = :dt_quitacao, valor_pago = :valor_pago, saldo_devedor = :saldo_devedor, 
                  ultima_atualizacao = :ultima_atualizacao, id_moeda = :id_moeda 
                  WHERE id = :id";
    $statement = $this->conexao->prepare($sqlUpdate);
    $statement->bindValue(":id_tipo_titulo", $titulo->tiposTitulo->getId());
    $statement->bindValue(":descricao", $titulo->getDescricao());
    $statement->bindValue(":valor", $titulo->getValor());
    $statement->bindValue(":dt_criacao", $titulo->getDtCriacao());
    $statement->bindValue(":dt_vencimento", $titulo->getDtVencimento());
    $statement->bindValue(":id_cliente", $titulo->cliente->getId());
    $statement->bindValue(":id_status", $titulo->statusTitulo->getId());
    $statement->bindValue(":dt_quitacao", $titulo->getDtQuitacao());
    $statement->bindValue(":valor_pago", $titulo->getValorPago());
    $statement->bindValue(":saldo_devedor", $titulo->getSaldoDevedor());
    $statement->bindValue(":ultima_atualizacao", $titulo->dtUltimaAtualizacao()->format("Y-m-d"));
    $statement->bindValue(":id_moeda", $titulo->moeda->getId());

    return $statement->execute();
  }

  public function Remover($id): bool
  {
    $sqlDelete = "DELETE FROM titulos WHERE id = :id";
    $statement = $this->conexao->prepare($sqlDelete);
    $statement->bindValue(":id", $id, \PDO::PARAM_INT);

    return $statement->execute();
  }
}
