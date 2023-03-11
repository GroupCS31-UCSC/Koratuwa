<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/forgotPw.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/buttons.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/forms.css">


<div class="split left">
	<div class="logo">
		<img src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo">
	</div>
</div>

<div class="split right">
	<div class="login-container">

		<div class="form-header">
			<center><h1>Forgot Password</h1></center>
		</div>
        <div>
            <p>No Problem! Enter your email below and we will send you an OTP to reset your password.</p>
        </div>
        <?php flash('user_notFount') ?>
		

		<form action="<?php echo URLROOT; ?>/Users/forgotPw" method="POST"> 

			<!--email-->
			<div class="form-input-title">Email</div>
			<input type="email" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
			<span class="form-invalid"><?php echo $data['email_err']; ?></span>

			<br>
			<input type="submit" value="Send" class="submitBtn">

		</form>

	</div>
</div>

<!-- <div class="wave">
	<img src="<?php echo URLROOT; ?>/img/milk-wave.png" alt="logo">
</div> -->




<?php require APPROOT.'/views/include/footer.php'; ?>
