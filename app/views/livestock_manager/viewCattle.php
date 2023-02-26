<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">

<div class="flash-msg">
  <?php flash('addCattle_flash') ?>
  <?php flash('updateCattle_flash') ?>
  <?php flash('deleteCattle_flash') ?>
</div>

<div class="search-add">
  <div class="search-area">
    <!-- <form action="<?php echo URLROOT; ?>/Livestock_Manager/searchCattle" method="POST"> -->
      <input type="text" name="search" id="search" class="search" placeholder="Search by COW ID">
      <span class="icon"><i class="fa-solid fa-search"></i></span>
    <!-- </form> -->
  </div>
  <input type="button" value="Add New Cattle" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addCattle' ">
</div>


  <div class="container" style="overflow-x: auto;">
    <table>
      <tr>
        <th>COW ID</th>
        <!-- <th>Image</th> -->
        <th>Date of birth</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Breed</th>
        <th>Weight</th>
        <th>Height</th>
        <th>Health</th>
        <th>Registration Date</th>
        <th>Action</th>
      </tr>

      <?php foreach ($data['cattleView'] as $cattle) : ?>
      <tr>
        <td><?php echo $cattle->cow_id; ?></td>
        <td><?php echo $cattle->dob; ?></td>
        <td><?php echo $cattle->age; ?></td>
        <td><?php echo $cattle->gender; ?></td>
        <td><?php echo $cattle->cow_breed; ?></td>
        <td><?php echo $cattle->weight; ?></td>
        <td><?php echo $cattle->height; ?></td>
        <td><?php echo $cattle->health; ?></td>
        <td><?php echo $cattle->reg_date; ?></td>
        <!-- <td>
          if(height normal range) {
            heaith is 25%
          } else if(weight is in normal range) {
            health is +25%
          }else vaccination done nm +25%
          and average milk per day normal nm +25%
         
          
        </td> -->
        <td>
        <?php if($cattle->stall_no == $_SESSION['user_id']): ?>
          <div class="table-btns">
            <a href="<?php echo URLROOT?>/Livestock_Manager/updateCattle/<?php echo $cattle->cow_id ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>

            <a href="<?php echo URLROOT?>/Livestock_Manager/deleteCattle/<?php echo $cattle->cow_id ?>"><button class="deleteBtn"><i class="fa-regular fa-trash-can"></i></button></a>
          </div>
        <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
    






<?php require APPROOT.'/views/include/footer.php'; ?>
