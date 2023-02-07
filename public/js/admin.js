// //charts - Admin Dashboard page
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