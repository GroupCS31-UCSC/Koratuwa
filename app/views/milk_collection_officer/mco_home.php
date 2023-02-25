
<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/mco_home.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php'; ?>
<!--
 ______________________________________________________________________________________________________-->


<!--cards-->
<section class="cardBox">
  <div class="container">
    
    <div class="card">
      <div>
        <div class="cardName">Internal Milk Collection(L.)</div>
        <div class="numbers">1548</div>
        <div class="day1">
          <div class="circle"></div><label>last 30 days</label>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="cardName">External Milk Collection(L.)</div>
        <div class="numbers">420</div>
        <div class="day2">
          <div class="circle"></div><label>last 30 days</label>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="cardName">Total Milk Collection(L.)</div>
        <div class="numbers">2345</div>
        <div class="day3">
          <div class="circle"></div><label>last 30 days</label>
        </div>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="cardName">Supply Orders</div>
        <div class="numbers">124</div>
        <div class="day4">
          <div class="circle"></div><label>last 30 days</label>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- add set price and table -->
<section>
<div class="section2">
<div class="details">
  <div class="recentOrders">
    <div class="cardHeader">
      <h2>Recent Orders</h2>
      <a href="" class="viewBtn">View All</a>
    </div>
    <table>
      <thead>
        <tr>
          <td>Supplier</td>
          <td>Quantity</td>
          <td>Price</td>
          <td>Status</td>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($data['orderView'] as $orderView) : ?>
        <tr>
          <td><?php echo $orderView->supplier_id; ?></td>
          <td><?php echo $orderView->quantity; ?></td>
          <td><?php echo $orderView->price_hastopay; ?></td>
          <td>
          <?php if($orderView->status == 'Collected') : ?>
            <span class="status collected">Collected</span>
          <?php elseif($orderView->status == 'Not Collected') : ?>
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
  
  <div class="price">
    <div class="displayPrice">

      <div class="name">
        <h1>Milk Purchasing Price</h1>
        <div class="lastdate">
        <h2>Last set on :<?php echo $data['lastDate']; ?></h2>
        </div>
      </div>
      
      <div class="lastprice">
        <div class="priceBox">
        <h1>Rs.<?php echo $data['lastPrice']; ?></h1>
        </div>       
      </div>

    </div>
    <div class="setPrice">
        <a href="#popup1"><button class="setBtn">Set Today Milk Purchasing Price</button></a>
    </div>

    <!------------ set price popup window ---------------->
    <div id="popup1" class="overlay">
    <div class="popup">
      <h2>Set Today Milk Purchasing Price</h2>
      <a class="close" href="#">&times;</a>
      <div class="content">

      <form id="addForm" action="<?php echo URLROOT; ?>/Milk_Collection_Officer/setPriceDaily" method="POST">
          <div class="feature">
            <div class="form-input-title">Unit Price for Litre</div>
            <input type="number" name="price" id="price" class="price" autocomplete="off" value="<?php error_reporting(0); echo $data['price']; ?> ">
            <input type="submit" value="Submit" class="submitBtn">
          </div>
      </form>
        
      </div>
    </div>
  </div>
  <!------------------------------------------------------>

    <div class="priceChart">
      <div class="box">
      <label><center>Milk Purchasing Price</center></label>
      <canvas id="price"></canvas>
    </div>

    </div>
  </div>

</div>
</div>
</section>


<!--Add charts-->
<div class="graphBox">

  <div id="test" class="box">
    <label><center>Koratuwa milk vs Suppliers milk</center></label>
    <canvas id="milk"></canvas>
  </div>

  <div class="box">
    <label><center>Total Milk Collection</center></label>
    <canvas id="collection"></canvas>
  </div>


</div>
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>



