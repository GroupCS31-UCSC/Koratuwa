<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/sup_home.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->




<section class="sec1">
  <div class="heading">
  <h1 class="h">Koratuwa provides the<br> best value for you!</h1>
    <!-- <div class="feature">

      <div class="text">
        <h1 class="h">Koratuwa provides the<br> best value for you!</h1>
        <div class="text2">
          <p>We appriciate you according to <br>your supply quality</p>
          <ul>
            <li>Good - 20% water presentage</li>
            <li>Average - 40% water presentage</li>
            <li>Bad - 50% water presentage</li>
          </ul>
        </div>
      </div>
      <button id="myBtn" class="place_order"><i class="fa-solid fa-truck-field"></i> Place Order</button>
    </div> -->
    <!-- <div class="feature">
      <div class="model3">
        <div class="container4">
            <label class="label1">Today Purchasing Price</label>
            <div class="items">
              <h2>
                RS. <span class="counter_up" data-number="95" data-speed="10000"></span>
              </h2>
            </div>
        </div>
      </div>
    </div> -->

  </div> 
</section>
<!-- <div class="model4">
        <div class="container4">
          <label class="label1">Number of Suppliers</label>
          <div class="items">
            <h2>
              <span class="counter_up" data-number="200" data-speed="10000"></span>
            </h2>
          </div>
        </div>
</div>    -->


<section class="sec2">
  <div class="container">

    <div class="feature">
        <div class="graphBox">

          <div class="box">
            <label><center>Price</center></label>
            <canvas id="price"></canvas>
          </div>

        </div>  
    </div>

    <div class="feature">
      <div class="model3">
          <div class="container4">
              <label class="label1">Today Purchasing Price</label>
              <div class="items">
                <h2>
                  RS. <span class="counter_up" data-number="95" data-speed="10000"></span>
                </h2>
              </div>
          </div>
      </div>
      <button id="myBtn" class="place_order"><i class="fa-solid fa-truck-field"></i> Place Order</button>
    </div>

  </div>
</section>

<section class = "sec3">
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
</section>

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
      <form action="<?php echo URLROOT; ?>/Supplier/supplierHome" method="POST">
        <div class="form-input-title">Supply Quantity (LITER)</div>
        <span class="form-invalid"><?php echo $data['quantity_err']; ?></span>
        <input type="text" name="quantity" id="quantity" class="quantity" value="<?php echo $data['quantity']; ?>"><br>
        <div class="submit_btn"><input type="submit" value="Submit" class="submitBtn"><br></div>
      </form>
    </div>  
    <div class="modal-footer">
      <h3>Koratuwa Dairy Farm</h3>
    </div>
  </div>

</div>

<script>
 
  //--------------Model form---------------------------//
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
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/supplier.js"></script>

