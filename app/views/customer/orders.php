<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/orders.css">

<script src="<?php echo URLROOT; ?>/js/customer.js"></script>


<!-- Flash massages -->

<div class="section">
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
    <br><br><br>
    <!-- refresh button -->
    <input type="button" value="Refresh" class="" onclick="location.href='<?php echo URLROOT; ?>/Customer/Orders' ">
    
    <!-- Feedback button -->
    <?php foreach ($data ['orderDetails'] as $online_order) : ?>
      <?php if($online_order->status == "Delivered"): ?>
      <div class="addFeedback">
        <button class="feedbackBtn" onclick="openFeedback()">Add Feedback</button>
      </div>
    <?php endif; ?>
    <?php break; ?>
    <?php endforeach; ?>

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
          <?php $data_index=0 ?>
          <?php foreach ($data ['orderDetails'] as $online_order) : ?>
          <td><?php echo $online_order->order_id ?></td>
          <td><?php echo $online_order->ordered_date ?></td>
          <td><?php echo $online_order->total_payment ?></td>
          <td>
            <div class="table-btns">
            <a href="#"><button class="viewBtn" onclick="openModel('<?php echo $online_order->order_id?>')" id="<?php echo($data_index)?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td>
          <!-- <td><?php echo $online_order->payment_method ?></td> -->
          <?php if($online_order->status == "New Order"): ?>
          <td>
            <button class="newOrderBtn"><?php echo $online_order->status ?></button>
          </td>
          <?php elseif($online_order->status == "Ongoing"): ?>
            <td>
                <button class="ongoingBtn" onclick="openDeliveredOrder('<?=$online_order->order_id?>')"><?php echo $online_order->status ?></button>
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
  <div id="Ongoing" class="tabcontent">
    <p>Ongoing</p>
  </div>
  <div id="Delivered" class="tabcontent">
    <p>Delivered</p>
  </div>
</div>

<!-- Send receive order popup -->
<div class="model fade in" id="deliveredModel" tabindex="-1">
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

<!-- View popup -->
<div class="model fade in" id="model" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
        <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i> Items</h4>
      </div>
      <div class="model-body">
        <table class="tableForm">
            <tbody id="items">
          </tbody>           
        </table><br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>

<!-- Feedback -->
<div class="model fade in" id="feedbackModel" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeFeedback()" ><span aria-hidden="true">×</span></button>
      </div>
      <div class="model-body">
      <form action="<?php echo URLROOT; ?>/Customer/customerFeedback" method="POST">
        <div class="form-input-title">Feedback</div>
        <!-- <input type="text" name="text" id="feedback" class="feedback" value="<?php echo $data['feedback']; ?>"><br> -->
        <div class="submit_btn"><input type="submit" value="Submit" class="submitBtn"><br></div>
      </form>
      <br>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  <h3>Koratuwa Dairy Farm</h3>
  </div>
</div>

<script>
  getUniqueValuesFromColumn2();
  getUniqueValuesFromColumn3();
</script>

<?php require APPROOT.'/views/include/footer.php'; ?>

<script>
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

    const model = document.getElementById("deliveredModel").classList.add("open-model");
  }

  function closeDeliveredOrder() {
    const model = document.getElementById("deliveredModel").classList.remove("open-model");
  }

  function openFeedback() {
    document.getElementById("feedbackModel").classList.add("open-model");
  }

  function closeFeedback() {
    document.getElementById("feedbackModel").classList.remove("open-model");
  }

  function openModel(id) {
    console.log(id);
    const url = "/koratuwa/Customer/getSaleItems/"+id;
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
        const productDetails = doc.getElementById("items");
        console.log(items);
        document.getElementById("items").innerHTML = productDetails.innerHTML;
        

        document.getElementById("items").innerHTML = productDetails.innerHTML;
      }
    });
    document.getElementById("model").classList.add("open-model");
    
  }

  function closeModel() {
    document.getElementById("model").classList.remove("open-model");
  }
  
  
</script>