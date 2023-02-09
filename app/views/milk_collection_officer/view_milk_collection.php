<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_milk_collection.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<?php flash('addEmp_flash') ?>
<?php flash('updateEmp_flash') ?>
<?php flash('dltEmp_flash') ?>


<section>
  <div class="container" style="overflow-x: auto;">

    <table>
      <tr>
        <!-- <th>Milk Collection ID</th> -->
        <th>Collected Date</th>
        <th>Collected Time</th>
        <th>Quantity</th>
        <th>Remarks</th>
        <!-- more -->
        <th>Action</th>
      </tr>
      
  <?php foreach ($data['milkView'] as $mc) : ?>
  <tr>
    <!-- <td><?php echo $mc->milk_collection_id; ?></td> -->
    <td><?php echo $mc->collected_date; ?></td>
    <td><?php echo $mc->collected_time; ?></td>
    <!-- <td><?php echo $emp->salary; ?></td> -->
    <td><?php echo $mc->quantity; ?></td>
    <td><?php echo $mc->remarks; ?></td>
    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Milk_Collection_Officer/updateMilkCollection/"><button class="updateBtn">UPDATE</button></a>
      <a href="<?php echo URLROOT?>/Milk_Collection_Officer/deleteMilkCollection/"><button class="deleteBtn">DELETE</button></a>
      </div>

    <!-- 
    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
    </form> -->
    
    </td>
  </tr><br>
  <?php endforeach; ?>

    </table>
    
<input type="button" value="Add New Collection" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Milk_Collection_Officer/addCollection' ">


  
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>
