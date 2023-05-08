<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewCustomerOrders.css">

<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>

<!-- Flash massages -->
<?php flash('update_status_success'); ?>

  <!-- <div class="mytabs">

    <input type="radio" id="tab1" name="mytabs" checked="checked">
    <label for="tab1">Ongoing Orders</label>
    <div class="tab"> -->

    <!-- search -->
    <!-- <input type="text" id="searchInput2" placeholder="Search By Order IDs..." onkeyup="searchFunc2();"> -->
    <!-- <br><br> -->
    <!-- search -->
    <!-- <input type="text" id="searchInput4" placeholder="Search By Customer IDs..." onkeyup="searchFunc4();"> -->
    <!-- <br><br> -->

    <!--date filter -->
    <!-- <form action="<?php echo URLROOT; ?>/Cashier/viewCustomerOrders" method="POST" >
      <label for="from">From :</label>
      <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
      <label for="to">  To :</label>
      <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
      <input type="submit" value="Search" class="submitBtn"> 
    </form>
    <br><br> -->
    <!-- refresh button -->
    <!-- <input type="button" value="Refresh" class="" onclick="location.href='<?php echo URLROOT; ?>/Cashier/viewCustomerOrders' ">

      <div class="ongoingOrders">
        <table id="detailsTable2">
          <thead>
            <th col-index = 1>Order ID</th>
            <th col-index = 2>Date</th>
            <th col-index = 3>Total Payment</th>
            <th col-index = 4>Payment Status</th>
            <th col-index = 5>Customer ID</th>
            <th col-index = 6>Items</th>
            <th col-index = 7>
              <select class="table-filter2" onchange="filter_rows2()">
                <option value="all">Payment Method</option>
              </select>
            </th>
            <th>Status</th>
          </thead>
          <tbody>
          <tr>
          <?php foreach ($data ['onlineOrderView'] as $online_order) : ?>
            <?php if($online_order->status == "Ongoing"): ?>

            <td><?php echo $online_order->order_id ?></td>
            <td><?php echo $online_order->ordered_date ?></td>
            <td><?php echo $online_order->total_payment ?></td>
            <td><?php echo $online_order->payment_status ?></td>
            <td><?php echo $online_order->customer_id ?></td>
            <td>
              <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel()" id=""><i class="fas fa-eye"></i></button></a>
              </div>
            </td>
            <td><?php echo $online_order->payment_method ?></td>
            <td> -->
              <!-- <form action="<?php echo URLROOT; ?>/Cashier/updateStatus/<?php echo $data['orderId']; ?>" method="POST"> -->
                <!-- <input type="hidden" name="order_id" value="<?php echo $online_order->order_id ?>">
                <button class="ongoingBtn"><?php echo $online_order->status ?></button>
              </form>
            </td> -->
            <!-- <td><?php echo $online_order->status ?></td> -->
          <!-- </tr>

            <?php elseif($online_order->status == "New Order"): ?>

            <td><?php echo $online_order->order_id ?></td>
            <td><?php echo $online_order->ordered_date ?></td>
            <td><?php echo $online_order->total_payment ?></td>
            <td><?php echo $online_order->payment_status ?></td>
            <td><?php echo $online_order->customer_id ?></td>                    
            <td>
              <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel()" id=""><i class="fas fa-eye"></i></button></a>
              </div>
            </td>
            <td><?php echo $online_order->payment_method ?></td>
            <td> -->
              <!-- <form action="<?php echo URLROOT; ?>/Cashier/updateStatus/<?php echo $data['orderId']; ?>" method="POST"> -->
                <!-- <input type="hidden" name="order_id" value="<?php echo $online_order->order_id ?>">
                <button class="newOrderBtn" onclick="openSendOrder('<?=$online_order->order_id?>')"><?php echo $online_order->status ?></button>
              </form>
            </td> -->
            <!-- <td><?php echo $online_order->status ?></td> -->
          <!-- </tr>
          </tbody>

            <?php endif; ?>
          <?php endforeach; ?> -->
        <!-- </table>
      </div>
    </div> -->

    <!-- Deliverd orders -->
    <!-- <input type="radio" id="tab2" name="mytabs">
    <label for="tab2">Delivered Orders</label>
    <div class="tab"> -->

    <!-- search -->
    <!-- <input type="text" id="searchInput3" placeholder="Search By Order IDs..." onkeyup="searchFunc3();">
    <br><br> -->
    <!-- search -->
    <!-- <input type="text" id="searchInput5" placeholder="Search By Customer IDs..." onkeyup="searchFunc5();">
    <br><br> -->
    <!--date filter -->
    <!-- <form action="<?php echo URLROOT; ?>/Cashier/viewCustomerOrders" method="POST" >
      <label for="from">From :</label>
      <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
      <label for="to">  To :</label>
      <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
      <input type="submit" value="Search" class="submitBtn"> 
    </form>
    <br><br> -->
    <!-- refresh button -->
    <!-- <input type="button" value="Refresh" class="" onclick="location.href='<?php echo URLROOT; ?>/Cashier/viewCustomerOrders' ">

      <div class="deliveredOrders">
        <table id="detailsTable3">
          <thead>
            <th col-index = 1>Order ID</th>
            <th col-index = 2>Date</th>
            <th col-index = 3>Total Payment</th> -->
            <!-- <th>Payment Status</th> -->
            <!-- <th col-index = 4>Customer ID</th>
            <th col-index = 5>Items</th>
            <th col-index = 6>
              <select class="table-filter3" onchange="filter_rows3()">
                <option value="all">Payment Method</option>
              </select>
            </th>
            <th>Status</th>
          </thead>
          <tbody>
          <tr>
          <?php foreach ($data ['onlineOrderView'] as $online_order) : ?>
            <?php if($online_order->status == "Delivered"): ?>
            <td><?php echo $online_order->order_id ?></td>
            <td><?php echo $online_order->ordered_date ?></td>
            <td><?php echo $online_order->total_payment ?></td> -->
            <!-- <td><?php echo $online_order->payment_status ?></td> -->
            <!-- <td><?php echo $online_order->customer_id ?></td>
            <td>
              <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel()" id=""><i class="fas fa-eye"></i></button></a>
              </div>
            </td>
            <td><?php echo $online_order->payment_method ?></td>
            <td>
              <button class="deliveredBtn"><?php echo $online_order->status ?></button>
            </td>
          </tr>
          <?php endif; ?>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div> -->
<div class="section">
  <div class="tab">
    <?php $status=$_GET['status']??'Ongoing';?>
    <button class="tablinks <?= $status==="Ongoing"?'active':''?>" onclick="openTab(event, 'Ongoing')">Ongoing Orders</button>
    <button class="tablinks <?= $status==="New Order"?'active':''?>" onclick="openTab(event, 'New Order')">New Orders</button>
    <button class="tablinks <?= $status==="Delivered"?'active':''?>" onclick="openTab(event, 'Delivered')">Delivered Orders</button>
  </div>

  <div id="Ongoing" class="tabcontent active">
    <div class="container" style="overflow-x: auto;">
    <!-- search -->
    <input type="text" id="searchInput2" placeholder="Search By Order IDs..." onkeyup="searchFunc2();">
    <br><br>
    <!-- search -->
    <input type="text" id="searchInput4" placeholder="Search By Customer IDs..." onkeyup="searchFunc4();">
    <br><br>

    <!--date filter -->
    <form action="<?php echo URLROOT; ?>/Cashier/viewCustomerOrders" method="POST" >
      <label for="from">From :</label>
      <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
      <label for="to">  To :</label>
      <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
      <input type="submit" value="Search" class="submitBtn"> 
    </form>
    <br><br>
    <!-- refresh button -->
    <input type="button" value="Refresh" class="" onclick="location.href='<?php echo URLROOT; ?>/Cashier/viewCustomerOrders' ">

    <table id="detailsTable2">
      <thead>
        <th>Order ID</th>
        <th>Date</th>
        <th>Total Payment</th>
        <th>Payment Status</th>
        <th>Customer ID</th>
        <th>Items</th>
        <th>
          <select class="table-filter2" onchange="filter_rows2()">
            <option value="all">Payment Method</option>
          </select>
        </th>
        
        <th>Status</th>
        
      </thead>
      <tbody>
        <tr>
          <?php foreach ($data ['onlineOrderView'] as $online_order) : ?>
          <td><?php echo $online_order->order_id ?></td>
          <td><?php echo $online_order->ordered_date ?></td>
          <td><?php echo $online_order->total_payment ?></td>
          <td><?php echo $online_order->payment_status ?></td>
          <td><?php echo $online_order->customer_id ?></td>
          <td>
            <div class="table-btns">
            <a href="#"><button class="viewBtn" onclick="openModel()" id=""><i class="fas fa-eye"></i></button></a>
            </div>
          </td>
          <td><?php echo $online_order->payment_method ?></td>
          <?php if($online_order->status == "New Order"): ?>
          <td>
            <form action="<?php echo URLROOT; ?>/Cashier/updateStatus/<?php echo $data['orderId']; ?>" method="POST">
              <input type="hidden" name="order_id" value="<?php echo $online_order->order_id ?>">
              <button class="newOrderBtn" onclick="openSendOrder('<?=$online_order->order_id?>')"><?php echo $online_order->status ?></button>
            </form>
          </td>
          <?php elseif($online_order->status == "Ongoing"): ?>
            <td>
              <button class="ongoingBtn"><?php echo $online_order->status ?></button>
            </td>
          <?php else: ?>
            <td>
              <button class="deliveredBtn"><?php echo $online_order->status ?></button>
            </td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div id="newOrders" class="tabcontent">
    <p>New orderd</p>
  </div>
  <div id="Delivered" class="tabcontent">
    <p>Delivered</p>
  </div>
</div>

<!-- Send new order popup -->
<div class="model fade in" id="orderModel" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
      </div>
      <div class="model-body">
        <form action="<?php echo URLROOT?>/Cashier/updateStatus">
        <h1 class="Model-title">Is Order is ready to shift?</h1><br>
          <div class="form-group">
            <input type="text" name="order_id" id="newOrderId" style="display:none">
            <div class="btn">
              <button type="button" class="close" onclick="closeSendOrder()">Close</button>
            </div>
            <div class="btn">
              <button type="submit" class="close">Yes</button>
            </div>
          </div>
        </form>
      <br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>


<script>
  getUniqueValuesFromColumn2();
  getUniqueValuesFromColumn3();
</script>

<?php require APPROOT.'/views/include/footer.php'; ?>

<script>
  function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  window.location.href='/koratuwa/Cashier/viewCustomerOrders?status='+tabName;
}

  function changeStatus(button) {
    button.innerHTML = "Ongoing";
    button.style.backgroundColor = "rgb(93, 227, 184)";
  }

  function openSendOrder(id) {
    const orderId = document.getElementById("newOrderId");
    orderId.value = id;

    const model = document.getElementById("orderModel").classList.add("open-model");
  }

  function closeSendOrder() {
    const model = document.getElementById("orderModel").classList.remove("open-model");
  }
  
  
</script>