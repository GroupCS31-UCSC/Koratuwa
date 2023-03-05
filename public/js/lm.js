// charts
var cattle = document.getElementById('milkCollect').getContext('2d');
var myChart = new Chart(cattle, {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
      label: 'Stall 01',
      data: [65, 59, 80, 81, 56, 55, 40],
      fill: false,
      borderColor: 'rgba(255, 99, 132)',
      tension: 0.1
    }, {
      label: 'Stall 02',
      data: [28, 48, 40, 19, 86, 27, 90],
      fill: false,
      borderColor: 'rgba(75, 192, 192)',
      tension: 0.1
    }, {
      label: 'Stall 03',
      data: [40, 75, 23, 54, 32, 68, 88],
      fill: false,
      borderColor: 'rgba(255, 205, 86)',
      tension: 0.1
    }, {
      label: 'Stall 04',
      data: [22, 62, 35, 55, 70, 45, 10],
      fill: false,
      borderColor: 'rgba(201, 203, 207)',
      tension: 0.1
    }]
  }
});



var pCattle= document.getElementById('mCattle').getContext('2d');
var myChart= new Chart(mCattle, {
  type: 'doughnut',
  data: {
    labels: ['Female', 'Male', 'Calf'],
    datasets: [{
      label: 'Cattles',
      data: [90, 10],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(255, 100, 60, 0.2)',
      ],
      borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(255, 100, 60, 0.2)',
      ],
      borderWidth:0.5
    }]
  },
  options: {
    responsive: true,

  }
});

// Popup window for feeding items
function openFeedItem(){
  document.getElementById("feedItem").classList.add("open-feedItem");
}
function closeFeedItem(){
  document.getElementById("feedItem").classList.remove("open-feedItem");
}

// Popup window for vaccination types
function openVaccinationItem(){
  document.getElementById("vaccinationItem").classList.add("open-vaccinationItem");
}
function closeVaccinationItem(){
  document.getElementById("vaccinationItem").classList.remove("open-vaccinationItem");
}

function openModel(){
  document.getElementById("model").classList.add("open-model");
}
function closeModel(){
  document.getElementById("model").classList.remove("open-model");
}


// tabs
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  
  // tabcontent = document.getElementsByClassName("tabcontent");
  // for (i = 0; i < tabcontent.length; i++) {
  //   tabcontent[i].style.display = "none";
  // }

  // tablinks = document.getElementsByClassName("tablinks");
  // for (i = 0; i < tablinks.length; i++) {
  //   tablinks[i].className = tablinks[i].className.replace(" active", "");
  // }
  
  // document.getElementById(tabName).style.display = "block";
  // evt.currentTarget.className += " active";

  window.location.href='/koratuwa/Livestock_Manager/viewCattle?stall='+tabName;
}



