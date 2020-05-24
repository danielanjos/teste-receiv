<?php

namespace Receiv\Repository;

use Receiv\Entity\Cliente;

interface CRUDCliente
{

  public function Salvar(Cliente $cliente) : bool;

}