<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/cashier_home.css">


<!-- <div class="container">
  <div class="cardBox">
    <div class="card">
      <div>
        <div class="cardName">Opening Balance</div>
        <div class="numbers">24575</div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Today's Transection</div>
        <div class="numbers">5786</div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Today's Expense</div>
        <div class="numbers">57575</div>
      </div>
    </div>
    <div class="card">
      <div>
        <div class="cardName">Today's Net Salary</div>
        <div class="numbers">24575</div>
      </div>
    </div>
  </div>
</div>
<div class="graphBox">
  <div class="box">
    <label><center>Orders</center></label>
    <canvas id="order"></canvas>
  </div>

  <div class="box">
    <label><center>Percentages of sales</center></label>
    <canvas id="type"></canvas>
  </div>

</div> -->

<div class="ongoing">
  <div class="card-header">
    <h3>Ongoing Orders</h3>

  </div>
  <div class="card-body">
    <table>
      <thead>
        <tr>
          <th scope="col">Order ID</th>
          <th scope="col">Customer ID</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['ongoing'] as $ongoing): ?>
        <tr>
          <td data-label="Order ID"><?php echo $ongoing->order_id; ?></td>
          <td data-label="Customer ID"><?php echo $ongoing->customer_id; ?></td>
          <td data-label="Date"><?php echo $ongoing->date; ?></td>
          <td>
          <?php if($ongoing->status == 'ongoing') : ?>
            <span class="status ongoing">ongoing</span>
          <?php elseif($ongoing->status == 'delivered') : ?>
            <span class="status delivered">delivered</span>
          <?php else : ?>
            <span class="status cancelled">cancelled</span>
          <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>

      </tbody>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>
