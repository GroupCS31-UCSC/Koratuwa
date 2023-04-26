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
  </div>
  <div class="split right">
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
	<form action="<?php echo URLROOT; ?>/Cashier/addSale" method="POST">        
        <div class="form-input-title">Product Name</div>
        <span class="form-invalid"></span>
        <input type="number" name="product_name" id="product_name" class="product_name" value="" required>
        <!-- <input type="number" name="product_name" id="product_name" class="product_name" value="<?php echo $data['product_name'];?>" required> -->

		<div class="form-input-title">quantity</div>
        <span class="form-invalid"></span>
        <input type="number" name="quantity" id="quantity" class="quantity" value="<?php echo $data['quantity'];?>" required>
        <!-- <input type="number" name="quantity" id="quantity" class="quantity" value="<?php echo $data['quantity'];?>" required> -->
    
		<br>
		<input type="submit" value="OK" class="submitBtn">
  </form>
  
</div>
<table>
      <tr>
        <th>Product Name</th>
        <th>Unit Price</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
      <tr>
        <td>Product 1</td>
        <td>Rs. 100</td>
        <td>1</td>
        <td>Rs. 100</td>        
      </tr>
    </table>
    </div>
  </div>
</div>




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>
