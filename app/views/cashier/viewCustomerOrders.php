<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewCustomerOrders.css">


<!-- Flash massages -->
<?php flash('update_status_success'); ?>

  <div class="mytabs">
    <input type="radio" id="tab1" name="mytabs" checked="checked">
    <label for="tab1">Ongoing Orders</label>
    <div class="tab">
      <div class="ongoingOrders">
        <table>
          <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Payment Method</th>
            <th>Total Payment</th>
            <th>Payment Status</th>
            <th>Customer ID</th>
            <th>Items</th>
            <th>Status</th>
          </tr>
          <tr>
          <?php foreach ($data ['onlineOrderView'] as $online_order) : ?>
            <?php if($online_order->status == "Ongoing"): ?>
            <td><?php echo $online_order->order_id ?></td>
            <td><?php echo $online_order->ordered_date ?></td>
            
            <td><?php echo $online_order->payment_method ?></td>
            <td><?php echo $online_order->total_payment ?></td>
            <td><?php echo $online_order->payment_status ?></td>
            <td><?php echo $online_order->customer_id ?></td>
            <td>
              <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel()" id=""><i class="fas fa-eye"></i></button></a>
              </div>
            </td>
            <td>
              <form action="<?php echo URLROOT; ?>/Cashier/updateStatus/<?php echo $data['orderId']; ?>" method="POST">
                <input type="hidden" name="order_id" value="<?php echo $online_order->order_id ?>">
                <button class="ongoingBtn" onclick="changeStatus(this)">Ongoing</button>
              </form>
            </td>
            <!-- <td><?php echo $online_order->status ?></td> -->
          </tr>
          <?php endif; ?>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <!-- Deliverd orders -->
    <input type="radio" id="tab2" name="mytabs">
    <label for="tab2">Delivered Orders</label>
    <div class="tab">
      <div class="deliveredOrders">
        <table>
          <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Payment Method</th>
            <th>Total Payment</th>
            <th>Payment Status</th>
            <th>Customer ID</th>
            <th>Items</th>
            <th>Status</th>
          </tr>
          <tr>
          <?php foreach ($data ['onlineOrderView'] as $online_order) : ?>
            <?php if($online_order->status == "Delivered"): ?>
            <td><?php echo $online_order->order_id ?></td>
            <td><?php echo $online_order->ordered_date ?></td>
            <td><?php echo $online_order->payment_method ?></td>
            <td><?php echo $online_order->total_payment ?></td>
            <td><?php echo $online_order->payment_status ?></td>
            <td><?php echo $online_order->customer_id ?></td>
            <td>
              <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel()" id=""><i class="fas fa-eye"></i></button></a>
              </div>
            </td>
            <td>
              <button class="deliveredBtn"><?php echo $online_order->status ?></button>
            </td>
          </tr>
          <?php endif; ?>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>


<?php require APPROOT.'/views/include/footer.php'; ?>

<script>
  function changeStatus(button) {
    button.innerHTML = "Delivered";
    button.style.backgroundColor = "rgb(215, 31, 89)";
  }
  
</script>