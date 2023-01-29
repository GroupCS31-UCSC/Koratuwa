<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/sup_home.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->




<div class="model3Wrapper">
<img class="img" src="<?php echo URLROOT; ?>/img/sup_home.jpg" alt="no"> 
<div class="overlay"></div>
</div>

  <div class="content">
    <h1 class="h">Koratuwa provides the<br> best value for you!</h1>
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
  </div>

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


<div class="graphBox">

      <div class="box">
        <label><center>Quality</center></label>
        <canvas id="quality"></canvas>
      </div>

      <div class="box">
        <label><center>Price</center></label>
        <canvas id="price"></canvas>
      </div>


</div>


<script>
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
