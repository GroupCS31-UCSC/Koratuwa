// Chart - Cashier dashboard
var order = document.getElementById('order').getContext('2d');
var myChart = new Chart(order, {
    type: 'bar',
    data: {
        labels: ['February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Orders for next 6 months',
            data: [200, 150, 500, 401, 120, 380],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', ,
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderWidth: 0.5
        }]
    },
    options: {
        responsive: true,

    }
});

var type= document.getElementById('type').getContext('2d');
var myChart= new Chart(type, {
  type: 'doughnut',
  data: {
    labels: ['Online', 'Onside'],
    datasets: [{
      label: 'Sales Precentages',
      data: [60, 40],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 206, 86, 0.2)',
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 206, 86, 1)',
      ],
      borderWidth:0.5
    }]
  },
  options: {
    responsive: true,

  }
});