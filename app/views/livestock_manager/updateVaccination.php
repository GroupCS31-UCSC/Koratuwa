<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">


<div class="form-container">
	<div class="form-header">
		<center><h1>Update Vaccination</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/updateVaccination" method="POST">
        <!-- Cow Id -->
        <div class="form-input-title">Cow Id</div>
        <input type="text" name="cow_id" id="cow_id" class="cow_id" value="#">

        <!-- Vaccination type -->
        <!-- <div class="form-input-title">Vaccination type</div>
        <input type="text" name="vaccination" id="vaccination" class="vaccination" value="#"> -->
        
        <!--Date-->
        <div class="form-input-title">Date</div>
        <input type="date" name="date" id="date" class="date" value="#">
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
