<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/generateReceipt.css">

<input type="button" value="Print" class="print-btn" onclick="">

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
		<div id="table">
			<table>
				<tr>
					<th><h2>Product</h2></th>
					<th><h2>Quantity</h2></th>
					<th><h2>Sub Total</h2></th>
				</tr>
				<tr>
					<td>Yogurt</td>
					<td>2</td>
					<td>140.00</td>
				</tr>

				<tr>
					<td>Flesh Milk</td>
					<td>1</td>
					<td>100.00</td>
				</tr>
				<tr>
					<td>Flavoured Milk</td>
					<td>5</td>
					<td>400.00</td>
				</tr>
				
				<tr>
					<th></th>
					<th><h2>Total</h2></th>
					<th><h2>640.00</h2></th>
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


<?php require APPROOT.'/views/include/footer.php'; ?>
