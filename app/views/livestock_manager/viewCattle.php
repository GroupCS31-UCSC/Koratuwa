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
        <th>Breeding type</th>
        <th>Type</th>
        <th>Age</th>
        <th>Bye Date</th>
        <th>Buy Price</th>
        <!-- <th>Health Status</th> -->
        <th>Pregnant Status</th>
        <th>Milk per day</th>
        <th>Action</th>
      </tr>

      <?php foreach ($data['cattleView'] as $cattle) : ?>
      <tr>
        <td><?php echo $cattle->cow_id; ?></td>
        <td><?php echo $cattle->dob; ?></td>
        <td><?php echo $cattle->cow_breed; ?></td>
        <td><?php echo $cattle->cow_type; ?></td>
        <td>
        <?php
          $bday = strtotime($cattle->dob);
          $today = new DateTime();
          $diff = $today->diff(new DateTime($cattle->dob));
          echo $diff->y . ' years, ' . $diff->m.' months';
        ?>
        </td>
        <td><?php echo $cattle->buy_date; ?></td>
        <td><?php echo $cattle->buy_price; ?></td>
        <!-- <td>
          if(height normal range) {
            heaith is 25%
          } else if(weight is in normal range) {
            health is +25%
          }else vaccination done nm +25%
          and average milk per day normal nm +25%
         
          
        </td> -->
        <td><?php echo $cattle->pregnant_status; ?></td>
        <td><?php echo $cattle->milk_per_day; ?></td>
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
  </div>
    






<?php require APPROOT.'/views/include/footer.php'; ?>
