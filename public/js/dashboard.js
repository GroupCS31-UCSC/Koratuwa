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



//menu toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function() {
    navigation.classList.toggle('active')
}



let list = document.querySelectorAll('.navigation li');

function activeLink() {
    list.forEach((item) =>
        item.classList.remove('hovered'));
    this.classList.add('hovered');

}
list.forEach((item) =>
    item.addEventListener('mouseover', activeLink));


// //toggle menu - Dashboard page
// let toggle = document.querySelector('.toggle');
// let navigation = document.querySelector('.navigation');
// let main = document.querySelector('.main');

// toggle.onclick = function()
// {
//   navigation.classList.toggle('active');
//   main.classList.toggle('active');
// }


// let list = document.querySelectorAll('.navigation li');

// function activeLink()
// {
//   list.forEach((item) =>
//     item.classList.remove('hovered'));
//     this.classList.add('hovered');

// }
// list.forEach((item) =>
//   item.addEventListener('mouseover',activeLink));



// //toggle menu - Dashboard page
// let toggle = document.querySelector('.toggle');
// let navigation = document.querySelector('.navigation');
// let main = document.querySelector('.main');

// toggle.onclick = function()
// {
//   navigation.classList.toggle('active');
//   main.classList.toggle('active');
// }


// let list = document.querySelectorAll('.navigation li');

// function activeLink()
// {
//   list.forEach((item) =>
//     item.classList.remove('hovered'));
//     this.classList.add('hovered');

// }
// list.forEach((item) =>
//   item.addEventListener('mouseover',activeLink));