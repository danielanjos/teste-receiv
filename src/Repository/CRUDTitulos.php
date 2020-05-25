<?php

namespace Receiv\Repository;

use Receiv\Entity\Titulo;

interface CRUDTitulos
{

  public function Salvar(Titulo $titulo) : bool;

}