<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_milk_collection.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->



<section>
  <div class="container" style="overflow-x: auto;">

    <table>
      <tr>
        <th>Supply Order Id</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Supply Date</th>
        <th>Supplier</th>
        <th>Remarks</th>
        <th>Unit Price</th>
        <th>Action</th>
      </tr>
      
  <?php foreach ($data['farmMilkView'] as $farmMilkView) : ?>
  <tr>
    <td><?php echo $farmMilkView->supply_order_id; ?></td>
    <td><?php echo $farmMilkView->quantity; ?></td>
    <td><?php echo $farmMilkView->status; ?></td>
    <td><?php echo $farmMilkView->supply_date; ?></td>
    <td><?php echo $farmMilkView->supplier_id; ?>        <img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user" width="30" height="30"></td>
    <td><?php echo $farmMilkView->remarks; ?></td>
    <td><?php echo $farmMilkView->unit_price; ?></td>

    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Milk_Collection_Officer/updateSupOrder/"><button class="updateBtn">UPDATE</button></a>
      <!-- <a href="<?php echo URLROOT?>/Milk_Collection_Officer/deleteSupOrder/"><button class="deleteBtn">DELETE</button></a> -->
      </div>

    <!-- 
    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
    </form> -->
    
    </td>
  </tr><br>
  <?php endforeach; ?>

    </table>

<!-- <input type="button" value="Add New Supplier" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Milk_Collection_Officer/addSupplier' "> -->


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>
