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
          <input type="number" name="quantity" id="quantity" class="quantity" value="<?php $values = $data[0]?>" >  
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
    <!-- <div class="wrapper-1"> -->
  <input type="button" value="submit" class="submitBtn" onclick="payment()">
  </div>
</div>


<!-- notification view box -->
<div class="notifyBox" id="notifyBox">
  <?php foreach ($data[0]['notifications'] as $notifi) : ?>
    <div class="comment-box">
      <div class="box-top">
        <div class="comment">
          <p><strong><?php echo $notifi->order_id; ?></strong></p> 
        </div>
        <a href="<?php echo URLROOT?>/Cashier/updateNotifyStatus/<?php echo $notifi->notify_id ?>"><button class="" title="Mark As Read"><i class="fa-regular fa-eye"></i></button></a>
      </div>
      <div class="name">
        <span>New order Received.</span>    
        <?php echo $notifi->ordered_date; ?><?php echo $notifi->ordered_time; ?>        
      </div>
    </div>
  <?php endforeach; ?>
</div>


<!-- notification -->
<script>
  const noti = document.getElementById('notifyBox');
  let isBellClicked = true;

  let showNoti = function(){
    if(isBellClicked){
      noti.style.display='block';
      isBellClicked= false;
    }
    else{
      noti.style.display='none';
      isBellClicked= true;
    }
  }
</script>



<?php require APPROOT.'/views/include/footer.php'; ?>


<script>
  
  var total = 0;
  var products = [];  
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
    
    document.getElementById("tbody").innerHTML += "<tr class='product-row'><td>" + id + "</td><td>" + name + "</td><td>" + up + "</td><td>" + qnty + "</td><td>" + subTot + "</td></tr>";
   
    total += parseInt(subTot);
    
    document.getElementById("total").innerHTML = total;

    const postData = {
      saleId: saleId,
      id: id,
      qnty: qnty
    }
    console.log(saleId);
    products.push(postData);
  }

  function payment() {
    var saleId = document.getElementById("saleId").value;
    const postData = {
      saleId: saleId,
      total: total,
      ps:products
    }
    console.log(JSON.stringify(postData.ps));

    fetch('/koratuwa/Cashier/submitdata',{
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    }).then(res => res.json()).then(data => {
      console.log(data);
      window.location.href = "/koratuwa/Cashier/cashierHome";
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





