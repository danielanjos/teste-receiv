const primeiroChart = document.getElementById('primeiroChart');
customPrimeiroChart = new Chart(primeiroChart, {
  type: 'bar',
  data: {
    labels: ['120-180', '90-120', '60-90', '30-60', '30 Dias'],
    datasets: [
      {
        label: '# de tarefas',
        data: [30, 55, 87, 60, 27],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)',
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
      }
    ]
  },
  options: {
    responsive: true,
    legend: {
        display: false,
        labels: {
            boxWidth: 15
        }
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
  }
});

const segundoChart = document.getElementById('segundoChart');
customSegundoChart = new Chart(segundoChart, {
  type: 'line',
  data: {
    labels: ['120-180', '90-120', '60-90', '30-60', '30 Dias'],
    datasets: [
      {
        label: '# de tarefas',
        data: [30, 55, 87, 60, 27],
        backgroundColor: [
          'rgba(54, 162, 235, 0.0)',
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
        ],
        borderWidth: 1
      },
      {
        label: '# de tarefas',
        data: [80, 70, 12, 60, 27],
        backgroundColor: [
          'rgba(255, 99, 132, 0.0)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
      }
    ]
  },
  options: {
    responsive: true,
    legend: {
        display: false,
        labels: {
            boxWidth: 15
        }
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
  }
});

const terceiroChart = document.getElementById('terceiroChart');
customTerceiroChart = new Chart(terceiroChart, {
  type: 'bar',
  data: {
    labels: ['120-180', '90-120', '60-90', '30-60', '30 Dias'],
    datasets: [
      {
        label: '# de tarefas',
        data: [30, 55, 87, 60, 27],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)',
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
      }
    ],
    
  },
  options: {
    responsive: true,
    legend: {
        display: false,
        labels: {
            boxWidth: 15
        }
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
  }
});

const quartoChart = document.getElementById('quartoChart');
customQuartoChart = new Chart(quartoChart, {
  type: 'line',
  data: {
    labels: ['120-180', '90-120', '60-90', '30-60', '30 Dias'],
    datasets: [
      {
        label: '# de tarefas',
        data: [30, 55, 87, 60, 27],
        backgroundColor: [
          'rgba(54, 162, 235, 0.0)',
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
        ],
        borderWidth: 1
      },
      {
        label: '# de tarefas',
        data: [80, 70, 12, 60, 27],
        backgroundColor: [
          'rgba(255, 99, 132, 0.0)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
      }
    ]
  },
  options: {
    responsive: true,
    legend: {
        display: false,
        labels: {
            boxWidth: 15
        }
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
  }
});