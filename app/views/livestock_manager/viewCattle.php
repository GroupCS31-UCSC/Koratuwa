<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">


<?php flash('addCattle_flash') ?>
<?php flash('updateCattle_flash') ?>
<?php flash('deleteCattle_flash') ?>



<session>
  <div class="container" style="overflow-x: auto;">
    <table>
      <tr>
        <th>COW ID</th>
        <th>Date of birth</th>
        <th>Gender</th>
        <th>Breed</th>
        <th>Weight (Kg) </th>
        <th>Age</th>
        <th>Purpose</th>
        <th>Action</th>
      </tr>

      <?php foreach ($data['cattleView'] as $cattle) : ?>
      <tr>
        <td><?php echo $cattle->cow_id; ?></td>
        <td><?php echo $cattle->dob; ?></td>
        <td><?php echo $cattle->gender; ?></td>
        <td><?php echo $cattle->cow_breed; ?></td>
        <td><?php echo $cattle->weight; ?></td>
        <td>
        <?php
          $bday = strtotime($cattle->dob);
          $today = new DateTime();
          $diff = $today->diff(new DateTime($cattle->dob));
          echo $diff->y . ' years, ' . $diff->m.' months, '.$diff->d.' days';
        ?>
        </td>
        <td><?php echo $cattle->purpose; ?></td>
        <td>
        <?php if($cattle->employee_id == $_SESSION['user_id']): ?>
          <div class="table-btns">
            <a href="<?php echo URLROOT?>/Livestock_Manager/updateCattle/<?php echo $cattle->cow_id ?>"><button class="updateBtn">UPDATE</button></a>
            <a href="<?php echo URLROOT?>/Livestock_Manager/deleteCattle/<?php echo $cattle->cow_id ?>"><button class="deleteBtn">DELETE</button></a>
          </div>
        <?php endif; ?>
        </td>
      </tr><br>
      <?php endforeach; ?>
    </table>

    <input type="button" value="Add New Cattle" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addCattle' ">






<?php require APPROOT.'/views/include/footer.php'; ?>
