<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewMilking.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/subNavBar.css">


<div class="section">
<div class="tabmilk">
<?php $stall=$_GET['stall']??'STALL1';?>
  <button class="tablinksmilk <?= $stall==="STALL1"?'active':''?>" onclick="openTabmilk(event, 'STALL1')">Stall 01</button> 
  <button class="tablinksmilk <?= $stall==="STALL2"?'active':''?> " onclick="openTabmilk(event, 'STALL2')">Stall 02</button>
  <button class="tablinksmilk <?= $stall==="STALL3"?'active':''?>" onclick="openTabmilk(event, 'STALL3')">Stall 03</button>
  <button class="tablinksmilk <?= $stall==="STALL4"?'active':''?>" onclick="openTabmilk(event, 'STALL4')">Stall 04</button>
</div>

<div class="flash-msg">
  <?php flash('addMilk_flash') ?>
  <?php flash('updateMilk_flash') ?>
  <?php flash('deleteMilk_flash') ?>
</div>

<div class="search-add">
  <div class="search-area">
    <!-- <form action="<?php echo URLROOT; ?>/Livestock_Manager/searchCattle" method="POST"> -->
      <input type="text" name="search" id="search" class="search" placeholder="Search by COW ID">
      <span class="icon"><i class="fa-solid fa-search"></i></span>
    <!-- </form> -->
  </div>
  <input type="button" value="Add New Milk" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addCattleMilking?Stall=<?=$stall?>' ">
</div>

<div id="Stall1" class="tabcontentmilk active">
<div class="container" style="overflow-x: auto;">
  <table>
    <tr>
      <th>COW ID</th>
      <th>Collected Date</th>
      <th>Collected Time</th>
      <th>Quantity (L)</th>
      <th>Action</th>
    </tr>
    <tr>
      <?php foreach ($data['cattleMilkingView'] as $cattle_milking) : ?>
      <td><?php echo $cattle_milking->cow_id ?></td>
      <td><?php echo $cattle_milking->collected_date ?></td>
      <td><?php echo $cattle_milking->collected_time ?></td>
      <td><?php echo $cattle_milking->quantity ?></td>
      <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT?>/Livestock_Manager/updateCattleMilking/<?php echo $cattle_milking->milk_id ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>
          <a href="<?php echo URLROOT?>/Livestock_Manager/deleteCattleMilking/<?php echo $cattle_milking->milk_id ?>"><button class="deleteBtn"><i class="fa-regular fa-trash-can"></i></button></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
</div>
<div id="Stall2" class="tabcontentmilk">
  <h3>Stall 02</h3>
  <p>Some content in Stall 02.</p>
</div>
<div id="Stall3" class="tabcontentmilk">
  <h3>Stall 03</h3>
  <p>Some content in Stall 03.</p>
</div>
<div id="Stall4" class="tabcontentmilk">
  <h3>Stall 04</h3>
  <p>Some content in Stall 04.</p>
</div>
</div>




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>