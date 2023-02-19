<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">

<div class="flash-msg">
  <?php flash('addvaccination_flash') ?>
  <?php flash('updatevaccination_flash') ?>
  <?php flash('deletevaccination_flash') ?>
</div>

<div class="search-add">
  <div class="search-area">
    <!-- <form action="<?php echo URLROOT; ?>/Livestock_Manager/searchCattle" method="POST"> -->
      <input type="text" name="search" id="search" class="search" placeholder="Search by COW ID">
      <span class="icon"><i class="fa-solid fa-search"></i></span>
    <!-- </form> -->
  </div>
<input type="button" value="Add New Vaccination" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addVaccination' ">
</div>

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




<?php require APPROOT.'/views/include/footer.php'; ?>
