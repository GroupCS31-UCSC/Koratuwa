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


var price = document.getElementById('pricelist').getContext('2d');
var myChart = new Chart(price, {
    type: 'line',
    data: {
        labels: ['02/18', '02/19', '02/20', '02/21', '02/22', '02/23', '02/24'],
        datasets: [{
            label: 'Total collection',
            data: [100, 90, 98, 98, 106, 102, 101],
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


// function deletion() {
//     swal.fire({
//             title: "Are You Sure ?",
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//         })
//         .then((isOkay) => {
//             if (isOkay) {
//                 form.submit();
//             }
//         });
//     return false;
// }

// document.querySelector(".submitBtn").addEventListener('click', function() {
//     Swal.fire({
//         position: 'center',
//         icon: 'success',
//         title: 'Employee details are successfully added!',
//         showConfirmButton: false,
//         timer: 150000
//     })
// });


// function adding() {
//     swal({
//             position: 'center',
//             icon: 'success',
//             title: 'Employee details are successfully added!',
//             buttons: true
//                 // showConfirmButton: false
//         })
//         .then((isOkay) => {
//             if (isOkay) {
//                 form.submit();
//             }
//         });
//     return false;

// }

// function adding() {
//     Swal.fire({
//         title: 'Employee details are successfully added!',
//         // text: "You clicked the button!",
//         icon: "success",
//         button: "Aww yiss!",
//     });
// }

// function deletion() {
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!',
//         timer: 5000000
//     }).then((result) => {
//         if (result.isConfirmed) {
//             Swal.fire(
//                 'Deleted!',
//                 'Your file has been deleted.',
//                 'success'
//             )
//         }
//     })
// }

// function adding() {
//     swal({
//         title: "Good job!",
//         text: "You clicked the button!",
//         icon: "success",
//         button: "Aww yiss!",
//     });
// }

// function deletion() {
//     swal.fire({
//             title: 'Are you sure?',
//             text: "You won't be able to revert this!",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: 'Yes, delete it!'
//         })
//         .then((willDelete) => {
//             if (willDelete) {
//                 swal.fire("Poof! Your imaginary file has been deleted!", {
//                     icon: "success",
//                     timer: 10000,
//                 });
//             } else {
//                 swal.fire("Your imaginary file is safe!");
//             }
//         });
// }

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

//view milk collection page view
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
    //   console.log(newData);
      document.getElementById("newData").innerHTML = newData.innerHTML;
      
    //   document.getElementById("Model_Cow_Id").innerText = data.cow_id;
    //   document.getElementById("Model_Quantity").innerText = data.quantity;
      }
  
    });
    document.getElementById("model").classList.add("open-model");
    //document.getElementById("model").innerHTML += "<?PHP $dataID = ${id}; ?>"
    // console.log(data["id"]);
    
}

//view supply orders view
function openModel2(id){
    // var id = data["id"];
    const url ="/koratuwa/Milk_Collection_Officer/viewSupOrderDetails/"+id;
    const form = new FormData();
    form.append("id", id);
    fetch(url, {
      method: "GET"
    }).then(response => response.json())
    .then(data => {
      if(data){
      document.getElementById("Model_Order_Id").innerText = data.supply_order_id;
      document.getElementById("Model_Supplier_Id").innerText = data.supplier_id;
      document.getElementById("Model_Supplier_Name").innerText = "";
      document.getElementById("Model_Quantity").innerText = data.quantity;
      document.getElementById("Model_Unit_Price").innerText = data.unit_price;
      document.getElementById("Model_Status").innerText = data.status;
      }
  
    });
    document.getElementById("model").classList.add("open-model");
    //document.getElementById("model").innerHTML += "<?PHP $dataID = ${id}; ?>"
    // console.log(data["id"]);
    
}

function closeModel(){
    document.getElementById("model").classList.remove("open-model");
}

// tabs
// function openTab(evt, tabName) {
//     var i, tabcontent, tablinks;
//     window.location.href='/koratuwa/Milk_Collection_Officer/viewSupplyOrders?tab='+tabName;
//   }

  
  
  