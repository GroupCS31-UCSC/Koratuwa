//charts - sup income page
var ctx2 = document.getElementById('income');
fetch('http://localhost/koratuwa/Supplier/supIncomeChart')
    .then(response => response.json())
    .then(data => {
      let month_names = data.map(obj => obj.supply_date);
      let income_amount = data.map(obj => obj.total_payment);

      new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: month_names,
          datasets: [{
            label: 'Income(Rs.)',
            data: income_amount,
            backgroundColor:[
                'rgba(21, 102, 255, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(101, 102, 255, 0.2)',
                'rgba(153, 74, 255, 0.2)',
            ],
            borderColor:['rgba(255, 99, 132, 1)'],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });    

    })
    .catch(error => console.error(error));



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

//-------sup_income charts-----------//
var totProfit= document.getElementById('income').getContext('2d');
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

// view supplier order

function openModel1(id){
  // var id = data["id"];
  const url ="/koratuwa/Milk_Collection_Officer/collectionDetails/"+id;
  const form = new FormData();
  form.append("id", id);
  fetch(url, {
    method: "GET"
  }).then(response => response.text())
  .then(data => {
      // console.log(data);
    if(data){
    const domp=new DOMParser();
    const doc= domp.parseFromString(data,'text/html');
    const newData = doc.getElementById('newData');
    document.getElementById("newData").innerHTML = newData.innerHTML;
    
  //   document.getElementById("Model_Cow_Id").innerText = data.cow_id;
  //   document.getElementById("Model_Quantity").innerText = data.quantity;
    }

  });
  document.getElementById("model").classList.add("open-model");

  
}

  //--------------counter----------------//
  let counterup = document.querySelectorAll(".counter_up");
    let convert = Array.from(counterup);
    convert.map((counteritem) => {
      let counter = 0;
      function count() {
        counter++;
        counteritem.innerHTML = counter;
        if (counter == counteritem.dataset.number) {
          clearInterval(timing);
        }
      }
      let timing = setInterval(() => {
        count();
      }, counteritem.dataset.speed/counter);
  }); 





