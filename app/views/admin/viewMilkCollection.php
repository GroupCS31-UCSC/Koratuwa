<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewMilkCollection.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<section>
  <div class="container" style="overflow-x: auto;">

    <table>
      <tr>
        <th>Quantity(L)</th>
        <th>Date</th>
        <th>Time</th>
        <th>Remarks</th>
        <th>Action</th>
      </tr>
      
  <?php foreach ($data['mcView'] as $mc) : ?>
  <tr>
    <td><?php echo $mc->quantity; ?></td>
    <td><?php echo $mc->collected_date; ?></td>
    <td><?php echo $mc->collected_time; ?></td>
    <td><?php echo $mc->remarks; ?></td>

    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/updateCollection/"><button class="updateBtn">UPDATE</button></a>
      <a href="<?php echo URLROOT?>/Admin/deleteCollection/"><button class="deleteBtn">DELETE</button></a>
      </div>

    <!-- 
    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
    </form> -->
    
    </td>
  </tr><br>
  <?php endforeach; ?>

    </table>

<input type="button" value="Add New Collection" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addCollection' ">



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
