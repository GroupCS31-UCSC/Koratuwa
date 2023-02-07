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
        <th>Vaccination ID</th>
        <th>COW ID</th>
        <th>Date</th>
        <th>Remarks</th>
        <th>Action</th>
      </tr>

      <tr>
        <td>VAC101</td>
        <td>COW101</td>
        <td>2021-01-01</td>
        <td>Remarks</td>
        <td>
          <div class="table-btns">
            <a href="<?php echo URLROOT; ?>/Livestock_Manager/updateVaccination"><button class="updateBtn">UPDATE</button></a>
            <a href="#"><button class="deleteBtn">DELETE</button></a>
          </div>
      </tr>
      <tr>
        <td>VAC102</td>
        <td>COW101</td>
        <td>2021-01-01</td>
        <td>Remarks</td>
        <td>
          <div class="table-btns">
            <a href="<?php echo URLROOT; ?>/Livestock_Manager/updateVaccination"><button class="updateBtn">UPDATE</button></a>
            <a href="#"><button class="deleteBtn">DELETE</button></a>
          </div>
      </tr>
      <br><br><br><br><br>
      <!-- <?php foreach ($data['vaccinationView'] as $cattle) : ?>
      <tr>
        <td><?php echo $vaccination->cow_id; ?></td>
        <td><?php echo $vaccination->vaccination_id; ?></td>
        <td><?php echo $vaccination->date; ?></td>
        <td><?php echo $vaccination->remarks; ?></td>
        <td>
          <div class="table-btns">
            <a href="#"><button class="updateBtn">UPDATE</button></a>
            <a href="#"><button class="deleteBtn">DELETE</button></a>
          </div>
        </td>
      </tr><br>
      <?php endforeach; ?> -->
    </table>


<input type="button" value="Add New Vaccination" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addVaccination' ">

<?php require APPROOT.'/views/include/footer.php'; ?>
