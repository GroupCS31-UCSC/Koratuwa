<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/updateSupply.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->



		<div class="form-container">

			<div class="form-header">
				<center><h1>Update Supply Order</h1></center>
			</div>
			<br>

			<form action="<?php echo URLROOT; ?>/Supplier/updateSupOrder/<?php echo $data['supOrderId']; ?>" method="POST"  onsubmit="return validateForm()">

				<!--quantity-->
				<span class="form-invalid" style="color: red; display: none;" id="errTime"></span>
				<div class="form-input-title">Supply Quantity (LITER)</div>
				<span class="form-invalid"><?php echo $data['quantity_err']; ?></span>
				<input type="text" name="quantity" id="quantity" class="quantity" value="<?php echo $data['quantity']; ?>">


				<br>
				<input type="submit" value="Submit" class="submitBtn"><br>
				

			</form>
			
		</div>  
	
<script>
const myError2 = document.getElementById("errTime");
const mySubmit = document.getElementById("submitBtn");

function validateForm() {
      var current_time = new Date();
      var specific_time = new Date();
      specific_time.setHours(8, 0, 0); // set the specific time to 8 a.m.
      if (current_time.getTime() > specific_time.getTime()) {
        // alert("Error: Current time is less than 8 a.m.");
        myError2.innerHTML = "You have to update order quantity before 8.00 am";
        myError2.style.display = "inline";
        mySubmit.disabled = true; // disable submit button
        return false;
      }
      // If the current time is after 8 a.m., the form will be submitted normally
      return true;
    }	
</script>
<?php require APPROOT.'/views/include/footer.php'; ?>
