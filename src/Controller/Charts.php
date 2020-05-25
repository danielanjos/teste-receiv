<?php

namespace Receiv\Controller;

use Receiv\Infra\Persistence\CriaConexao;
use Receiv\Infra\Repository\PDODashboardRepository;

class Charts implements InterfaceControlaRotas
{

  public function ProcessaRequisicao(): void
  {

    $conexao = CriaConexao::criaConexao();
    $pdoDashboardRepository = new PDODashboardRepository($conexao);
    $primeiroChart = $pdoDashboardRepository->primeiroChart();
    $segundoChart = $pdoDashboardRepository->segundoChart();
    $terceiroChart = $pdoDashboardRepository->terceiroChart();
    $quartoChart = $pdoDashboardRepository->quartoChart();
    
    $retorno = [
      "primeiroChart" => $primeiroChart,
      "segundoChart" => $segundoChart,
      "terceiroChart" => $terceiroChart,
      "quartoChart" => $quartoChart
    ];

    $json = json_encode($retorno);
    
    echo $json;
  }
}