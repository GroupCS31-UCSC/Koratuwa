<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewSuppliers.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<section>
  <div class="container" style="overflow-x: auto;">

    <table>
      <tr>
        <th>User Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Nic</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      
  <?php foreach ($data['supView'] as $supView) : ?>
  <tr>
    <td><?php echo $supView->user_id; ?></td>
    <td><img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user" width="20" height="20"></td>
    <td><?php echo $supView->name; ?></td>
    <td><?php echo $supView->nic; ?></td>
    <td><?php echo $supView->contact_number; ?></td>
    <td><?php echo $supView->address; ?></td>
    <td><?php echo $supView->email; ?></td>
    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/updateSupplier/"><button class="updateBtn">UPDATE</button></a>
      <a href="<?php echo URLROOT?>/Admin/deleteSupplier/"><button class="deleteBtn">DELETE</button></a>
      </div>

    <!-- 
    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
    </form> -->
    
    </td>
  </tr><br>
  <?php endforeach; ?>

    </table>

<input type="button" value="Add New Customer" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addSupplier' ">




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
