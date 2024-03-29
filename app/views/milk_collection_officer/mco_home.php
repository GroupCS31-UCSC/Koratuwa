
<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/mco_home.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php'; ?>
<!--
 ______________________________________________________________________________________________________-->

<?php $purchasePrice =  flash('Purchase_price');?>
<?php if($purchasePrice): ?>
<div class="flash-msg" style="display:block;" >
 <?php echo $purchasePrice; ?>
</div>

<?php endif; ?>

<!--cards-->
<section class="cardBox">
  <div class="container">
    
  <?php foreach ($data['internalMilk'] as $intMilk) : ?>
    <div class="card">
      <div>
        <div class="cardName">Farm Milk Collection(L.)</div>
        <div class="numbers"><?php echo $intMilk; ?></div>
        <div class="day1">
          <!-- <div class="circle"></div><label>last 30 days</label> -->
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  <?php foreach ($data['externalMilk'] as $extMilk) : ?>
    <div class="card">
      <div>
        <div class="cardName">Supplier Milk Collection(L.)</div>
        <div class="numbers"><?php echo $extMilk; ?></div>
        <div class="day2">
          <!-- <div class="circle"></div><label>last 30 days</label> -->
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  
  <?php $totMilk= $extMilk + $intMilk ?>

    <div class="card">
      <div>
        <div class="cardName">Total Milk Collection(L.)</div>
        <div class="numbers"><?php echo number_format($totMilk,2); ?></div>
        <div class="day3">
          <!-- <div class="circle"></div><label>last 30 days</label> -->
        </div>
      </div>
    </div>

  

  <?php foreach ($data['supOrderCount'] as $supOrd) : ?>
    <div class="card">
      <div>
        <div class="cardName">Supply Orders</div>
        <div class="numbers"><?php echo $supOrd; ?></div>
        <div class="day4">
          <!-- <div class="circle"></div><label>last 30 days</label> -->
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  

  </div>
</section>


<!-- add set price and table -->
<section>

<div class="details">
  <!-- table -->
  <div class="recentOrders">
    <div class="cardHeader">
      <h2>Today Orders</h2>
      <a href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewSupplyOrders" class="viewBtn">View All</a>
    </div>
    <table>
      <thead>
        <tr>
          <td>Supplier</td>
          <td>Quantity(L)</td>
          <td>Address</td>
          <td>Status</td>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($data['orderView'] as $orderView) : ?>
        <tr>
          <td><?php echo $orderView->supplier_id; ?></td>
          <td><?php echo $orderView->quantity; ?></td>
          <td><?php echo $orderView->address; ?></td>
          <td>
          <?php if($orderView->status == 'Collected') : ?>
            <span class="status collected">Collected</span>
          <?php elseif($orderView->status == 'Ongoing') : ?>
            <span class="status notcollected">Pending</span>
          <?php else : ?>
            <span class="status rejected">Rejected</span>
          <?php endif; ?>
        </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- table end -->
  
  <!-- purchasing price section -->
  <div class="price">

  <!-- display price box -->
    <div class="displayPrice">

      <div class="name">
        <h1><br>Milk Purchasing Price</h1><br>
        <div class="lastdate">
        <h2>Last set on :<?php echo $data['lastDate']; ?></h2><br>
        </div>
      </div>
      
      <div class="lastprice">
        <div class="priceBox">
        <h1>Rs.<?php echo $data['lastPrice']; ?></h1><br>
        </div>       
      </div>

    </div>

    <!-- set price button -->
    <div class="setPrice">
        <a href="#popup1"><button class="setBtn" onclick="openModel()">Set Today Milk Purchasing Price</button></a>
    </div>

    <!------------ set price popup window ---------------->
    <!-- <div id="popup1" class="overlay">
    <div class="popup">
      <h2>Set Milk Purchasing Price</h2>
      <a class="close" href="#">&times;</a>
      <div class="content">

      <form id="addForm" action="<?php echo URLROOT; ?>/Milk_Collection_Officer/setUnitPrice" method="POST">
          <div class="feature">
            <div class="form-input-title">Unit Price for Litre</div>
            <input type="number" name="price" id="price" class="price" autocomplete="off" value="<?php error_reporting(0); echo $data['price']; ?> ">
            <input type="submit" value="Submit" class="submitBtn">
          </div>
      </form>
        
      </div>
    </div>
    </div> -->
<div class="model fade in" id="model" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
      </div>
      <div class="model-body">
      <form action="<?php echo URLROOT; ?>/Milk_Collection_Officer/setUnitPrice" method="POST">
        <div class="feature">  
          <div class="form-input-title">Unit Price for Litre</div>
          <input type="number" name="price" id="price" class="price" autocomplete="off" value="<?php error_reporting(0); echo $data['price']; ?> ">
          <input type="submit" value="Submit" class="submitBtn">
        </div>
      </form>
      <br>
      </div>
    </div>
  </div>
</div>

  <!------------------------------------------------------>

  <!-- chart -->
    <!-- <div class="priceChart">
      <div class="box">
        <label><center>Milk Purchasing Price</center></label>
        <canvas id="milk_purchasing_price"></canvas>
      </div>
    </div> -->
  <!-- end chart -->


  </div>
  <!-- purchasing price section -->

</div> 
<!-- details end -->

</section>


<!--Add charts-->
<!-- <div class="graphBox">

  <div id="test" class="box">
    <label><center>Koratuwa milk vs Suppliers milk</center></label>
    <canvas id="milk"></canvas>
  </div>

  <div class="box">
    <label><center>Total Milk Collection</center></label>
    <canvas id="collection"></canvas>
  </div>


</div> -->



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>

<script>
  function openModel() {
    document.getElementById("model").classList.add("open-model");
  }

  function closeModel() {
    document.getElementById("model").classList.remove("open-model");
  }
</script>

<script language="javascript">
        const fm = document.getElementById('msg-flash');
  fm.style.display = 'block';
  setTimeout(function() {
    fm.style.display = 'none';
  }, 1000);
        
    </script>

