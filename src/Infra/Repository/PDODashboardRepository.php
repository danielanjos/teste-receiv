<?php

namespace Receiv\Infra\Repository;

use Receiv\Entity\Charts;

class PDODashboardRepository
{
  private \PDO $conexao;

  public function __construct(\PDO $conexao)
  {
    $this->conexao = $conexao;
  }

  public function primeiroChart(): array
  {
    $sqlQuery = "SELECT 
                  'primeiroChart' as nome,
                  IFNULL(COUNT(*), 0) as dias30,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND DATE_ADD(NOW(), INTERVAL -30 DAY)) AS dias60,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -90 DAY) AND DATE_ADD(NOW(), INTERVAL -60 DAY)) AS dias90,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -120 DAY) AND DATE_ADD(NOW(), INTERVAL -90 DAY)) AS dias120,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -180 DAY) AND DATE_ADD(NOW(), INTERVAL -120 DAY)) AS dias180
                  FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -30 DAY) AND NOW()";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarCharts($statement);
  }

  public function segundoChart(): array
  {
    $quitados = $this->segundoChartQuitados();
    $vigentes = $this->segundoChartVigentes();

    return [
      "quitados" => $quitados,
      "vigentes" => $vigentes
    ];
  }

  private function segundoChartQuitados(): array
  {
    $sqlQuery = "SELECT 
                  'segundoChart' as nome,
                  IFNULL(COUNT(*), 0) as dias30,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND DATE_ADD(NOW(), INTERVAL -30 DAY)) AS dias60,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -90 DAY) AND DATE_ADD(NOW(), INTERVAL -60 DAY)) AS dias90,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -120 DAY) AND DATE_ADD(NOW(), INTERVAL -90 DAY)) AS dias120,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -180 DAY) AND DATE_ADD(NOW(), INTERVAL -120 DAY)) AS dias180
                  FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -30 DAY) AND NOW()
                  AND id_status = 1";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarCharts($statement);
  }

  private function segundoChartVigentes(): array
  {
    $sqlQuery = "SELECT 
                  'segundoChart' as nome,
                  IFNULL(COUNT(*), 0) as dias30,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND DATE_ADD(NOW(), INTERVAL -30 DAY)) AS dias60,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -90 DAY) AND DATE_ADD(NOW(), INTERVAL -60 DAY)) AS dias90,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -120 DAY) AND DATE_ADD(NOW(), INTERVAL -90 DAY)) AS dias120,
                  (SELECT COUNT(*) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -180 DAY) AND DATE_ADD(NOW(), INTERVAL -120 DAY)) AS dias180
                  FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -30 DAY) AND NOW()
                  AND id_status = 2";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarCharts($statement);
  }

  public function terceiroChart(): array
  {
    $sqlQuery = "SELECT 
                  'terceiroChart' as nome,
                  IFNULL(SUM(valor), 0) as dias30,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND DATE_ADD(NOW(), INTERVAL -30 DAY)), 0) AS dias60,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -90 DAY) AND DATE_ADD(NOW(), INTERVAL -60 DAY)), 0) AS dias90,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -120 DAY) AND DATE_ADD(NOW(), INTERVAL -90 DAY)), 0) AS dias120,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -180 DAY) AND DATE_ADD(NOW(), INTERVAL -120 DAY)), 0) AS dias180
                  FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -30 DAY) AND NOW()";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarCharts($statement);
  }

  public function quartoChart(): array
  {
    $quitados = $this->quartoChartQuitados();
    $vigentes = $this->quartoChartVigentes();

    return [
      "quitados" => $quitados,
      "vigentes" => $vigentes
    ];
  }

  private function QuartoChartQuitados(): array
  {
    $sqlQuery = "SELECT 
                  'quartoChart' as nome,
                  IFNULL(SUM(valor), 0) as dias30,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND DATE_ADD(NOW(), INTERVAL -30 DAY)), 0) AS dias60,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -90 DAY) AND DATE_ADD(NOW(), INTERVAL -60 DAY)), 0) AS dias90,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -120 DAY) AND DATE_ADD(NOW(), INTERVAL -90 DAY)), 0) AS dias120,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -180 DAY) AND DATE_ADD(NOW(), INTERVAL -120 DAY)), 0) AS dias180
                  FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -30 DAY) AND NOW()
                  AND id_status = 1";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarCharts($statement);
  }

  private function QuartoChartVigentes(): array
  {
    $sqlQuery = "SELECT 
                  'quartoChart' as nome,
                  IFNULL(SUM(valor), 0) as dias30,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND DATE_ADD(NOW(), INTERVAL -30 DAY)), 0) AS dias60,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -90 DAY) AND DATE_ADD(NOW(), INTERVAL -60 DAY)), 0) AS dias90,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -120 DAY) AND DATE_ADD(NOW(), INTERVAL -90 DAY)), 0) AS dias120,
                  IFNULL((SELECT SUM(valor) FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -180 DAY) AND DATE_ADD(NOW(), INTERVAL -120 DAY)), 0) AS dias180
                  FROM titulos WHERE ultima_atualizacao BETWEEN DATE_ADD(NOW(), INTERVAL -30 DAY) AND NOW()
                  AND id_status = 2";

    $statement = $this->conexao->query($sqlQuery);
    return $this->hidratarCharts($statement);
  }

  private function hidratarCharts($statement): array
  {
    $chartDataList = $statement->fetchAll();
    $chartList = [];

    foreach ($chartDataList as $row) {
      $chartList[] = new Charts(
        $row["nome"],
        $row["dias30"],
        $row["dias60"],
        $row["dias90"],
        $row["dias120"],
        $row["dias180"]
      );
    }

    return $chartList;
  }
}
