<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/subNavBar.css">

<div class="subnavbar">
      <div class="submenu">
        <a class="active" href="#">Stall 01</a>
        <a href="#">Stall 02</a>
        <a href="#">Stall 03</a>
        <a href="#">Stall 04</a>
      </div>
    </div>

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
        <!-- <th>Age</th> -->
        <th>Gender</th>
        <th>Breed</th>
        <th>Action</th>
      </tr>

      <?php foreach ($data['cattleView'] as $cattle) : ?>
      <tr>
        <td><?php echo $cattle->cow_id; ?></td>
        <!-- <td><?php echo $cattle->dob; ?></td> -->
        <!-- <td><?php echo $cattle->age; ?></td> -->
        <td><?php echo $cattle->gender; ?></td>
        <td><?php echo $cattle->cow_breed; ?></td>
        <!-- Popup -->
        <td>
          <div class="model fade in" id="model" style="display: block;padding-right: 17px;">
            <div class="model-dialog">
              <div class="model-content">
                <div class="model-header">
                  <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
                  <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i> Item Details</h4>
                </div>
                <div class="model-body">
                  <table class="table table-bordered table-striped table-responsive">
                    <tr>
                      <th>Age</th>
                      <th>gender</th>
                      <th>Milking Status</th>
                    </tr>
                    <tr>
                      <td><?php echo $cattle->age ?></td>
                      <td><?php echo $cattle->gender ?></td>
                      <td><?php echo $cattle->milking_status ?></td>
                    </tr>                   
                  </table><br>
                </div>
              </div>
            </div>
          </div>
          <div class="table-btns">
            <a href="#"><button class="viewBtn" onclick="openModel()"><i class="fas fa-eye"></i></button></a>
            <a href="<?php echo URLROOT?>/Livestock_Manager/updateCattle/<?php echo $cattle->cow_id ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>

            <a href="<?php echo URLROOT?>/Livestock_Manager/deleteCattle/<?php echo $cattle->cow_id ?>"><button class="deleteBtn"><i class="fa-regular fa-trash-can"></i></button></a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
    






<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>
