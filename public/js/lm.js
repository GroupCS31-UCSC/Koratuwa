var cattle= document.getElementById('cattle').getContext('2d');
var myChart= new Chart(cattle, {
  type: 'polarArea',
  data: {
    labels: ['Killes Vaccine', 'Live attenuated vaccine', 'Toxoid vaccine', 'Subunit vaccine'],
    datasets: [{
      label: 'Vaccine Types',
      data: [20,40,150,30],
      backgroundColor: [
        'rgba(255, 99, 132)',,
        'rgba(75, 192, 192)',
        'rgba(255, 205, 86)',
        'rgba(201, 203, 207)',
      ],
      borderWidth:0.5
    }]
  },
  options: {
    responsive: true,

  }
});


var pCattle= document.getElementById('pCattle').getContext('2d');
var myChart= new Chart(pCattle, {
  type: 'doughnut',
  data: {
    labels: ['Pregnant', 'Milking Cattle'],
    datasets: [{
      label: 'Milking Cattle Precentages',
      data: [90, 10],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',,
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