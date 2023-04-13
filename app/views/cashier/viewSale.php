<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewSale.css">


<!-- <div class="flash-msg">
  <?php flash('addSale_flash') ?>
  <?php flash('updateSale_flash') ?>
  <?php flash('deleteSale_flash') ?>
</div>


<div class="search-add">
  <div class="search-area"> -->
    <!-- <form action="<?php echo URLROOT; ?>/Livestock_Manager/searchCattle" method="POST"> -->
      <!-- <input type="text" name="search" id="search" class="search" placeholder="Search by COW ID">
      <span class="icon"><i class="fa-solid fa-search"></i></span> -->
    <!-- </form> -->
  <!-- </div>
  <input type="button" value="Add Sale" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Cashier/addSale' ">
</div> -->

<div class="container" style="overflow-x: auto;">
    <table>
    <tr>
      <th>Sale ID</th>
      <th>Name</th>
      <th>Contact no</th>
      <th>Action</th>
    </tr>
  
    <tr>
      <td>S1</td>
      <td>Gunathilaka</td>
      <td>0715667876</td>
      <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT; ?>/Cashier/updateSale"><button class="updateBtn">UPDATE</button></a>
        </div>
      </td>
    </tr>
    <tr>
      <td>S2</td>
      <td>Yayawardana</td>
      <td>0714345654</td>
      <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT; ?>/Cashier/updateSale"><button class="updateBtn">UPDATE</button></a>
        </div>
      </td>
    </tr>
  </table>

  
</div>

  


<?php require APPROOT.'/views/include/footer.php'; ?>
