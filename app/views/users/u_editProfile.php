<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/editProfile.css">
<?php require APPROOT.'/views/users/u_profile_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->

<?php if($_SESSION['user_type'] == 'Supplier') : ?>
    <?php foreach ($data['userProfile'] as $sup) : ?>

		<div class="form-container">

			<div class="form-header">
				<center><h1>Edit Profile</h1></center>
			</div>
			<br>

			<form action="<?php echo URLROOT; ?>/Users/editProfile/<?php echo $_SESSION['user_id']; ?>" method="POST">

				<!--quantity-->
				<div class="form-input-title">Name</div>
				<!-- <span class="form-invalid"><?php echo $data['quantity_err']; ?></span> -->
				<input type="text" name="quantity" id="quantity" class="quantity" value="<?php echo $sup->name; ?>">

				<!--supply_date-->
				<div class="form-input-title">Address</div>
				<!-- <span class="form-invalid"><?php echo $data['date_err']; ?></span> -->
				<input type="text" name="date" id="date" class="date" value="<?php echo $sup->address; ?>">

				<!--address-->
				<div class="form-input-title">Contact Number</div>
				<!-- <span class="form-invalid"><?php echo $data['address_err']; ?></span> -->
				<input type="text" name="address" id="address" class="address" value="<?php echo $sup->contact_number; ?>">

				<br>
				<input type="submit" value="Submit" class="submitBtn"><br>
				

			</form>
			
		</div>  
    <?php endforeach; ?>
<?php endif; ?>
<?php require APPROOT.'/views/include/footer.php'; ?>
