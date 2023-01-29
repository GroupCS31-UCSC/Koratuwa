
<script>
//dropdown menu - Dashboard page
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<script>
//charts - Admin Dashboard page
var profit= document.getElementById('profit').getContext('2d');
var myChart= new Chart(profit, {
  type: 'doughnut',
  data: {
    labels: ['Milk Packets', 'Yogurts', 'Cheese', 'Fresh Milk'],
    datasets: [{
      label: 'profit by Productions',
      data: [32000,29000,18000,41000],
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

var totProfit= document.getElementById('earning').getContext('2d');
var myChart= new Chart(totProfit, {
  type: 'bar',
  data: {
    labels: ['June', 'July', 'August', 'September', 'October', 'November'],
    datasets: [{
      label: 'Total profit',
      data: [320000,209000,108000,401000,120040,380000],
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

</script>



<script>
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

</script>


<!--charts - Livestock Dashboard page -->
<script>
var cattle= document.getElementById('cattle').getContext('2d');
var myChart= new Chart(cattle, {
  type: 'polarArea',
  data: {
    labels: ['Calf', 'Pregnant Cattles', 'Female Cattles', 'Male Cattels'],
    datasets: [{
      label: 'Cattls',
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

</script>


<script>
//toggle menu - Dashboard page
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function()
{
  navigation.classList.toggle('active');
  main.classList.toggle('active');
}


let list = document.querySelectorAll('.navigation li');

function activeLink()
{
  list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');

}
list.forEach((item) =>
  item.addEventListener('mouseover',activeLink));
</script>


<script>
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

</script>



<script>
//toggle menu - Dashboard page
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function()
{
  navigation.classList.toggle('active');
  main.classList.toggle('active');
}


let list = document.querySelectorAll('.navigation li');

function activeLink()
{
  list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');

}
list.forEach((item) =>
  item.addEventListener('mouseover',activeLink));
</script>

<!--_______________________________________________________________________________________ -->
</body>
</html>
