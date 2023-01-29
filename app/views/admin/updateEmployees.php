<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/updateEmployees.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->



<div class="form-container">
  <div class="form-header">
		<center><h1>Update Employee</h1></center>
	</div>
 	<br>

  <form action="<?php echo URLROOT; ?>/Admin/updateEmployees/<?php echo $data['email']; ?>" method="post">
  <!-- <form action="Admin/updateEmployees" method="post" onsubmit="return updateForm(this);"> -->
    <!--id-->
    <!-- <div class="form-input-title">Employee Id</div>
    <span class="form-invalid"><?php echo $data['id_err']; ?></span>
    <input type="text" name="id" id="id" class="id" value="<?php echo $data['id']; ?>"> -->
    <!--name-->
    <div class="form-input-title">Employee Name</div>
    <span class="form-invalid"><?php echo $data['name_err']; ?></span>
		<input type="text" name="name" id="name" class="name" value="<?php echo $data['name']; ?>">

    <!--nic-->
    <div class="form-input-title">NIC</div>
    <span class="form-invalid"><?php echo $data['nic_err']; ?></span>
    <input type="text" name="nic" id="nic" class="nic" value="<?php echo $data['nic']; ?>">

    <!--contact no-->
    <div class="form-input-title">Contact Number</div>
    <span class="form-invalid"><?php echo $data['tp_num_err']; ?></span>
    <input type="text" name="tp_num" id="tp_num" class="tp_num" value="<?php echo $data['tp_num']; ?>">

    <!--gender-->
    <div class="form-input-title">Gender</div>
    <span class="form-invalid"><?php echo $data['gender_err']; ?></span>
    <select class="gender" name="gender" id="gender" value="<?php echo $data['gender']; ?>">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

    <!--DOB-->
    <div class="form-input-title">Date Of Birth</div>
    <span class="form-invalid"><?php echo $data['dob_err']; ?></span>
    <input type="date" name="dob" id="dob" class="dob" value="<?php echo $data['dob']; ?>">

    <!--address-->
    <div class="form-input-title">Address</div>
    <span class="form-invalid"><?php echo $data['address_err']; ?></span>
    <input type="text" name="address" id="address" class="address" value="<?php echo $data['address']; ?>">

		<!--employment-->
    <div class="form-input-title">Employment</div>
    <span class="form-invalid"><?php echo $data['employment_err']; ?></span>
    <select class="employment" name="employment" id="employment" value="<?php echo $data['employment']; ?>">
      <option value="Product Manager">Product Manager</option>
      <option value="Livestock Manager">Livestock Manager</option>
      <option value="Milk Collection Officer">Milk Collection Officer</option>
      <option value="Financial Manager">Financial Manager</option>
      <option value="Cashier">Cashier</option>
    </select>

    <input type="submit" value="Update" class="submitBtn">
  </form>
</div>

<!-- <script>
  function updateForm(form){
    swal({
      title: "Confirm Update",
      icon: "warning",
      buttons: ["Cancel","Confirm" ],
      dangerMode: true,
    })
    .then((isOkay) => {
      if(isOkay){
        swal({
          title: "Updated!",
          text: "Data updated successfully!",
          icon: "success", -->
          <!-- //timer:20000,
          button: "Ok",
        });
        form.submit();
      }
      else{
        swal("Not Updated!");
      }
    });
    return false;
  }
</script> -->

<?php require APPROOT.'/views/include/footer.php'; ?>
