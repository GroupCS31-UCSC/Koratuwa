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




//search for table 1------onsiteSale view-------------------------------------------------------------------------------------------------------

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







//search for table 2------customer order view-------------------------------------------------------------------------------------------------------

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



//search for table 2------customer order view-search-by customer id-----------------------------------------------------------------------------------------------------

//search bar
function searchFunc4(){
  //declare variables
  var input,filter,table,tr,td,i,textValue;

  input = document.getElementById("searchInput4");

  // to search case-sensitive
  filter = input.value.toUpperCase();
  table = document.getElementById("detailsTable2");

  tr = table.getElementsByTagName("tr");

  //loop through all table rows and hide those don't match the search
  for(i=0; i < tr.length; i++){
      td=tr[i].getElementsByTagName("td")[4];
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



//search for table 3------customer delivered order view-------------------------------------------------------------------------------------------------------

//search bar
function searchFunc3(){
  //declare variables
  var input,filter,table,tr,td,i,textValue;

  input = document.getElementById("searchInput3");

  // to search case-sensitive
  filter = input.value.toUpperCase();
  table = document.getElementById("detailsTable3");

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



//search for table 3------customer delivered order view---search by customer id----------------------------------------------------------------------------------------------------

//search bar
function searchFunc5(){
  //declare variables
  var input,filter,table,tr,td,i,textValue;

  input = document.getElementById("searchInput5");

  // to search case-sensitive
  filter = input.value.toUpperCase();
  table = document.getElementById("detailsTable3");

  tr = table.getElementsByTagName("tr");

  //loop through all table rows and hide those don't match the search
  for(i=0; i < tr.length; i++){
      td=tr[i].getElementsByTagName("td")[3];
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



//filter for table 2-------ongoing orders view------------------------------------------------------------------------------------------------------

//1. Get unique values for the desired columns

// {2 : ["s1", "s2","s3","s4"], 3 : ["f", "m"], 4 : ["gil","sah","per"], 5 : ["yes","no"]}

function getUniqueValuesFromColumn2(){

  var unique_col_values_dict = {};
  allFilters = document.querySelectorAll(".table-filter2");

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute("col-index");
      // alert(col_index);

      const rows = document.querySelectorAll("#detailsTable2 > tbody > tr");

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

  updateSelectOptions2(unique_col_values_dict);
};



//2. Add <option> tags to the desired columns based on the unique values

function updateSelectOptions2(unique_col_values_dict){
  allFilters = document.querySelectorAll(".table-filter2");

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute('col-index');

      unique_col_values_dict[col_index].forEach((i) => {
          filter_i.innerHTML = filter_i.innerHTML + `\n<option value="${i}">${i}</option>`;
      });

  });

};

//3. Create filter_rows() function

// filter_value_dict {2 : Value selected, 3:all, 4:value, 5: value};

function filter_rows2(){
  allFilters = document.querySelectorAll(".table-filter2");
  var filter_value_dict = {};

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute('col-index');

      value = filter_i.value;
      if(value != "all"){
          filter_value_dict[col_index] = value;
      }


  });

  var col_cell_value_dict = {};

  const rows = document.querySelectorAll("#detailsTable2 tbody tr");
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





//filter for table 3--------delivered order view-----------------------------------------------------------------------------------------------------

//1. Get unique values for the desired columns

// {2 : ["s1", "s2","s3","s4"], 3 : ["f", "m"], 4 : ["gil","sah","per"], 5 : ["yes","no"]}

function getUniqueValuesFromColumn3(){

  var unique_col_values_dict = {};
  allFilters = document.querySelectorAll(".table-filter3");

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute("col-index");
      // alert(col_index);

      const rows = document.querySelectorAll("#detailsTable3 > tbody > tr");

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

  updateSelectOptions3(unique_col_values_dict);
};



//2. Add <option> tags to the desired columns based on the unique values

function updateSelectOptions3(unique_col_values_dict){
  allFilters = document.querySelectorAll(".table-filter3");

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute('col-index');

      unique_col_values_dict[col_index].forEach((i) => {
          filter_i.innerHTML = filter_i.innerHTML + `\n<option value="${i}">${i}</option>`;
      });

  });

};

//3. Create filter_rows() function

// filter_value_dict {2 : Value selected, 3:all, 4:value, 5: value};

function filter_rows3(){
  allFilters = document.querySelectorAll(".table-filter3");
  var filter_value_dict = {};

  allFilters.forEach((filter_i) => {
      col_index = filter_i.parentElement.getAttribute('col-index');

      value = filter_i.value;
      if(value != "all"){
          filter_value_dict[col_index] = value;
      }


  });

  var col_cell_value_dict = {};

  const rows = document.querySelectorAll("#detailsTable3 tbody tr");
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





//filter for table 4-------------------------------------------------------------------------------------------------------------
