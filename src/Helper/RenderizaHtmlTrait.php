<?php

namespace Receiv\Helper;

trait RenderizaHtmlTrait
{
  public function renderizaHtml($caminhoTemplate, array $dados) : string
  {
    extract($dados);

    ob_start();
    require __DIR__ . "/../../view/" . $caminhoTemplate;
    
    return ob_get_clean();
  }
}