<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/sup_home.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->




<!-- <section class="sec1">
  <div class="heading">
  <h1 class="h">Koratuwa provides the<br> best value for you!</h1>
  </div> 
</section> -->



<section class="sec2">
  <div class="heading">
    <h1 class="h">Koratuwa provides the<br> best value for you!</h1>
    <button id="myBtn" class="place_order"><i class="fa-solid fa-truck-field"></i> Place Order</button>
  </div>

  <div class="container">

    <div class="feature">
        <div class="graphBox">

          <div class="box">
            <label><center>Price</center></label>
            <canvas id="milk_purchasing_price"></canvas>
          </div>

        </div>  
    </div>

    <div class="feature">
      <div class="model3">
          <div class="container4">
              <label class="label1">Today Purchasing Price</label>
              <div class="items">
                <h2>
                  RS. <span class="counter_up" data-number="<?php echo $data['purchasing_price'] ?>" data-speed="10000"></span>
                </h2>
              </div>
          </div>
      </div>
      <!-- <button id="myBtn" class="place_order"><i class="fa-solid fa-truck-field"></i> Place Order</button> -->
    </div>
    <?php
    // $timestamp = time();
    // $formatted_time = gmdate("H:i:s", $timestamp);
    // echo $formatted_time;
//     date_default_timezone_set('Asia/Colombo');
//     $current_time = date("H:i:s");
// echo $current_time;
     ?>

    <div class="feature">
      <div class="title"><h1>Total Supply Milk </h1></div>
        <svg viewBox="0 0 100 140">
          <defs>
            <filter id="goo">
                  <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
                  <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
                  <feComposite in="SourceGraphic" in2="gooey" operator="atop"/>
            </filter>
          </defs>
          <rect id="box" x="10" y="0" width="80" height="0">
            <animate attributeName="height" from="0" to="85" dur="2s" fill="freeze" begin="1s"/>
            <animate attributeName="y" from="105" to="20" dur="2s" fill="freeze" begin="1s"/>
          </rect>
          <g>
            <path class="glass" d="M0 0 L0 140 L100 140 L100 0">
          </path>
          <rect class="glass" x="0" y="110" width="100" height="30"/>
          </g>
        </svg>   
        <div class="itemsDetails">
          <h2>
            <!-- display the total milk quantity of relavant supplier -->
            <span class="counter_up" data-number="<?php echo($data['ordSum']) ?>" data-speed="10000"></span> L
          </h2>
        </div>   
        
      </div>

  </div>
</section>

<!-- <section class = "sec3">
  <div class="container">

    <div class="feature">
      <div class="graphBox">

          <div class="box">
            <label><center>Quality</center></label>
            <canvas id="quality"></canvas>
          </div>

      </div>       
    </div>

    <div class="feature">
      <div class="text">
            <p>We appriciate you according to <br>your supply quality</p>
            <ul>
              <li>Good - 20% water presentage</li>
              <li>Average - 40% water presentage</li>
              <li>Bad - 50% water presentage</li>
            </ul>
      </div>      
    </div>

  </div>
</section> -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Place Supply Order</h2>
    </div>
    <div class="modal-body">
      <p></p><br>

      <!-- <form action="<?php echo URLROOT; ?>/Supplier/supplierHome" method="POST"> -->
      <form action="<?php echo URLROOT; ?>/Supplier/supplierHome" method="POST" onsubmit="return validateForm()">
        <span class="form-invalid" style="color: red; display: none;" id="errTime"></span>
        <div class="form-input-title">Supply Quantity (LITER)</div>
        <span class="form-invalid" style="color: red; display: none;" id="errId">Required minimum 10L to place an Order</span>
        <input type="text" name="quantity" id="quantity" class="quantity" value="<?php echo $data['quantity']; ?>"><br>
        <div class="submit_btn"><input type="submit" id="submitBtn" value="Submit" class="submitBtn"><br></div>
      </form>
    </div>  
    <div class="modal-footer">
      <h3>Koratuwa Dairy Farm</h3>
    </div>
  </div>

</div>

<script>
 
  //--------------Model form---------------------------//
const myInput = document.getElementById("quantity");
const myError = document.getElementById("errId");
const myError2 = document.getElementById("errTime");
const mySubmit = document.getElementById("submitBtn");

myInput.addEventListener("input", function() {
  if (myInput.value < 10) {
    myError.style.display = "inline";
    mySubmit.disabled = true;
  } else {
    myError.style.display = "none";
    mySubmit.disabled = false;
  }
});

function validateForm() {
      var current_time = new Date();
      var specific_time = new Date();
      specific_time.setHours(8, 0, 0); // set the specific time to 8 a.m.
      if (current_time.getTime() > specific_time.getTime()) {
        // alert("Error: Current time is less than 8 a.m.");
        myError2.innerHTML = "You have to place orders before 8.00 am";
        myError2.style.display = "inline";
        mySubmit.disabled = true; // disable submit button
        return false;
      }
      // If the current time is after 8 a.m., the form will be submitted normally
      return true;
    }

  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }  
 

//------purchasing price---------------// 
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
</script> 




<!-- //charts - sup home page -->

<script>
  var ctx1 = document.getElementById('milk_purchasing_price');
fetch('http://localhost/koratuwa/Supplier/milkPurchasing_chart')
    .then(response => response.json())
    .then(data => {
      let milk_date = data.map(obj => obj.date);
      let unit_price = data.map(obj => obj.unit_price);

      new Chart(ctx1, {
        type: 'line',
        data: {
          labels: milk_date,
          datasets: [{
            label: 'Income(Rs.)',
            data: unit_price,
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
</script>
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/supplier.js"></script>

