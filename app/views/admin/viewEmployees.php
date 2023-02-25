<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewEmployees.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<!-- <?php flash('addEmp_flash') ?>
<?php flash('updateEmp_flash') ?>
<?php flash('dltEmp_flash') ?> -->

<div class="container" style="overflow-x: auto;">

<section class="table-upperSection">
<div class="upper">
<input type="text" id="mySearch" onkeyup="searchFunction()" placeholder="Search...">
<input type="button" value="Add New Employee" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addEmployees' ">
<div>
</section>

<section class="table1Section">
  <!-- <div class="container" style="overflow-x: auto;"> -->

    <table>
      <tr>
        <th>Image</th>
        <th>Employee Id</th>
        <th>Name</th>
        <th>Employment</th>
        <!-- <th>NIC</th> -->
        <th>Contact Number</th>
        <th>Gender</th>
        <!-- <th>Email</th> -->
        <!-- <th>Last Accessed On</th> -->
        <th>Action</th>
        <th>More Details</th>
      </tr>
      
  <?php foreach ($data['empView'] as $emp) : ?>
  <tr>
    <td><img src="<?php echo UPLOADS . $emp->image ?>" width='20' height='20'></td>
    <td><?php echo $emp->employee_id; ?></td>
    <td><?php echo $emp->employee_name; ?></td>
    <td><?php echo $emp->employment; ?></td>
    <!-- <td><?php echo $emp->nic; ?></td> -->
    <td><?php echo $emp->contact_number; ?></td>
    <td><?php echo $emp->gender; ?></td>
    <!-- <td><?php echo $emp->email; ?></td> -->

    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/updateEmployees/<?php echo $emp->email ?>"><button class="updateBtn" title="Update"><i class="fa-regular fa-pen-to-square"></i></button></a>
      <a href="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>"><button class="deleteBtn" title="Delete"><i class="fa-regular fa-trash-can"></i></button></a>
      </div>

    <!-- 
    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
    </form> -->
    
    </td>
    <td>
    <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/EmployeeProfile/<?php echo $emp->email ?>"><button class="viewBtn">View</button></a>
      </div>
    </td>


  </tr><br>
  <?php endforeach; ?>

  </table>

</section>

</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
