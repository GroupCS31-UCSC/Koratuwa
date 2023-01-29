<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/register.css">


<div class="split left">
	<div class="logo">
		<img src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo">
	</div>
</div>

<div class="split right">

	<div class="form-container">

		<div class="form-header">
			<center><h1>CUSTOMER SIGNUP</h1></center>
		</div>
		<br>
		

		<form action="<?php echo URLROOT; ?>/Users/registerCustomer" method="POST">

			<!--name-->
			<div class="form-input-title">Person/Company Name</div>
			<input type="text" name="name" id="name" class="name" value="<?php echo $data['name']; ?>">
			<span class="form-invalid"><?php echo $data['name_err']; ?></span>

	    <!--nic-->
	    <div class="form-input-title">NIC/Company Registration Number</div>
			<input type="text" name="nic" id="nic" class="nic" value="<?php echo $data['nic']; ?>">
			<span class="form-invalid"><?php echo $data['nic_err']; ?></span>

	    <!--contact no-->
	    <div class="form-input-title">Contact Number</div>
			<input type="number" name="tp_num" id="tp_num" class="tp_num" value="<?php echo $data['tp_num']; ?>">
			<span class="form-invalid"><?php echo $data['tp_num_err']; ?></span>

	    <!--address-->
	    <div class="form-input-title">Address</div>
			<input type="text" name="address" id="address" class="address" value="<?php echo $data['address']; ?>">
			<span class="form-invalid"><?php echo $data['address_err']; ?></span>

			<!--email-->
			<div class="form-input-title">Email</div>
			<input type="email" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
			<span class="form-invalid"><?php echo $data['email_err']; ?></span>

			<!--password-->
			<div class="form-input-title">Password</div>
			<input type="password" name="password" id="password" class="password" value="<?php echo $data['password']; ?>">
			<span class="form-invalid"><?php echo $data['password_err']; ?></span>

			<!--confirm password-->
			<div class="form-input-title">Confirm password</div>
			<input type="password" name="confirm_password" id="confirm_password" class="confirm_password" value="<?php echo $data['confirm_password']; ?>">
			<span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>

			<br>
			<input type="submit" value="Register" class="submitBtn">


		</form>
	</div>

</div>









<?php require APPROOT.'/views/include/footer.php'; ?>
