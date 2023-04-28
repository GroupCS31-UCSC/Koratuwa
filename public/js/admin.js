//charts - Admin Dashboard page
var profit = document.getElementById('profit').getContext('2d');

var myChart = new Chart(profit, {
    type: 'doughnut',
    data: {
        labels: ['Milk Packets', 'Yogurts', 'Cheese', 'Fresh Milk'],
        datasets: [{
            label: 'profit by Productions',
            data: [32000, 29000, 18000, 41000],
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

//charts - Admin Dashboard page
var totProfit = document.getElementById('earning').getContext('2d');
var myChart = new Chart(totProfit, {
    type: 'bar',
    data: {
        labels: ['June', 'July', 'August', 'September', 'October', 'November'],
        datasets: [{
            label: 'Total profit',
            data: [320000, 209000, 108000, 401000, 120040, 380000],
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

// employee search - status dropdown
var statusSelect = document.getElementById("status");
var selectedStatus = localStorage.getItem("selectedStatus");
console.log(selectedStatus);

// if (!selectedStatus) {
//   selectedStatus = "currentEmp"; // set default value
// }

for (var i = 0; i < statusSelect.options.length; i++) {
  var option = statusSelect.options[i];
  if (option.value == selectedStatus) {
    option.selected = true;
  }
}

statusSelect.addEventListener("change", function() {
  localStorage.setItem("selectedStatus", statusSelect.value);
});
//-------------------------------------------------

// function favTutorial() {
//     var mylist = document.getElementById("myList");
//     document.getElementById("favourite").value = mylist.options[mylist.selectedIndex].text;
//     }

// function showIcon(){
//     const searchVal= document.querySelector(".searchName").value;
//     const img= document.querySelector(".img");

//     if(searchVal.length <= 0) document.body.classList.hide();
//     else document.body.classList.add("active");
//     if(searchVal.length > 0){
//         img.style.display = "block";
//     }

//     img.addEventListener("click", () => {
//         document.querySelector(".searchName").value=" ";
//         document.body.classList.remove("active");
//     });   
// }
// $('#Empstatus').change(function(){
//     var selector  = $(this).val();
//     filter_criteria(selector);
//     // console.log(selector);
//   });
  
//   function filter_criteria(selector){
//     var target = $('div#content span#' + selector);
//     console.log(target.show().siblings().hide())
//   }



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


// Get unique values for the desired columns

// {2 : ["M", "F"], 3 : ["RnD", "Engineering", "Design"], 4 : [], 5 : []}

//function getUniqueValuesFromColumn() {

    //var unique_col_values_dict = {}

    //allFilters = document.querySelectorAll(".table-filter")
    //allFilters.forEach((filter_i) => {
        //col_index = filter_i.parentElement.getAttribute("col-index");
         //alert(col_index);
        //const rows = document.querySelectorAll("#cattle-table > tbody > tr")

        //rows.forEach((row) => {
            //cell_value = row.querySelector("td:nth-child("+col_index+")").innerHTML;
            // if the col index is already present in the dict
            //if (col_index in unique_col_values_dict) {

                // if the cell value is already present in the array
                //if (unique_col_values_dict[col_index].includes(cell_value)) {
                    // alert(cell_value + " is already present in the array : " + unique_col_values_dict[col_index])

                //} else {
               //     unique_col_values_dict[col_index].push(cell_value)
                    // alert("Array after adding the cell value : " + unique_col_values_dict[col_index])

             //   }


           // } else {
          //      unique_col_values_dict[col_index] = new Array(cell_value)
        //    }
      //  });

        
    //});

    //for(i in unique_col_values_dict) {
    //    alert("Column index : " + i + " has Unique values : \n" + unique_col_values_dict[i]);
  //  }

 //   updateSelectOptions(unique_col_values_dict)

//};

// Add <option> tags to the desired columns based on the unique values

//function updateSelectOptions(unique_col_values_dict) {
    //allFilters = document.querySelectorAll(".table-filter")

    //allFilters.forEach((filter_i) => {
        //col_index = filter_i.parentElement.getAttribute('col-index')

       // unique_col_values_dict[col_index].forEach((i) => {
      //      filter_i.innerHTML = filter_i.innerHTML + `\n<option value="${i}">${i}</option>`
    //    });

  //  });
//};


// Create filter_rows() function

// filter_value_dict {2 : Value selected, 4:value, 5: value}

//function filter_rows() {
    //allFilters = document.querySelectorAll(".table-filter")
    //var filter_value_dict = {}

    //allFilters.forEach((filter_i) => {
        //col_index = filter_i.parentElement.getAttribute('col-index')

        //value = filter_i.value
        //if (value != "all") {
        //    filter_value_dict[col_index] = value;
      //  }
    //});

    //var col_cell_value_dict = {};

    //const rows = document.querySelectorAll("#cattle-table tbody tr");
    //rows.forEach((row) => {
        //var display_row = true;

        //allFilters.forEach((filter_i) => {
          //  col_index = filter_i.parentElement.getAttribute('col-index')
          //  col_cell_value_dict[col_index] = row.querySelector("td:nth-child(" + col_index+ ")").innerHTML
        //})

        //for (var col_i in filter_value_dict) {
       //     filter_value = filter_value_dict[col_i]
            // row_cell_value = col_cell_value_dict[col_i]
            
            // if (row_cell_value.indexOf(filter_value) == -1 && filter_value != "all") {
                // display_row = false;
                // break;
            // }


        // }

        // if (display_row == true) {
            // row.style.display = "table-row"

        // } else {
            // row.style.display = "none"

        // }





    // })

// }