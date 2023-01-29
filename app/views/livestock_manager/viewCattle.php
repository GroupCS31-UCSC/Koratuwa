<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">


<?php flash('addCattle_flash') ?>
<?php flash('updateCattle_flash') ?>
<?php flash('deleteCattle_flash') ?>

<input type="button" value="Add New Cattle" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addCattle' ">

<table>
  <tr>
    <th>COW ID</th>
    <th>Breed</th>
    <th>Gender</th>
    <th>Weight (Kg) </th>
    <!-- <th>Age</th> -->
    <th>Health</th>
    <!-- <th>Average Milking(Literes per day)</th> -->
    <th>Associated Livestock Manager</th>
    <th>Action</th>
  </tr>

  <?php foreach ($data['cattleView'] as $cattle) : ?>
  <tr>
    <td><?php echo $cattle->cow_id; ?></td>
    <td><?php echo $cattle->cow_breed; ?></td>
    <td><?php echo $cattle->gender; ?></td>
    <td><?php echo $cattle->weight; ?></td>
    <!-- <td>
    <?php
    //$bday = strtotime($cattle->dob);
    //$today = strtotime(date('y.m.d'));
    //$diff = $today-$bday;
    //echo getAge($cattle->dob);
    ?>
    </td> -->
    <td><?php echo $cattle->health; ?></td>
    <!-- <td><?php echo '35-40L'; ?></td> -->
    <td><?php echo $cattle->employee_id; ?></td>
    <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT?>/Livestock_Manager/updateCattle/<?php echo $cattle->cow_id ?>"><button class="updateBtn">UPDATE</button></a>
          <a href="<?php echo URLROOT?>/Livestock_Manager/deleteCattle/<?php echo $cattle->cow_id ?>"><button class="deleteBtn">DELETE</button></a>
        </div>
    </td>
  </tr><br>
  <?php endforeach; ?>

</table>


<?php require APPROOT.'/views/include/footer.php'; ?>
