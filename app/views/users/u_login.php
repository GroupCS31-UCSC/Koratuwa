<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/login.css">

<?php flash('reg_flash'); ?>

<?php flash('reg_flash'); ?>


<div class="split left">
	<div class="logo">
		<img src="<?php echo URLROOT; ?>/img/white_logo.png" alt="logo">
	</div>
</div>

<div class="split right">
	<img class="bg-img" src="<?php echo URLROOT; ?> /img/loginsu.jpg" alt="no">
	<div class="form-container">

		<div class="form-header">
			<center><h1>LOGIN</h1></center>
		</div>
		<br>
		<p><b>Please fill the correct credentials to login.</b></p>

		<form action="<?php echo URLROOT; ?>/Users/login" method="POST">

			<!--email-->
			<div class="form-input-title">Email</div>
			<input type="text" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
			<span class="form-invalid"><?php echo $data['email_err']; ?></span>

			<!--password-->
			<div class="form-input-title">Password</div>
			<input type="password" name="password" id="password" class="password" value="<?php echo $data['password']; ?>">
			<span class="form-invalid"><?php echo $data['password_err']; ?></span>

			<br>
			<input type="submit" value="Login" class="form-btn">

		</form>

		<div class="container">
			<input type="button" value="Forgot Password ?" class="btn1" onclick="location.href='<?php echo URLROOT; ?>/Users/login' ">
    </div>

	</div>
</div>



<?php require APPROOT.'/views/include/footer.php'; ?>
