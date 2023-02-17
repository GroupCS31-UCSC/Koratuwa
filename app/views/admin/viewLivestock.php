<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewLivestock.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<section>
  <div class="container" style="overflow-x: auto;">

    <table>
      <tr>
        <th>Cow Id</th>
        <th>Breed</th>
        <th>Gender</th>
        <th>Weight</th>
        <!-- <th>Health</th> -->
        <th>Vaccination</th>
        <th>Action</th>
      </tr>
      
  <?php foreach ($data['livestockView'] as $cow) : ?>
  <tr>
    <td><?php echo $cow->cow_id; ?></td>
    <td><?php echo $cow->cow_breed; ?></td>
    <td><?php echo $cow->gender; ?></td>
    <td><?php echo $cow->weight; ?></td>
    <!-- <td><?php echo $cow->health; ?></td> -->
    <td><?php echo "<a>review</a>" ?></td>
 
    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/updateCattle/<?php echo $cow->cow_id ?>"><button class="updateBtn">UPDATE</button></a>
      <a href="<?php echo URLROOT?>/Admin/deleteCattle' <?php echo $cow->cow_id ?>"><button class="deleteBtn">DELETE</button></a>
      </div>

    <!-- 
    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
    </form> -->
    
    </td>
  </tr><br>
  <?php endforeach; ?>

    </table>

<input type="button" value="Add New Cow" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addCattle' ">


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
