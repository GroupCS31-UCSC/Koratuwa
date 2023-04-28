<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/cashier_home.css">


<div class="container">
  <!-- <div class="split left">
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
              <td data-label="Date"><?php echo $ongoing->ordered_date; ?></td>
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
  </div> -->
  <!-- <div class="split right"> -->
    <!-- <div class="graphBox">
      <div class="box">
        <label><center>Orders</center></label>
        <canvas id="order"></canvas>
      </div> -->
      <!-- <div class="box">
        <label><center>Percentages of sales</center></label>
        <canvas id="type"></canvas>
      </div> -->
      <div class="form-container">
	<div class="form-header">
		<center><h1>Product Details</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Cashier/addSale" method="POST" enctype="multipart/form-data">  
    <!-- Product Id -->
    <div class="form-input-title">Product Id</div>
    <span class="form-invalid"><?php echo $data[0]['productId_err']; ?></span>
    <label for="Select the Product"></label>
    <?php $values = $data[1]?>
    <select name="productId" id="productId">
      <?php foreach($values as $product_id):?>
        <option value="<?=$product_id->product_id?>" name="productId" id="productId"><?=$product_id->product_id?></option>
      <?php endforeach;?>
    </select>
    <!-- Product Name -->
    <!-- <div class="form-input-title">Product Name</div>
    <input type="text" name="productName" id="productName" class="productName" value="<?php $values = $data[1]?>" disabled> -->
    
    <!-- Quantity -->
		<div class="form-input-title">Quantity</div>
    <!-- <span class="form-invalid"><?php echo $data[0]['quantity_err']; ?></span> -->
    <input type="number" name="quantity" id="quantity" class="quantity" value="" required onchange="calculate()">  
      <!-- price// this should get from table -->
    <!-- Unit Price -->
    <div class="form-input-title">Unit Price</div>
    <!-- <span class="form-invalid"><?php echo $data[0]['unitPrice_err']; ?></span> -->
    <input type="number" name="unitPrice" id="unitPrice" class="unitPrice" value="" required>
		<br>
		<input type="submit" value="OK" class="submitBtn" onclick="addData()">
  </form>
  
</div>
<table>
      <tr>
        <th id="productId">Product Id</th>
        <!-- <th>Product Name</th> -->
        <th>Unit Price</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
      <tr id="tbody">
      </tr>
    </table>
    <hr>
    <table>
      <tr>
        <th width="20%"></th>
        <th width="20%"></th>
        <th width="20%"></th>
        <th width="20%">Subtotal:</th>
        <th width="20%" id="subtotal-amount"></th>
      </tr>
      <!-- <tr>
            <th width="20%"></th>
            <th width="20%"></th>
            <th width="20%"></th>
            <th width="20%">Tax:</th>
            <th width="20%">0 Rs</th>
        </tr> -->
        <tr>
            <th width="20%"></th>
            <th width="20%"></th>
            <th width="20%"></th>
            <th width="20%">Total Amount(Rs):</th>
            <th width="20%" id="total"></th>
        </tr>
    </table>
    <!-- </div> -->
  </div>
<!-- </div> -->




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>

<script>
  function calculate(){
    var quantity = document.getElementById("quantity").value;
    var unitPrice = document.getElementById("unitPrice").value;
    var price = quantity * unitPrice;
    document.getElementById("price").value = price;
  }

  function addData(){
    document.getElementById("tbody").innerHTML += "<tr><td>" + productId + "</td><td>" + unitPrice + "</td><td>" + quantity + "</td><td>";
    document.getElementById("productId").value = "";
    document.getElementById("unitPrice").value = "";
    document.getElementById("quantity").value = "";

    document.getElementById("subtotal-amount").innerHTML = unitPrice * quantity;
    document.getElementById("total").innerHTML = unitPrice * quantity;

    var subtotal = 0;
  }
</script>