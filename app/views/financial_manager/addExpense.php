<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/addExpense.css">
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->

<div class="row">
  <div class="column left">
 

      <div class="box">
        <label><center>Number of Productions</center></label>
        <canvas id="ch2"></canvas>
      </div>

      
      <div class="total">
      Total expenses for the month:
      </div>
  </div>
  <div class="column right">
    
  <div class="form-container">

	<div class="form-header">
		<center><h1>Add Monthly Expenses</h1></center>
	</div>
	<br>
    <div class="dropdown">
  <button class="dropbtn">Select Month <i class="fa-solid fa-caret-down"></i></button>
  <div class="dropdown-content">
  <a href="#">JAN</a>
  <a href="#">FEB</a>
  <a href="#">MAR</a>
  <a href="#">APR</a>
  <a href="#">MAY</a>
  <a href="#">JUNE</a>
  <a href="#">JULY</a>
  <a href="#">AUG</a>
  <a href="#">SEP</a>
  <a href="#">OCT</a>
  <a href="#">NOV</a>
  <a href="#">DEC</a>
  </div>
</div>

	<form action="<?php echo URLROOT; ?>/Financial_Manager/addExpense" method="POST" enctype="multipart/form-data"> 
    	 
    <div class="form-input-title">Production Cost <i class="fa-solid fa-cheese"></i></div>
    <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
	<input type="text" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">

    <div class="form-input-title">Transportation Cost <i class="fa-solid fa-truck"></i></div>
    <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
	<input type="text" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">

    <div class="form-input-title">Supplier Charges <i class="fa-solid fa-hand-holding-dollar"></i></div>
    <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
	<input type="text" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">

    <div class="form-input-title">Livestock Management Cost <i class="fa-solid fa-cow"></i></div>
    <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
	<input type="text" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">

    <div class="form-input-title">Employee Management Cost <i class="fa-solid fa-users"></i></div>
    <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
	<input type="text" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">

    <div class="form-input-title">Other <i class="fa-solid fa-wallet"></i></div>
    <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
	<input type="text" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">



		<input type="submit" value="Submit" class="submitBtn"> 


	</form>
  </div>
</div>


<!-- 

<div class="form-container">

	<div class="form-header">
		<center><h1>Add new Expense Record</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Financial_Manager/addExpense" method="POST" enctype="multipart/form-data"> -->

		
	<!-- <div class="form-input-title">Date</div>
    <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
	<input type="date" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">

 
    <div class="form-input-title">Description</div>
    <span class="form-invalid"><?php echo $data['des_err']; ?></span>
    <input type="text" name="des" id="des" class="des" value="<?php echo $data['des']; ?>">


    <div class="form-input-title">Vendor</div>
    <span class="form-invalid"><?php echo $data['ven_err']; ?></span>
    <input type="text" name="ven" id="ven" class="ven" value="<?php echo $data['ven']; ?>">

    <div class="form-input-title">Amount</div>
    <span class="form-invalid"><?php echo $data['amo_err']; ?></span>
    <input type="number" name="amo" id="amo" class="amo" value="<?php echo $data['amo']; ?>">


    <div class="form-input-title">Recipt</div>
    <span class="form-invalid"><?php echo $data['image_err']; ?></span>
    <input type="file" name="image" id="image" class="image" value="<?php echo $data['image']; ?>"><br> -->



		<!-- <br>
		<input type="submit" value="Submit" class="submitBtn"> -->


	</form>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/fm.js"></script>
