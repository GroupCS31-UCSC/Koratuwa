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
			<center><h1>OTP Verification</h1></center>
		</div>
        
        <?php flash('otp_verify') ?>

        <?php flash('otp_mismatched') ?> <br>
		

		<form action="<?php echo URLROOT; ?>/Users/resetPw" method="POST"> 

			<!--email-->
			<input type="text" name="otp" id="otp" placeholder="Enter Code" class="otp" value="<?php echo $data['otp']; ?>">
			<span class="form-invalid"><?php echo $data['otp_err']; ?></span>

			<br>
			<input type="submit" value="Send" class="submitBtn">

		</form>

	</div>
</div>

<!-- <div class="wave">
	<img src="<?php echo URLROOT; ?>/img/milk-wave.png" alt="logo">
</div> -->




<?php require APPROOT.'/views/include/footer.php'; ?>
