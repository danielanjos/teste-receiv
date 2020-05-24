<?php

namespace Receiv\Repository;

interface CRUDRepository
{
  public function Todos() : array;
  
  public function BuscaPorId() : array;

  public function Remover($id) : bool;
}