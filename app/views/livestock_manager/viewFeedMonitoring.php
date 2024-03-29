<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewFeed.css">

<script src="<?php echo URLROOT; ?>/js/lm.js"></script>

<?php $addFeedFlash = flash('addFeed_flash'); ?>
<?php $updateFeedFlash = flash('updateFeed_flash'); ?>
<?php $deleteFeedFlash = flash('deleteFeed_flash'); ?>

<?php if ($addFeedFlash || $updateFeedFlash || $deleteFeedFlash): ?>
  <div class="flash-msg" style="display:block;" >
    <?php echo $addFeedFlash; ?>
    <?php echo $updateFeedFlash; ?>
    <?php echo $deleteFeedFlash; ?>
  </div>

<?php endif; ?>

<div class="section">
<div class="feedDetails">
  <br><h2>Cattle Feeding</h2>
  <table class="items">
    <tr>
      <th>Solid foods (60%)</th>
      <th>Liquid foods (40%)</th>
    </tr>
    <tr>
      <td>Grass, Leaves </td>
      <td>sailege (salt + sugar)</td>
    </tr>
    <tr>
      <td>[CO3/CO4/CO5 super napier, sorghum, pachon]</td>
      <td>Azolla(high protein)</td>
    </tr>
    <tr>
      <td></td>
      <td>punakku, corn, Rice powder</td>
    </tr>
  </table>
</div>

<input type="button" value="Add New Feed Record" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addFeedMonitoring' ">

<!-- date filter -->
<form action="<?php echo URLROOT; ?>/Livestock_Manager/viewFeedMonitoring" method="POST" >
  <div class="filter">
    <div class="date-input">
      <label for="from">From:</label>
      <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>">
    </div>
    <div class="date-input">
      <label for="to">To:</label>
      <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    </div>
  </div>
  <div class="form-input-container">
    <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div>
    <div class="form-input-wrapper"><input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/viewFeedMonitoring' "></div>
  </div>
</form>

<div class="container" style="overflow-x: auto;">
  <table id="detailsTable2">
    <thead>
      <th col-index = 1>
        <select class="table-filter2" onchange="filter_rows2()">
          <option value="all">Stall Id</option>
        </select>
      </th>
      <th>Date</th>
      <th>Solid (Kg)</th>
      <th>Liquid (L)</th>
      <th>Action</th>
    </thead>
    <tbody>
    <tr>
      <?php foreach ($data['feedMonitoringView'] as $feed_monitoring) : ?>
      <td><?php echo $feed_monitoring->stall_id ?></td>
      <td><?php echo $feed_monitoring->date ?></td>
      <td><?php echo $feed_monitoring->solid ?></td>
      <td><?php echo $feed_monitoring->liquid ?></td>
      <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT?>/Livestock_Manager/updateFeedMonitoring/<?php echo $feed_monitoring->feed_id ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>
          <a href="<?php echo URLROOT?>/Livestock_Manager/deleteFeedMonitoring/<?php echo $feed_monitoring->feed_id ?>"><button class="deleteBtn"><i class="fa-regular fa-trash-can"></i></button></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  </tbody>
</div>
</div>
<script>
  getUniqueValuesFromColumn2();

  const fm = document.getElementById('msg-flash');
  fm.style.display = 'block';
  setTimeout(function() {
    fm.style.display = 'none';
  }, 1000);
  
</script>

      

<?php require APPROOT.'/views/include/footer.php'; ?>
<!-- <script src="<?php echo URLROOT; ?>/js/lm.js"></script> -->

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