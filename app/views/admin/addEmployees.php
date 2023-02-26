<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/addEmployees.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<div class="form-container">

	<div class="form-header">
		<center><h1>Add New Employee</h1></center>
	</div>
	<br>

	<form id="addForm" action="<?php echo URLROOT; ?>/Admin/addEmployees" method="POST" enctype="multipart/form-data">

		<!--name-->
    <div class="feature">
      <div class="form-input-title">Employee Name</div>
      <span class="form-invalid"><?php echo $data['name_err']; ?></span>
      <input type="text" name="name" id="name" class="name" autocomplete="off" value="<?php echo $data['name']; ?>">
    </div>

    <!--nic-->
    <div class="feature">
      <div class="form-input-title">NIC</div>
      <span class="form-invalid"><?php echo $data['nic_err']; ?></span>
      <input type="text" name="nic" id="nic" class="nic" autocomplete="off" value="<?php echo $data['nic']; ?>">
    </div>

    <!--contact no-->
    <div class="feature">
      <div class="form-input-title">Contact Number</div>
      <span class="form-invalid"><?php echo $data['tp_num_err']; ?></span>
      <input type="text" name="tp_num" id="tp_num" class="tp_num" autocomplete="off" value="<?php echo $data['tp_num']; ?>">
    </div>

    <!-- gender -->
    <div class="feature">
      <div class="form-input-title">Gender</div>

      <input type="radio" name="gender" id="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male"> Male
      <input type="radio" name="gender" id="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female"> Female

      <!-- <input type="radio" name="gender" id="gender" value="Male"> Male
      <input type="radio" name="gender" id="gender" value="Female"> Female -->
    </div>

    <!--address-->
    <div class="feature">
      <div class="form-input-title">Address</div>
      <input type="text" name="address" id="address" class="address" autocomplete="off" value="<?php echo $data['address']; ?>">
    </div>

		<!--email-->
    <div class="feature">
      <div class="form-input-title">Email</div>
      <span class="form-invalid"><?php echo $data['email_err']; ?></span>
      <input type="email" name="email" id="email" class="email" autocomplete="off" value="<?php echo $data['email']; ?>">
    </div>

		<!--employment-->
    <div class="feature">
      <div class="form-input-title">Employment</div>
      <span class="form-invalid"><?php echo $data['employment_err']; ?></span>
      <select class="employment" name="employment" id="employment" value="<?php echo $data['employment']; ?>">
      <!-- foreach($categories as $category){
        <option value="$category[]">$category[]</option>

      } -->
        <option value="Select">--Select--</option>
        <option value="Product Manager">Product Manager</option>
        <option value="Livestock Manager">Livestock Manager</option>
        <option value="Milk Collection Officer">Milk Collection Officer</option>
        <option value="Financial Manager">Financial Manager</option>
        <option value="Cashier">Cashier</option>
      </select>
    </div>

    <!--image-->
    <div class="feature">
      <div class="form-input-title">Image</div>
      <input type="file" name="image" id="image" class="image" value="<?php echo $data['image']; ?>"><br>
    </div>
    

		<br>
    <div class="feature">
      <!-- <input type="submit" value="Submit" class="submitBtn" onclick="adding(event)"> -->
      <input type="submit" value="Submit" class="submitBtn">

    </div>
    
	</form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
