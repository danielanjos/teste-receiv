<?php

namespace Receiv\Helper;

trait FlashMessageTrait
{
  public function defineMensagem($tipo, $mensagem): void
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;
    }
}