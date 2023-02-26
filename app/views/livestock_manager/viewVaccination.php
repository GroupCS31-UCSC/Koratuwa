<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewVaccination.css">

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

<div class="container" style="overflow-x: auto;">
  <table>
    <tr>
      <th>Date</th>
      <th>COW ID</th>
      <th>Note</th>
      <th>Action</th>
    </tr>
    <tr>
      <?php foreach ($data['vaccinationView'] as $vaccination) : ?>
      <td><?php echo $vaccination->vaccination_date ?></td>
      <td><?php echo $vaccination->cow_id ?></td>
      <td><?php echo $vaccination->note ?></td>
      <td>
        <div class="vaccinationItem fade in" id="vaccinationItem" tableindex="-1" style="display: block;padding-right: 17px;">
          <div class="vaccinationItem-dialog">
            <div class="vaccinationItem-content">
              <div class="vaccinationItem-header">
                <button type="button" class="close" onclick="closeVaccinationItem()" ><span aria-hidden="true">×</span></button>
                <h4 class="vaccinationItem-title"><i class="fa fa-info-circle edit-color"></i> Item Details</h4>
              </div>
              <div class="vaccinationItem-body">
                <table class="table table-bordered table-striped table-responsive">
                  <tr>
                    <th>Vaccine Name</th>
                    <th>Vaccine Quantity</th>
                    <th>Vaccine Date</th>
                  </tr>
                  <tr>
                    <td><?php echo $vaccination->vaccination_type ?></td>
                    <td><?php echo $vaccination->vaccination_quantity ?></td>
                    <td><?php echo $vaccination->vaccination_date ?></td>
                  </tr>
                </table><br>
              </div>
            </div>
          </div>
        </div>
        <div class="table-btns">
          <a href="#"><button class="viewBtn" onclick="openVaccinationItem()"><i class="fas fa-eye"></i></button></a>
          <a href="<?php echo URLROOT?>/Livestock_Manager/updateVaccination/<?php echo $vaccination->vaccination_id ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>
          <a href="#"><button class="deleteBtn"><i class="fa-regular fa-trash-can"></i></button></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>