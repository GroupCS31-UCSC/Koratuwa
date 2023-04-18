<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/cashier_home.css">


<div class="container">
  <div class="split left">
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
        </table>
      </div>
    </div>
  </div>
  <div class="split right">
    <div class="graphBox">
      <div class="box">
        <label><center>Orders</center></label>
        <canvas id="order"></canvas>
      </div>
      <!-- <div class="box">
        <label><center>Percentages of sales</center></label>
        <canvas id="type"></canvas>
      </div> -->
    </div>
  </div>
</div>




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>
