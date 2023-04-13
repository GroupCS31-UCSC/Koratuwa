//charts - Ptoduct Manager Dashboard page
var profit= document.getElementById('ch2').getContext('2d');
var myChart= new Chart(profit, {
  type: 'doughnut',
  data: {
    labels: ['Fresh Milk', 'Yogurts', 'Cheese', 'Flavoured Milk'],
    datasets: [{
      label: 'profit by Productions',
      data: [5200,500,180,4010],
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

var totProfit= document.getElementById('ch1').getContext('2d');
var myChart= new Chart(totProfit, {
  type: 'bar',
  data: {
    labels: ['June', 'July', 'August', 'September', 'October', 'November'],
    datasets: [{
      label: 'Total production in literes',
      data: [3200,2090,1080,4010,1240,700],
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
