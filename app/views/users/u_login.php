<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/login.css">


<div class="split left">
	<div class="logo">
		<img src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo">
	</div>
</div>

<div class="split right">
	<div class="form-container">

		<div class="form-header">
			<center><h1>LOG IN</h1></center>
		</div>
		<br>
		

		<form action="<?php echo URLROOT; ?>/Users/login" method="POST">

			<!--email-->
			<div class="form-input-title">Email</div>
			<input type="email" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
			<span class="form-invalid"><?php echo $data['email_err']; ?></span>

			<!--password-->
			<div class="form-input-title">Password</div>
			<input type="password" name="password" id="password" class="password" value="<?php echo $data['password']; ?>">
			<span class="form-invalid"><?php echo $data['password_err']; ?></span>

			<br>
			<input type="submit" value="Log in" class="submitBtn">

		</form>

		<div class="container" style="background-color:rgb(245, 244, 240)">
			<input type="button" value="Forgot Password ?" class="fpw" onclick="location.href='<?php echo URLROOT; ?>/Users/login' ">
    </div>

	</div>
</div>

<div class="wave">
	<img src="<?php echo URLROOT; ?>/img/milk-wave.png" alt="logo">
</div>




<?php require APPROOT.'/views/include/footer.php'; ?>
