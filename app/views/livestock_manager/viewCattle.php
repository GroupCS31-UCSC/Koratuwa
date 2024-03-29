<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/subNavBar.css">

<script src="<?php echo URLROOT; ?>/js/lm.js"></script>

<div class="section">
<div class="tab">
<?php $stall=$_GET['stall']??'STALL1';?>
  <button class="tablinks <?= $stall==="STALL1"?'active':''?>" onclick="openTab(event, 'STALL1')">Stall 01</button> 
  <button class="tablinks <?= $stall==="STALL2"?'active':''?> " onclick="openTab(event, 'STALL2')">Stall 02</button>
  <button class="tablinks <?= $stall==="STALL3"?'active':''?>" onclick="openTab(event, 'STALL3')">Stall 03</button>
  <button class="tablinks <?= $stall==="STALL4"?'active':''?>" onclick="openTab(event, 'STALL4')">Stall 04</button>
</div>


<?php $addCattleFlash = flash('addCattle_flash'); ?>
<?php $updateCattleFlash = flash('updateCattle_flash'); ?>
<?php $deleteCattleFlash = flash('deleteCattle_flash'); ?>

<?php if ($addCattleFlash || $updateCattleFlash || $deleteCattleFlash): ?>
  <div class="flash-msg" style="display:block;" >
    <?php echo $addCattleFlash; ?>
    <?php echo $updateCattleFlash; ?>
    <?php echo $deleteCattleFlash; ?>
  </div>


<?php endif; ?>

<br>
<h2>Cattle</h2>

<div class="search-container">
  <div class="search-icon"><button><i class="fa-solid fa-magnifying-glass"></i></button></div>
  <input type="text" id="searchInput" placeholder="Search By Cow IDs..." onkeyup="searchFunc();">
</div> 

<input type="button" value="Add New Cattle" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addCattle?Stall=<?=$stall?>' ">
<br><br><br><br><br>

<div id="Stall1" class="tabcontent active">
  <div class="container" style="overflow-x: auto;">
    <table id="detailsTable">
      <thead>
        <th col-index = 1>COW ID</th>
        <th col-index = 2>
          <select class="table-filter" onchange="filter_rows()">
            <option value="all">Gender</option>
          </select>
        </th>
        <th col-index = 3>
          <select class="table-filter" onchange="filter_rows()">
            <option value="all">Breed</option>
          </select>
        </th>
        <th col-index = 4>Action</th>
      </thead>
      <tbody>
      <?php $data_index=0 ?>
      <?php foreach ($data['cattleView'] as $cattle) : ?>
        <tr>
          <td><?php echo $cattle->cow_id; ?></td>
          <td><?php echo $cattle->gender; ?></td>
          <td><?php echo $cattle->cow_breed; ?></td>
          <td>          
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel('<?=$cattle->cow_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
              <a href="<?php echo URLROOT?>/Livestock_Manager/updateCattle/<?php echo $cattle->cow_id ?>/<?php echo $cattle->gender ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>
              <a href="#"><button class="deleteBtn" onclick="openDelete('<?=$cattle->cow_id?>')" id="<?php echo($data_index) ?>"><i class="fa-regular fa-trash-can"></i></button></a>
            </div>
          </td>
        </tr>
        <?php $data_index++; ?> 
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<div id="Stall2" class="tabcontent">
  <p>stall2</p>
</div>
<div id="Stall3" class="tabcontent">
  <p>stall2</p>
</div>
<div id="Stall4" class="tabcontent">
  <div class="container" style="overflow-x: auto;">
    <p>stall3</p>
  </div>
</div>
</div>

<!-- table filteration function -->
<script>
  getUniqueValuesFromColumn();
</script>

<!-- popup view -->
<div class="model fade in" id="model" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
        <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i> Cattle Details</h4>
      </div>
      <div class="model-body">
        <table class="tableForm">
          <tbody>
            <tr>
              <td>Stall No</td>
              <td id="Model_Stall_No"></td>
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td id="Model_DOB"></td>
            </tr>
            <tr>
              <td>Age</td>
              <td id="Model_Age"></td>
            </tr>
            <tr>
              <td>Milking Status</td>
              <td id="Model_milkin_Status"></td>
            </tr>
          </tbody>           
        </table><br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>

<!-- popup delete cattle -->
<div class="dmodel fade in" id="deleteModel" tabindex="-1">
  <div class="dmodel-dialog">
    <div class="dmodel-content">
      <div class="dmodel-header">
        <button type="button" class="close" onclick="closeDelete()" ><span aria-hidden="true">×</span></button>
        <h2 class="dModel-title">Are you sure you want to delete?</h2>
      </div>
      <div class="dmodel-body">
        <form action="<?php echo URLROOT?>/Livestock_Manager/deleteCattle">
          <!-- Reason selection -->
          <div class="form-group">
            <input type="text" name="cow_id" id="del_cowId" style="display:none">
            <label for="reason">Reason</label><br><br>
            <select name="reason" id="reason" class="form-control">
              <option value="DIED">Dead</option>
              <option value="SOLD">Sold</option>
            </select><br><br>
            <!-- If select sold give sold price -->
            <div id="sold-price" style="display:none;">
              <label for="price">Price:</label><br><br>
              <input type="text" name="price" id="price" class="price" value="">
            </div>
          </div>
          <input class="dOk" type="submit" value="OK">
        </form>
      <br>
      </div>
    </div>
  </div>
  <div class="dmodal-footer"></div>
</div>

<!-- <?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script> -->

<script>
  var deleteOptions = document.getElementById("reason");
  var soldPrice = document.getElementById("sold-price");

  deleteOptions.addEventListener("change", function() {
    if (deleteOptions.value == "SOLD") {
      soldPrice.style.display = "block";
    } else {
      soldPrice.style.display = "none";
    }
  });

  function openDelete(id) {
    const cowId = document.getElementById("del_cowId");
    cowId.value = id;

    document.getElementById("deleteModel").classList.add("open-deleteModel");
  }

  function closeDelete() {
    document.getElementById("deleteModel").classList.remove("open-deleteModel");
  }

  const fm = document.getElementById('msg-flash');
  fm.style.display = 'block';
  setTimeout(function() {
    fm.style.display = 'none';
  }, 1000);

</script>

<script language="javascript">
  var today = new Date();
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



