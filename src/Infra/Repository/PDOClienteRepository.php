<?php

namespace Receiv\Infra\Repository;

use DateTimeImmutable;
use Exception;
use Receiv\Entity\Cliente;
use Receiv\Entity\Enderecos;
use Receiv\Repository\CRUDCliente;
use Receiv\Repository\CRUDRepository;

class PDOClienteRepository implements CRUDRepository, CRUDCliente
{
  private \PDO $conexao;

  public function __construct(\PDO $conexao)
  {
    $this->conexao = $conexao;
  }

  public function Todos(): array
  {
    $sqlQuery = "SELECT 
                  c.id,
                  c.id_tipo_pessoa,
                  c.cpf_cnpj,
                  c.nome,
                  c.dt_nascimento,
                  t.id as idTiposPessoa,
                  t.descricao as dsTipoPessoa
                FROM clientes c
                JOIN tipos_pessoa t ON t.id = c.id_tipo_pessoa 
                ORDER BY c.id DESC";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarListaClientes($statement);
  }

  public function BuscaPorId($id): array
  {
    $sqlQuery = "SELECT 
                  c.id,
                  c.id_tipo_pessoa,
                  c.cpf_cnpj,
                  c.nome,
                  c.dt_nascimento,
                  t.id as idTiposPessoa,
                  t.descricao as dsTipoPessoa
                FROM clientes c
                JOIN tipos_pessoa t ON t.id = c.id_tipo_pessoa
                WHERE c.id = ?";

    $statement = $this->conexao->prepare($sqlQuery);
    $statement->bindValue(1, $id);
    $statement->execute();

    return $this->hidratarListaClientes($statement); 
  }

  public function BuscaPorCPF_CNPJ($cpf_cnpj): array
  {
    $sqlQuery = "SELECT 
                  c.id,
                  c.id_tipo_pessoa,
                  c.cpf_cnpj,
                  c.nome,
                  c.dt_nascimento,
                  t.id as idTiposPessoa,
                  t.descricao as dsTipoPessoa
                FROM clientes c
                JOIN tipos_pessoa t ON t.id = c.id_tipo_pessoa
                WHERE cpf_cnpj = ?";

    $statement = $this->conexao->prepare($sqlQuery);
    $statement->bindValue(1, $cpf_cnpj);
    $statement->execute();

    return $this->hidratarListaClientes($statement); 
  }

  private function hidratarListaClientes($statement) : array
  {
    $clienteDataList = $statement->fetchAll();
    $clienteList = [];

    foreach ($clienteDataList as $row) {
      $clienteList[] = new Cliente(
        $row["id"], $row["id_tipo_pessoa"], $row["dsTipoPessoa"], $row["cpf_cnpj"],
        $row["nome"], new DateTimeImmutable($row["dt_nascimento"])
      );
    }

    return $clienteList;
  }

  public function Salvar(Cliente $cliente): bool
  {
    
    if($cliente->getId() === null || $cliente->getId() == 0){
      return $this->insert($cliente);
    }

    return $this->update($cliente);
  }

  private function insert(Cliente $cliente): bool
  {
    
    $sqlInsert = "INSERT INTO clientes (id_tipo_pessoa, cpf_cnpj, nome, dt_nascimento)
              VALUES (:id_tipo_pessoa, :cpf_cnpj, :nome, :dt_nascimento)";
              
    $statement = $this->conexao->prepare($sqlInsert);

    

    $success = $statement->execute([
      ":id_tipo_pessoa" => $cliente->tiposPessoa->getId(),
      ":cpf_cnpj" => $cliente->getCpf_cnpj(),
      ":nome" => $cliente->getNome(),
      ":dt_nascimento" => $cliente->getDtNascimento()->format("Y-m-d")
    ]);

    if($success){
      $cliente->setId($this->conexao->lastInsertId());
    }

    return $success;
  }

  private function update(Cliente $cliente) : bool
  {
    $sqlUpdate = "UPDATE clientes SET id_tipo_pessoa = :id_tipo_pessoa, cpf_cnpj = :cpf_cnpj, nome = :nome, dt_nascimento = :dt_nascimento WHERE id = :id";
    $statement = $this->conexao->prepare($sqlUpdate);
    $statement->bindValue(":id_tipo_pessoa", $cliente->tiposPessoa->getId());
    $statement->bindValue(":cpf_cnpj", $cliente->getCpf_cnpj());
    $statement->bindValue(":nome", $cliente->getNome());
    $statement->bindValue(":dt_nascimento", $cliente->getDtNascimento()->format("Y-m-d"));
    $statement->bindValue(":id", $cliente->getId());

    return $statement->execute();
  }

  public function Remover($id): bool
  {

    $pdoEnderecosRepository = new PDOEnderecosRepository($this->conexao);
    $pdoEnderecosRepository->RemoverTodosPorCliente($id);

    $sqlDelete = "DELETE FROM clientes WHERE id = :id";
    $statement = $this->conexao->prepare($sqlDelete);
    $statement->bindValue(":id", $id, \PDO::PARAM_INT);

    return $statement->execute();
  }

  public function BuscaPorIdComEndereco($id): array
  {
    $sqlQuery = "SELECT 
                    c.id,
                    c.id_tipo_pessoa,
                    c.cpf_cnpj,
                    c.nome,
                    c.dt_nascimento,
                    t.id as idTiposPessoa,
                    t.descricao as dsTipoPessoa,
                    e.id as idEndereco,
                    te.id idTipoEndereco,
                    te.descricao as dsTipoEndereco,
                    e.cep,
                    e.descricao as dsEndereco,
                    e.bairro,
                    e.cidade,
                    e.estado,
                    e.numero,
                    e.fl_principal
                  FROM clientes c
                  JOIN tipos_pessoa t ON t.id = c.id_tipo_pessoa
                  JOIN enderecos e ON e.id_cliente = c.id
                  JOIN tipos_endereco te ON te.id = e.id_tipo_endereco
                  WHERE c.id = ?";
    
    $statement = $this->conexao->prepare($sqlQuery);
    $statement->bindValue(1, $id);
    $statement->execute();

    $result = $statement->fetchAll();
    $clienteList = [];

    foreach($result as $row){
      if(!array_key_exists($row["id"], $clienteList)){
        $clienteList[$row["id"]] = new Cliente(
          $row["id"], $row["id_tipo_pessoa"], $row["dsTipoPessoa"], $row["cpf_cnpj"],
          $row["nome"], new DateTimeImmutable($row["dt_nascimento"])
        );
      }

      $endereco = new Enderecos(
        $row["idEndereco"], $row["idTipoEndereco"],
        $row["cep"], $row["dsTipoEndereco"], $row["dsEndereco"], $row["bairro"],
        $row["cidade"], $row["estado"], $row["numero"], $row["id"], $row["fl_principal"]
      );
      
      $clienteList[$row["id"]]->addEndereco($endereco);
    }

    return $clienteList;
  }
}
