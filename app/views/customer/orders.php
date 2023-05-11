<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/orders.css">

<script src="<?php echo URLROOT; ?>/js/customer.js"></script>


<!-- Flash massages -->

<div class="section">
<div class="divContainer">
  <div class="tab">
    <?php $status=$_GET['status']??'New Order';?>
    <button class="tablinks <?= $status==="New Order"?'active':''?>" onclick="openTab(event, 'New Order')">New Order</button>
    <button class="tablinks <?= $status==="Ongoing"?'active':''?>" onclick="openTab(event, 'Ongoing')">Ongoing</button>
    <button class="tablinks <?= $status==="Delivered"?'active':''?>" onclick="openTab(event, 'Delivered')">Delivered Orders</button>
  </div>

  <div id="newOrders" class="tabcontent active">
    <div class="container" style="overflow-x: auto;">
    <!-- search -->
    <input type="text" id="searchInput" placeholder="Search By Order IDs..." onkeyup="searchFunc();">
    <br><br>

    <!--date filter -->
    <form action="<?php echo URLROOT; ?>/Customer/Orders" method="POST" >
      <label for="from">From :</label>
      <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
      <label for="to">  To :</label>
      <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
      <input type="submit" value="Search" class="submitBtn"> 
    </form>
    <br><br>
    <!-- refresh button -->
    <input type="button" value="Refresh" class="" onclick="location.href='<?php echo URLROOT; ?>/Customer/Orders' ">

    <table id="detailsTable">
      <thead>
        <th>Order ID</th>
        <th>Date</th>
        <th>Total Payment</th>
        <!-- <th>Payment Status</th> -->
        <!-- <th>Customer ID</th> -->
        <th>Items</th>
        <!-- <th>
          <select class="table-filter2" onchange="filter_rows2()">
            <option value="all">Payment Method</option>
          </select>
        </th>
         -->
        <th>Status</th>
        
      </thead>
      <tbody>
        <tr>
          <?php foreach ($data ['orderDetails'] as $online_order) : ?>
          <td><?php echo $online_order->order_id ?></td>
          <td><?php echo $online_order->ordered_date ?></td>
          <!-- <td><?php echo $online_order->total_payment ?></td> -->
          <td><?php echo '' ?></td>


          <td><?php echo $online_order->payment_method ?></td>
          <?php if($online_order->status == "New Order"): ?>
          <td>
            <button class="newOrderBtn"><?php echo $online_order->status ?></button>
          </td>
          <?php elseif($online_order->status == "Ongoing"): ?>
            <td>
                <form action="<?php echo URLROOT; ?>/Customer/updateStatus/<?php $online_order->order_id ?>" method="POST">
                <input type="hidden" name="order_id" value="<?php echo $online_order->order_id ?>">
                <button class="ongoingBtn" onclick="openDeliveredOrder('<?=$online_order->order_id?>')"><?php echo $online_order->status ?></button>
                </form>
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
  <div id="Ongoing" class="tabcontent">
    <p>Ongoing</p>
  </div>
  <div id="Delivered" class="tabcontent">
    <p>Delivered</p>
  </div>
  <div class="addFeedback">
    <button id="myBtn">Add Feedback</button>
  </div>
</div>

<!-- Send new order popup -->
<div class="model fade in" id="orderModel" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
      </div>
      <div class="model-body">
        <form action="<?php echo URLROOT?>/Customer/updateStatus">
        <h1 class="Model-title">Do you received this Order?</h1><br>
          <div class="form-group">
            <input type="text" name="order_id" id="newOrderId" style="display:none">
            <div class="btn">
              <button type="button" class="close" onclick="closeDeliveredOrder()">Close</button>
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

</div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Add your Feedback</h2>
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
  getUniqueValuesFromColumn2();
  getUniqueValuesFromColumn3();
</script>

<?php require APPROOT.'/views/include/footer.php'; ?>

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
 




  function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  window.location.href='/koratuwa/Customer/Orders?status='+tabName;
}

  function changeStatus(button) {
    button.innerHTML = "Ongoing";
    button.style.backgroundColor = "rgb(93, 227, 184)";
  }

  function openDeliveredOrder(id) {
    const orderId = document.getElementById("newOrderId");
    orderId.value = id;

    const model = document.getElementById("orderModel").classList.add("open-model");
  }

  function closeDeliveredOrder() {
    const model = document.getElementById("orderModel").classList.remove("open-model");
  }
  
  
</script>