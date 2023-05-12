//charts
var profit = document.getElementById('milk').getContext('2d');

var myChart = new Chart(profit, {
    type: 'doughnut',
    data: {
        labels: ['Koratuwa milk', 'Supplier milk'],
        datasets: [{
            label: '',
            data: [1200, 348],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', ,
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 0.5
        }]
    },
    options: {
        responsive: true,

    }
});

//charts
var totProfit = document.getElementById('collection').getContext('2d');
var myChart = new Chart(totProfit, {
    type: 'bar',
    data: {
        labels: ['June', 'July', 'August', 'September', 'October', 'November'],
        datasets: [{
            label: 'Total collection',
            data: [2200, 2090, 1080, 2010, 1200, 1548],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', ,
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
            borderWidth: 0.5
        }]
    },
    options: {
        responsive: true,

    }
});

//charts
var price = document.getElementById('milk_purchasing_price').getContext('2d');
var myChart = new Chart(price, {
    type: 'line',
    data: {
        labels: ['05/04', '05/03', '03/24', '03/05'],
        datasets: [{
            label: 'Total collection',
            data: [95, 105, 100, 45],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', ,
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
            borderWidth: 0.5
        }]
    },
    options: {
        responsive: true,

    }
});


function deletion(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            document.getElementById("EditForm").submit();
        }
    })
}

function updating(e) {
    e.preventDefault();
    swal.fire({
            title: "Confirm Update",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: true
        })
        .then((isOkay) => {
            if (isOkay) {
                swal.fire({
                    title: "Updated!",
                    text: "Data updated successfully!",
                    icon: "success",
                    button: "Ok"
                });
                document.getElementById("updateForm").submit();
            } else {
                swal.fire("Not Updated!");
            }
        });
    return false;
}


function adding(e) {
    e.preventDefault();
    swal.fire({
            title: "Confirm Adding",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: true,
        })
        .then((isOkay) => {
            if (isOkay) {
                swal.fire({
                    title: "Done!",
                    text: "Data updated successfully!",
                    icon: "success",
                    button: "Ok",
                });
                document.getElementById("addForm").submit();
            } else {
                swal.fire("Not Success!");
            }
        });
    return false;
}


//view of milk collection one by one

function openModel1(id){
    // var id = data["id"];
    const url ="/koratuwa/Milk_Collection_Officer/collectionDetails/"+id;
    const form = new FormData();
    form.append("id", id);
    fetch(url, {
      method: "GET"
    }).then(response => response.text())
    .then(data => {
        console.log(data);
      if(data){
      const domp=new DOMParser();
      const doc= domp.parseFromString(data,'text/html');
      const newData = doc.getElementById('newData');
      document.getElementById("newData").innerHTML = newData.innerHTML;
      console.log(newData);
      document.getElementById("newData").innerHTML = newData.innerHTML;
      }
  
    });
    document.getElementById("model").classList.add("open-model");

    
}

//view of supply orders one by one

function openModel2(id){
    // var id = data["id"];
    // const url ="/koratuwa/Milk_Collection_Officer/viewSupOrderDetails/"+id;
    // const form = new FormData();
    // form.append("id", id);
    // fetch(url, {
    //   method: "GET"
    // }).then(response => response.text())
    // .then(data => {
    //     // console.log(data);
    //   if(data){
    //     const domp=new DOMParser();
    //     const doc= domp.parseFromString(data,'text/html');
    //     const newData2 = doc.getElementById('newData2');
    //     console.log(newData2);

    //     document.getElementById('newData2').innerHTML = newData2.innerHTML;

    //   document.getElementById("Model_Order_Id").innerText = data.supply_order_id;
    //   document.getElementById("Model_Supplier_Id").innerText = data.supplier_id;
    //   document.getElementById("Model_Supplier_Name").innerText = "";
    //   document.getElementById("Model_Quantity").innerText = data.quantity;
    //   document.getElementById("Model_Unit_Price").innerText = data.unit_price;
    //   document.getElementById("Model_Status").innerText = data.status;
    //   }
  
    // });
    document.getElementById("model").classList.add("open-model");
    
}

function closeModel(){
    document.getElementById("model").classList.remove("open-model");
}

  
  








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

