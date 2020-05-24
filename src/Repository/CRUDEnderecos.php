<?php

namespace Receiv\Repository;

use Receiv\Entity\Enderecos;

interface CRUDEnderecos
{

  public function RemoverTodosPorCliente($idCliente) : bool;

  public function Salvar(Enderecos $endereco) : bool;

}