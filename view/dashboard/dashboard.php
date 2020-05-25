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
            <h4>Titulos Cadastrados nos ultimos 6 meses</h4>
          </header>
          <canvas id="primeiroChart"></canvas>
        </div>
      </section>
    </li>
    <li>
      <section class="painel">
        <div class="content-painel">
          <header class="content-painel-header">
            <h4>Vigentes x Quitados (6 meses)</h4>
          </header>
          <canvas id="segundoChart"></canvas>
        </div>
      </section>
    </li>
    <li>
      <section class="painel">
        <div class="content-painel">
          <header class="content-painel-header">
            <h4>Valores dos titulos (6 meses)</h4>
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


<!--  -->



<script type="text/jscript" src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/jscript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/jscript" src="/js/charts.js"></script>


<?php include __DIR__ . '/../rodape.php'; ?>