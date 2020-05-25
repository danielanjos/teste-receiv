<?php include __DIR__ . '/../cabecalho.php'; ?>

<style>
  .content-dashboard ul {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 24px;
    list-style: none;
  }
</style>

<section class="content-dashboard mt-5">
  <ul>
    <li>
      <section class="painel">
        <div class="content-painel">
          <header class="content-painel-header">
            <h4>Titulos Atualizados nos ultimos 180 dias</h4>
          </header>
          <canvas id="primeiroChart"></canvas>
        </div>
      </section>
    </li>
    <li>
      <section class="painel">
        <div class="content-painel">
          <header class="content-painel-header">
            <h4>Vigentes x Quitados (180 dias)</h4>
          </header>
          <canvas id="segundoChart"></canvas>
        </div>
      </section>
    </li>
    <li>
      <section class="painel">
        <div class="content-painel">
          <header class="content-painel-header">
            <h4>Valores dos titulos Atualizados (180 dias)</h4>
          </header>
          <canvas id="terceiroChart"></canvas>
        </div>
      </section>
    </li>
    <li>
      <section class="painel">
        <div class="content-painel">
          <header class="content-painel-header">
            <h4>Valores Vigentes x Valores Quitados</h4>
          </header>
          <canvas id="quartoChart"></canvas>
        </div>
      </section>
    </li>
  </ul>

</section>

<script type="text/jscript" src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/jscript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/jscript" src="/js/charts.js"></script>
<script>
  var xhr = new XMLHttpRequest();

  xhr.open('get', '/dashboard/charts');
  xhr.addEventListener('load', function(e) {
    console.log(JSON.parse(this.responseText));
  }, false);
  xhr.send();

  xhr.addEventListener('load', function(e) {
    var o = JSON.parse(xhr.responseText); //or e.responseText
    //work with our object
    console.log("log");
    console.log(o.primeiroChart[0].dias30);

    customPrimeiroChart.data.datasets[0].data = [
      o.primeiroChart[0].dias30,
      o.primeiroChart[0].dias60,
      o.primeiroChart[0].dias90,
      o.primeiroChart[0].dias120,
      o.primeiroChart[0].dias180,
    ]
    customPrimeiroChart.update();

    console.log(o.segundoChart.quitados[0])

    customSegundoChart.data.datasets[0].data = [
      o.segundoChart.quitados[0].dias30,
      o.segundoChart.quitados[0].dias60,
      o.segundoChart.quitados[0].dias90,
      o.segundoChart.quitados[0].dias120,
      o.segundoChart.quitados[0].dias180,
    ]

    customSegundoChart.data.datasets[1].data = [
      o.segundoChart.vigentes[0].dias30,
      o.segundoChart.vigentes[0].dias60,
      o.segundoChart.vigentes[0].dias90,
      o.segundoChart.vigentes[0].dias120,
      o.segundoChart.vigentes[0].dias180,
    ]
    customSegundoChart.update();

    customTerceiroChart.data.datasets[0].data = [
      o.terceiroChart[0].dias30,
      o.terceiroChart[0].dias60,
      o.terceiroChart[0].dias90,
      o.terceiroChart[0].dias120,
      o.terceiroChart[0].dias180,
    ]
    customTerceiroChart.update();

    customQuartoChart.data.datasets[0].data = [
      o.quartoChart.quitados[0].dias30,
      o.quartoChart.quitados[0].dias60,
      o.quartoChart.quitados[0].dias90,
      o.quartoChart.quitados[0].dias120,
      o.quartoChart.quitados[0].dias180,
    ]

    customQuartoChart.data.datasets[1].data = [
      o.quartoChart.vigentes[0].dias30,
      o.quartoChart.vigentes[0].dias60,
      o.quartoChart.vigentes[0].dias90,
      o.quartoChart.vigentes[0].dias120,
      o.quartoChart.vigentes[0].dias180,
    ]
    customQuartoChart.update();


  }, false);
</script>

<?php include __DIR__ . '/../rodape.php'; ?>