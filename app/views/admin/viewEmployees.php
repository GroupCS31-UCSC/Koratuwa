<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewEmployees.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->



<?php flash('addEmp_flash') ?>
<?php flash('updateEmp_flash') ?>
<?php flash('dltEmp_flash') ?>

<table>
  <tr>
    <th>Employee Id</th>
    <th>Name</th>
    <th>Employment</th>
    <!-- <th>Salary</th> -->
    <th>NIC</th>
    <th>Contact Number</th>
    <th>Gender</th>
    <!-- <th>Age</th> -->
    <th>Email</th>
    <!--<th>Address</th>-->
    <!-- <th>Last Accessed On</th> -->
    <th>Action</th>
  </tr>

  <?php foreach ($data['empView'] as $emp) : ?>
  <tr>
    <td><?php echo $emp->employee_id; ?></td>
    <td><?php echo $emp->employee_name; ?></td>
    <td><?php echo $emp->employment; ?></td>
    <!-- <td><?php echo $emp->salary; ?></td> -->
    <td><?php echo $emp->nic; ?></td>
    <td><?php echo $emp->contact_number; ?></td>
    <td><?php echo $emp->gender; ?></td>
    <td><?php echo $emp->email; ?></td>
    <!-- <td><?php echo ''; ?></td>    age -->
    <!-- <td><?php echo ''; ?></td> -->
    <td>
      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/updateEmployees/<?php echo $emp->email ?>"><button class="updateBtn">UPDATE</button></a>
      <a href="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>"><button class="deleteBtn" onclick="delete()">DELETE</button></a>
    </div>
    </td>
  </tr><br>
  <?php endforeach; ?>

</table>


<input type="button" value="Add Employee" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addEmployees' ">
<!--
<input type="button" value="Logout" class="form-btn" onclick="location.href='<?php echo URLROOT; ?>/Users/logout' ">
<input type="button" value="View Profile" class="form-btn" onclick="location.href='<?php echo URLROOT; ?>/Users/login' ">
<input type="button" value="Change Password" class="form-btn" onclick="location.href='<?php echo URLROOT; ?>/Users/login' ">
-->
<!-- 
<script>
function delete(){
    swal({
      title: "Are You Sure ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((isOkay) => {
      if(isOkay){
        form.submit();
      }
    });
    return false;
  }

</script>
 -->
<?php require APPROOT.'/views/include/footer.php'; ?>
