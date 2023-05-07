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





//filter for table 1-------------------------------------------------------------------------------------------------------------

//1. Get unique values for the desired columns

// {2 : ["s1", "s2","s3","s4"], 3 : ["f", "m"], 4 : ["gil","sah","per"], 5 : ["yes","no"]}

function getUniqueValuesFromColumn(){

  var unique_col_values_dict = {};
  allFilters = document.querySelectorAll(".table-filter");

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute("col-index");
      // alert(col_index);

      const rows = document.querySelectorAll("#detailsTable > tbody > tr");

      rows.forEach((row) => {
          cell_value = row.querySelector("td:nth-child("+col_index+")").innerHTML;

          // check if the col index is already present in the dict
          if (col_index in unique_col_values_dict){
              // check if the cell value is already present in the array
              if (unique_col_values_dict[col_index].includes(cell_value)){
                  // alert(cell_value + " is already present in the array : " + unique_col_values_dict[col_index]);
              }
              else{
                  unique_col_values_dict[col_index].push(cell_value);
                  // alert("Array after adding the cell value : " + unique_col_values_dict[col_index]);
              }


          }
          else{
              unique_col_values_dict[col_index] = new Array(cell_value);
          }



          
      });

  });

  for(i in unique_col_values_dict){
      // alert("Column index : " + i + " has Unique values : \n" + unique_col_values_dict[i]);
  }

  updateSelectOptions(unique_col_values_dict);
};



//2. Add <option> tags to the desired columns based on the unique values

function updateSelectOptions(unique_col_values_dict){
  allFilters = document.querySelectorAll(".table-filter");

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute('col-index');

      unique_col_values_dict[col_index].forEach((i) => {
          filter_i.innerHTML = filter_i.innerHTML + `\n<option value="${i}">${i}</option>`;
      });

  });

};

//3. Create filter_rows() function

// filter_value_dict {2 : Value selected, 3:all, 4:value, 5: value};

function filter_rows(){
  allFilters = document.querySelectorAll(".table-filter");
  var filter_value_dict = {};

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute('col-index');

      value = filter_i.value;
      if(value != "all"){
          filter_value_dict[col_index] = value;
      }


  });

  var col_cell_value_dict = {};

  const rows = document.querySelectorAll("#detailsTable tbody tr");
  rows.forEach((row) => {
      var display_row = true;

      allFilters.forEach((filter_i) => {
          col_index = filter_i.parentElement.getAttribute('col-index');
          col_cell_value_dict[col_index] = row.querySelector("td:nth-child(" + col_index+ ")").innerHTML;

      });

      for(var col_i in filter_value_dict){
          filter_value = filter_value_dict[col_i];
          row_cell_value = col_cell_value_dict[col_i];

          if (row_cell_value.indexOf(filter_value) == -1 && filter_value != "all"){
              display_row = false;
              break;
          }

      }

      if (display_row == true){
          row.style.display = "table-row";
      }
      else{
          row.style.display = "none";
      }


  });




}


//search for table 1-----view stock page--------------------------------------------------------------------------------------------------------

//search bar
function searchFunc1(){
  //declare variables
  var input,filter,table,tr,td,i,textValue;

  input = document.getElementById("searchInput1");

  // to search case-sensitive
  filter = input.value.toUpperCase();
  table = document.getElementById("detailsTable");

  tr = table.getElementsByTagName("tr");

  //loop through all table rows and hide those don't match the search
  for(i=0; i < tr.length; i++){
      td=tr[i].getElementsByTagName("td")[0];
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




//search for table 2-----view category page--------------------------------------------------------------------------------------------------------

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
      td=tr[i].getElementsByTagName("td")[0];
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

