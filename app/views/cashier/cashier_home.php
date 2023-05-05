<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/cashier_home.css">


<div class="container">
  <div class="form-container">
    
	  <div class="form-header">
		  <h3>Product Details</h3>
	  </div>
    <input type="text" id="saleId" value="<?php echo $data[0]['saleId']; ?>" style="display:none">
	  <form action="<?php echo URLROOT; ?>/Cashier/cashierHome" method="POST" enctype="multipart/form-data">  
      <div class="form-input-container">
        <div class="form-input-wrapper">
          <!-- Product Id -->
          <div class="form-input-title">Product Name</div>
          <label for="Select the Product"></label>
          <?php $values = $data[1]?>
          <select name="product" id="product">
            <?php foreach($values as $value):?>
            <option value='{"ID":"<?=$value->product_id?>","Name":"<?=$value->product_name?>","UP":<?=$value->unit_price?>}' name="product" id="product"><?=$value->product_name?></option>
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
		  
    </form>
    <button class="submitBtn" onclick="addData()">OK</button>
  </div>
  <hr>
  <table>
    <tr>
      <th id="productId">Product Id</th>
      <th>Product Name</th>
      <th>Unit Price</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
    <tbody id="tbody">
    </tbody>
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
      <input type="number" name="cash" id="cash" class="cash" oninput="updateBalance()" required>
      </th>
    </tr>
    <tr>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="20%" class="topic">Balance:</th>
      <th width="20%" class="topic" id="balace"><input readonly type='number' name="balance" id="balance-output"></th>
    </tr>
  </table>
  <div class="btn-wrapper"> 
    <div class="wrapper-1">
  <input type="submit" value="submit" class="submitBtn" onclick="payment()">
  </div>
  <!-- popup receipt -->
  <div class="wrapper-1">
  <input type="submit" value="PRINT RECEIPT" class="submitBtn" onclick="openModel()">
  </div>
  </div>
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
					      <th id="cash" ><h2></h2></th>
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


<script>
  function calculate(){
    var quantity = document.getElementById("quantity").value;
    var unitPrice = document.getElementById("unitPrice").value;
    var price = quantity * unitPrice;
    document.getElementById("price").value = price;
  }
  
var total = 0;
  
  function addData(){
    const value = document.getElementById("product").value;
    const btn = document.getElementById("product");
    const selectedOption=JSON.parse(btn.value);
    const name = selectedOption.Name;
    const id = selectedOption.ID;
    const up = selectedOption.UP;

    var saleId = document.getElementById("saleId").value;
    var qnty = document.getElementById("quantity").value;
    var subTot = up * qnty;
    
    document.getElementById("tbody").innerHTML += "<tr><td>" + id + "</td><td>" + name + "</td><td>" + up + "</td><td>" + qnty + "</td><td>" + subTot + "</td></tr>";
   
    total += parseInt(subTot);
    
    document.getElementById("total").innerHTML = total;
    var cash = document.getElementById("cash").value;
    
    document.getElementById("balance").innerHTML = cash - total;

    const postData = {
      saleId: saleId,
      id: id,
      qnty: qnty,
      subTot: subTot,
      total: total,
    }

    fetch('/koratuwa/Cashier/saveProductSale',{
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    }).then(res => res.json()).then(data => {
      console.log(data);
    }).catch(err => console.log(err));
  }

  function payment() {
    var saleId = document.getElementById("saleId").value;

    const postData = {
      saleId: saleId,
    }

    fetch('/koratuwa/Cashier/submitdata',{
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    }).then(res => res.json()).then(data => {
      console.log(data);
    }).catch(err => console.log(err));
  }

  function openModel(){
  document.getElementById("model").classList.add("open-model");
}
function closeModel(){
  document.getElementById("model").classList.remove("open-model");
}

function updateBalance() {
  // Get the cash and balance elements by ID
  const cashElement = document.getElementById('cash');
  const balanceElement = document.getElementById('balance-output');

  // Get the initial total value from the total element by ID
  const totalElement = document.getElementById('total');
  const totalValue = parseFloat(totalElement.textContent);

  // Convert the cash value to a number, or default to 0 if empty
  const cashValue = parseFloat(cashElement.value) || 0;

  // Calculate the balance value and update the balance element
  const balanceValue = cashValue - totalValue;
  balanceElement.value = balanceValue.toFixed(2);
}


</script>