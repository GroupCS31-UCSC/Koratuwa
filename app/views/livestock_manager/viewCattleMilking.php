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
<br>

<?php $addMilkFlash = flash('addMilk_flash'); ?>
<?php $updateMilkFlash = flash('updateMilk_flash'); ?>
<?php $deleteMilkFlash = flash('deleteMilk_flash'); ?>

<?php if ($addMilkFlash || $updateMilkFlash || $deleteMilkFlash): ?>
  <div class="flash-msg" style="display:block;" >
    <?php echo $addMilkFlash; ?>
    <?php echo $updateMilkFlash; ?>
    <?php echo $deleteMilkFlash; ?>
  </div>
<?php endif; ?>

<h2>Cattle Milking</h2>
<div class="filter">
<div class="search-add">

  <div class="search-container">

<div class="search-icon"><button><i class="fa-solid fa-magnifying-glass"></i></button></div>

<input type="text" id="searchInput3" placeholder="Search By Cow IDs..." onkeyup="searchFunc3();">
     
   </div> 
  <input type="button" value="Add New Milk" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addCattleMilking?Stall=<?=$stall?>' ">
</div>

<!-- date filter -->
  <form action="<?php echo URLROOT; ?>/Livestock_Manager/viewCattleMilking" method="POST" >
 
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <div class="form-input-container">
    <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div>
    <div class="form-input-wrapper">
    <!-- refresh button -->  
    <input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/viewCattleMilking' "></div>
    </div>
    </form>
    </div>
  
  
 


<div id="Stall1" class="tabcontentmilk active">
<div class="container" style="overflow-x: auto;">
  <table id="detailsTable3">
    <thead>
      <th>COW ID</th>
      <th>Collected Date</th>
      <th>Collected Time</th>
      <th>Quantity (L)</th>
      <th>Action</th>
    </thead>
    <tbody>
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
    </tbody>
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

<script>
  const fm = document.getElementById('msg-flash');
  fm.style.display = 'block';
  setTimeout(function() {
    fm.style.display = 'none';
  }, 1000);
</script>

<script language="javascript">
        var today = new Date();
        // today.setDate(today.getDate() + <?php echo 14?>);
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        console.log(today, dd, mm, yyyy);
        console.log("test");
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        $('#from').attr('max',today);
        $('#to').attr('max',today);

        
    </script>