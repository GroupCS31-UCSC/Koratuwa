
//charts - Dashboard page
var profit= document.getElementById('quality').getContext('2d');
var myChart= new Chart(quality, {
  type: 'doughnut',
  data: {
    labels: ['Good', 'Average', 'Bad'],
    datasets: [{
      label: 'collected milk quality',
      data: [35,10,5],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',,
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
      ],
      borderWidth:0.5
    }]
  },
  options: {
    responsive: true,

  }
});

var totProfit= document.getElementById('price').getContext('2d');
var myChart= new Chart(price, {
  type: 'line',
  data: {
    labels: ['13', '14', '15', '16', '17', '18', '19',],
    datasets: [{
      label: 'Last 7 days purchasing price',
      data: [90,96,102,80,95,90,88],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',,
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
      ],
      borderWidth:0.5
    }]
  },
  options: {
    responsive: true,

  }
});
