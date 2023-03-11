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
			<center><h1>Change Password</h1></center>
		</div>
        
        <?php flash('new_password') ?>		

		<form action="<?php echo URLROOT; ?>/Users/changePw/<?php echo $_SESSION['user_email']; ?>" method="POST"> 

            <!--old password-->
            <div class="form-input-title">Old Password</div>
            <input type="password" name="old_password" id="old_password" class="old_password" value="<?php echo $data['old_password']; ?>">
            <span class="form-invalid"><?php echo $data['old_password_err']; ?></span>

			<!--new password-->
            <div class="form-input-title">New Password</div>
            <input type="password" name="password" id="password" class="password" value="<?php echo $data['password']; ?>">
            <span class="form-invalid"><?php echo $data['password_err']; ?></span>

            <!--confirm password-->
            <div class="form-input-title">Confirm password</div>
            <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" value="<?php echo $data['confirm_password']; ?>">
            <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>

			<br>
			<input type="submit" value="Send" class="submitBtn">

		</form>

	</div>
</div>

<!-- <div class="wave">
	<img src="<?php echo URLROOT; ?>/img/milk-wave.png" alt="logo">
</div> -->




<?php require APPROOT.'/views/include/footer.php'; ?>
