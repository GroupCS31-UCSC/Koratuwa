<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewCustomers.css">
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
      
  <?php foreach ($data['cusView'] as $cusView) : ?>
  <tr>
    <td><?php echo $cusView->user_id; ?></td>
    <td><img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user" width="20" height="20"></td>
    <td><?php echo $cusView->name; ?></td>
    <td><?php echo $cusView->nic; ?></td>
    <td><?php echo $cusView->contact_number; ?></td>
    <td><?php echo $cusView->address; ?></td>
    <td><?php echo $cusView->email; ?></td>
    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/updateCustomer/"><button class="updateBtn">UPDATE</button></a>
      <a href="<?php echo URLROOT?>/Admin/deleteCustomer/"><button class="deleteBtn">DELETE</button></a>
      </div>

    <!-- 
    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
    </form> -->
    
    </td>
  </tr><br>
  <?php endforeach; ?>

    </table>

<input type="button" value="Add New Customer" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addCustomer' ">




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
