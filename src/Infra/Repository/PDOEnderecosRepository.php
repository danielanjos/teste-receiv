<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\Enderecos;
use Receiv\Repository\CRUDEnderecos;
use Receiv\Repository\CRUDRepository;

class PDOEnderecosRepository implements CRUDRepository, CRUDEnderecos
{

  private \PDO $conexao;

  public function __construct(\PDO $conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(): array
  {
    $sqlQuery = "SELECT 
                  e.id,
                  te.id,
                  te.descricao,
                  e.cep,
                  e.descricao as dsEndereco,
                  e.bairro,
                  e.cidade,
                  e.estado,
                  e.numero,
                  e.fl_principal
              FROM enderecos e
              JOIN tipos_endereco te ON te.id = e.id_tipo_endereco";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarListaEnderecos($statement);
  }

  public function BuscaPorId($id): array
  {
    $sqlQuery = "SELECT 
                    e.id,
                    te.id as idTipoEndereco,
                    te.descricao as dsTipoEndereco,
                    e.cep,
                    e.descricao as dsEndereco,
                    e.bairro,
                    e.cidade,
                    e.estado,
                    e.numero,
                    e.id_cliente,
                    e.fl_principal
                FROM enderecos e
                JOIN tipos_endereco te ON te.id = e.id_tipo_endereco;
                WHERE e.id = ?";

    $statement = $this->conexao->query($sqlQuery);
    $statement->bindValue(1, $id);
    $statement->execute();

    return $this->hidratarListaEnderecos($statement); 
  }

  private function hidratarListaEnderecos($statement) : array
  {
    $enderecoDataList = $statement->fetchAll();
    $enderecoList = [];

    foreach ($enderecoDataList as $row) {
      $enderecoList[] = new Enderecos(
        $row["id"], $row["idTipoEndereco"], $row["dsTipoEndereco"], $row["cep"], $row["dsEndereco"], 
        $row["bairro"], $row["cidade"], $row["estado"], $row["numero"], $row["id_cliente"], $row["fl_principal"]
      );
    }

    return $enderecoList;
  }

  public function Salvar(Enderecos $endereco): bool
  {
    if($endereco->getId() === null){
      return $this->insert($endereco);
    }

    return $this->update($endereco);
  }

  private function insert(Enderecos $endereco): bool
  {
    $sqlInsert = "INSERT INTO enderecos (id_tipo_endereco, cep, descricao, bairro, cidade, estado, numero, id_cliente, fl_principal)
              VALUES (:id_tipo_endereco, :cep, :descricao, :bairro, :cidade, :estado, :numero, :id_cliente, :fl_principal)";
    $statement = $this->conexao->prepare($sqlInsert);
    $statement->bindValue(":descricao", $endereco->getDescricao());
    $statement->bindValue(":bairro", $endereco->getBairro());
    $statement->bindValue(":cidade", $endereco->getCidade());
    $statement->bindValue(":estado", $endereco->getEstado());
    $statement->bindValue(":numero", $endereco->getNumero());
    $statement->bindValue(":id_cliente", $endereco->getIdCliente());
    $statement->bindValue(":fl_principal", $endereco->getFlPrincipal());
    $success = $statement->execute();

    if($success){
      $endereco->setId($this->conexao->lastInsertId());
    }

    return $success;
  }

  private function update(Enderecos $endereco) : bool
  {
    $sqlUpdate = "UPDATE enderecos SET id_tipo_endereco = :id_tipo_endereco, cep = :cep, descricao = :descricao, 
                bairro = :bairro, cidade = :cidade, estado = :estado, numero = :numero, id_cliente = :idCliente, fl_principal = :fl_principal 
                WHERE id = :id";

    $statement = $this->conexao->prepare($sqlUpdate);
    $statement->bindValue(":id_tipo_endereco", $endereco->tiposEnderecos->getId());
    $statement->bindValue(":cep", $endereco->getCep());
    $statement->bindValue(":descricao", $endereco->getDescricao());
    $statement->bindValue(":bairro", $endereco->getBairro());
    $statement->bindValue(":cidade", $endereco->getCidade());
    $statement->bindValue(":estado", $endereco->getEstado());
    $statement->bindValue(":numero", $endereco->getNumero());
    $statement->bindValue(":id_cliente", $endereco->getIdCliente());
    $statement->bindValue(":fl_principal", $endereco->getFlPrincipal());

    return $statement->execute();
  }

  public function Remover($id): bool
  {
    $sqlDelete = "DELETE FROM enderecos WHERE id = :id";
    $statement = $this->conexao->prepare($sqlDelete);
    $statement->bindValue(":id", $id, \PDO::PARAM_INT);

    return $statement->execute();
  }

  public function RemoverTodosPorCliente($idCliente): bool
  {
    $sqlDelete = "DELETE FROM enderecos WHERE idCliente = :id";
    $statement = $this->conexao->prepare($sqlDelete);
    $statement->bindValue(":id", $idCliente, \PDO::PARAM_INT);

    return $statement->execute();
  }
}