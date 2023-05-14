<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewCustomerOrders.css">

<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>

<?php $updateStatusFlash = flash('update_status_success'); ?>
<?php if ($updateStatusFlash): ?>
  <div class="flash-msg" style="display:block;" >
    <?php echo $updateStatusFlash; ?>
  </div>
<?php endif; ?>

<div class="section">
  <div class="tab">
    <?php $status=$_GET['status']??'New Order';?>
    <button class="tablinks <?= $status==="New Order"?'active':''?>" onclick="openTab(event, 'New Order')">New Orders</button>
    <button class="tablinks <?= $status==="Ongoing"?'active':''?>" onclick="openTab(event, 'Ongoing')">Ongoing Orders</button>
    <button class="tablinks <?= $status==="Delivered"?'active':''?>" onclick="openTab(event, 'Delivered')">Delivered Orders</button>
  </div>

  <div id="Ongoing" class="tabcontent active">
    <div class="container" style="overflow-x: auto;">
    <!-- search -->
    <div class="serch">
    <div class="search-container">
    <div class="search-icon"><button><i class="fa-solid fa-magnifying-glass"></i></button></div>
    <input type="text" id="searchInput2" placeholder="Search By Order IDs..." onkeyup="searchFunc2();">
    </div>
    <!-- search -->
    <div class="search-container">
    <div class="search-icon"><button><i class="fa-solid fa-magnifying-glass"></i></button></div>
    <input type="text" id="searchInput4" placeholder="Search By Customer IDs..." onkeyup="searchFunc4();">
    </div>
    </div>
    

    <!--date filter -->
    <form action="<?php echo URLROOT; ?>/Cashier/viewCustomerOrders" method="POST" >
      <label for="from">From :</label>
      <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
      <label for="to">  To :</label>
      <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
      <div class="form-input-container">
      <div class="form-input-wrapper">
      <input type="submit" value="Search" class="submitBtn"> 
      </div>
      <div class="form-input-wrapper">
        <!-- refresh button -->
    <input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Cashier/viewCustomerOrders' ">
      </div>
    </form>
    </div>
    

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
        <?php $data_index = 0; ?>
        <tr>
          <?php foreach ($data ['onlineOrderView'] as $online_order) : ?>
          <td><?php echo $online_order->order_id ?></td>
          <td><?php echo $online_order->ordered_date ?></td>
          <td><?php echo $online_order->total_payment ?></td>
          <td><?php echo $online_order->payment_status ?></td>
          <td><?php echo $online_order->customer_id ?></td>
          <td>
            <div class="table-btns">
            <a href="#"><button class="viewBtn" onclick="openModel('<?=$online_order->order_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td>
          <td><?php echo $online_order->payment_method ?></td>
          <?php if($online_order->status == "New Order"): ?>
          <td>
            <form action="<?php echo URLROOT; ?>/Cashier/updateStatus/<?php $online_order->order_id ?>" method="POST">
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
        <?php $data_index++; ?>
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

<div class="model fade in" id="model" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
        <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i>Order Items</h4>
      </div>
      <div class="model-body">
        <table class="tableForm">
            <tbody id="productDetails2">
          </tbody>           
        </table><br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>
<!-- Send new order popup -->
<div class="model fade in" id="orderModel" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
      </div>
      <div class="model-body">
        <form action="<?php echo URLROOT?>/Cashier/updateStatus">
        <h1 class="Model-title">Is this order ready to ship?</h1><br>
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
  
  function openModel(id) {
    const url = "/koratuwa/Cashier/getOrderItems/"+id;
    const form = new FormData();
    form.append("id", id);
    fetch(url, {
      method: "GET"
    }).then(response => response.text())
    .then(data => {
      console.log(data);
      if(data) {
        const domp = new DOMParser();
        const doc = domp.parseFromString(data, "text/html");
        const productDetails2 = doc.getElementById("productDetails2");
        console.log(productDetails2);
        document.getElementById("productDetails2").innerHTML = productDetails2.innerHTML;
        

        document.getElementById("productDetails2").innerHTML = productDetails2.innerHTML;
      }
    });
    document.getElementById("model").classList.add("open-model");
    
  }

  function closeModel() {
    document.getElementById("model").classList.remove("open-model");
  }

  const fm = document.getElementById('msg-flash');
  fm.style.display = 'block';
  setTimeout(function() {
    fm.style.display = 'none';
  }, 1000);
  
</script>