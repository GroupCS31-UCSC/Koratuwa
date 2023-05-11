//charts - Ptoduct Manager Dashboard page

var profit= document.getElementById('ch2').getContext('2d');
var myChart= new Chart(profit, {
  type: 'doughnut',
  
  $var1,
  $var2,
  $var3,
  $var4,
  $var5,
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






//search for table 1--expense table-----------------------------------------------------------------------------------------------------------

//search bar
function searchFunc(){
  //declare variables
  var input,filter,table,tr,td,i,textValue;

  input = document.getElementById("searchInput");

  // to search case-sensitive
  filter = input.value.toUpperCase();
  table = document.getElementById("detailsTable");

  tr = table.getElementsByTagName("tr");

  //loop through all table rows and hide those don't match the search
  for(i=0; i < tr.length; i++){
      td=tr[i].getElementsByTagName("td")[2];
      if(td){
          textValue = td.textContent || td.innerText;

          if(textValue.toUpperCase().indexOf(filter) > -1)
          {
              tr[i].style.display = "";
          }
          else{
              tr[i].style.display = "none";
          }
      }
  }
}


//search for table 2----revenue table---------------------------------------------------------------------------------------------------------

//search bar
function searchFunc2(){
  //declare variables
  var input,filter,table,tr,td,i,textValue;

  input = document.getElementById("searchInput2");

  // to search case-sensitive
  filter = input.value.toUpperCase();
  table = document.getElementById("detailsTable2");

  tr = table.getElementsByTagName("tr");

  //loop through all table rows and hide those don't match the search
  for(i=0; i < tr.length; i++){
      td=tr[i].getElementsByTagName("td")[2];
      if(td){
          textValue = td.textContent || td.innerText;

          if(textValue.toUpperCase().indexOf(filter) > -1)
          {
              tr[i].style.display = "";
          }
          else{
              tr[i].style.display = "none";
          }
      }
  }
}
