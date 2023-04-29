<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/cashier_home.css">


<div class="container">
  <div class="form-container">
	  <div class="form-header">
		  <h3>Product Details</h3>
	  </div>
	  <br>
	  <form action="<?php echo URLROOT; ?>/Cashier/cashierHome" method="POST" enctype="multipart/form-data">  
      <div class="form-input-container">
        <div class="form-input-wrapper">
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
        </div>
        <div class="form-input-wrapper">
          <!-- Quantity -->
          <div class="form-input-title">Quantity</div>
          <span class="form-invalid"><?php echo $data[0]['quantity_err']; ?></span>
          <input type="number" name="quantity" id="quantity" class="quantity" value="<?php $values = $data[0]?>" required onchange="calculate()">  
        </div>
      </div>
		  <input type="submit" value="OK" class="submitBtn" onclick="addData()">
    </form>
  </div>
  <hr>
  <table>
    <tr>
      <th id="productId">Product Id</th>
      <th>Product Name</th>
      <th>Unit Price</th>
      <th>Quantity</th>
      <th>Price</th>
      <th class="action"></th>
    </tr>
    <tr id="tbody">
    </tr>
  </table>
  <hr>
  <table class="sub-table">
    <tr>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="20%" class="topic">Total Amount(Rs):</th>
      <th width="20%" class="topic" id="total"></th>
    </tr>
    <tr>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="20%" class="topic">Cash:</th>
      <th width="20%" class="topic">
      <input type="number" name="cash" id="cash" class="cash" required>
      </th>
    </tr>
    <tr>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="20%" class="topic">Balance:</th>
      <th width="20%" class="topic" id="balace"></th>
    </tr>
  </table>
  <!-- popup receipt -->
  <input type="submit" value="PRINT RECEIPT" class="submitBtn" onclick="openModel()">
</div>

<div class="model fade in" id="model" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeModel()"><span aria-hidden="true">×</span></button>
      </div>
      <div class="model-body">
        <div class="receipt" id="receipt">
        <center id="top">
		      <div class="logo">
			      <img class="img-logo" src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo">
		      </div>
    	    <div class="info"> 
    		    <h1>Koratuwa Dairy Farm</h1>
    	    </div>
        </center>
        <div id="mid">
          <div class="info">
            <h2>Contact Info</h2>
            <p> 
            Address : No 88, Koratuwa Road, Anguruwatota</br>
            Email   : koratuwa@gmail.com</br>
            Phone   : +9177 067 3739</br>
			      facebook :  https://www.facebook.com/koratuwa.dairyfarm
            </p>
          </div>
        </div>
        <div id="bot">
        <h6>Receipt Id:</h6>
        <h6 id=receiptId></h6>
		      <div id="table">
			      <table class="receipt-table">
				      <tr>
					      <th><h2>Product</h2></th>
					      <th><h2>Quantity</h2></th>
					      <th><h2>Sub Total</h2></th>
				      </tr>
				      <tr id="tbody-receipt">
              </tr>
				      <tr>
					      <th></th>
					      <th><h2>Total</h2></th>
					      <th id="total"><h2></h2></th>
				      </tr>
              <tr>
					      <th></th>
					      <th><h2>Cash</h2></th>
					      <th id="cash"><h2></h2></th>
				      </tr>
              <tr>
					      <th></th>
					      <th><h2>Balance</h2></th>
					      <th id="balance"><h2></h2></th>
				      </tr>
			      </table>
		      </div>
		      <div id="legalcopy">
			      <p class="legal"><strong>Thank you for doing business with us</strong>
			      Coom again soon!
			      </p>
		      </div>
	      </div>
        </div>  
        <br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>




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
    var cash = document.getElementById("balace").value;
    document.getElementById("tbody").innerHTML += "<tr><td>" + productId + "</td><td>" + unitPrice + "</td><td>" + quantity + "</td><td>";
    document.getElementById("productId").value = "";
    document.getElementById("unitPrice").value = "";
    document.getElementById("quantity").value = "";

    document.getElementById("total").innerHTML = unitPrice * quantity;
    document.getElementById("balance").innerHTML = cash - total;

  }

  function openModel(){
  document.getElementById("model").classList.add("open-model");
}
function closeModel(){
  document.getElementById("model").classList.remove("open-model");
}
</script>