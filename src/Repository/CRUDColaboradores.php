<?php

namespace Receiv\Repository;

use Receiv\Entity\Colaborador;

interface CRUDColaboradores
{

  public function Salvar(Colaborador $colaborador) : bool;

}