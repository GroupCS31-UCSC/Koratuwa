<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewProduction.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<section>
  <div class="container" style="overflow-x: auto;">

    <table>
      <tr>
        <th>Product Name</th>
        <th>Image</th>
        <th>Unit Cost</th>
        <th>Unit Price</th>
        <th>Ingredients</th>
        <th>Action</th>
      </tr>
      
  <?php foreach ($data['productionView'] as $pv) : ?>
  <tr>
    <td><?php echo $pv->product_name; ?></td>
    <td><img src="<?php echo UPLOADS . $pv->image ?>" width='60' height='55'></td>
    <td><?php echo $pv->unit_cost; ?></td>
    <td><?php echo $pv->unit_price; ?></td>
    <td><?php echo $pv->ingredients; ?></td>


    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/updateProduction/"><button class="updateBtn">UPDATE</button></a>
      <a href="<?php echo URLROOT?>/Admin/deleteProduction/"><button class="deleteBtn">DELETE</button></a>
      </div>

    <!-- 
    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
    </form> -->
    
    </td>
  </tr><br>
  <?php endforeach; ?>

    </table>

<input type="button" value="Add New production" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addProduction' ">




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
