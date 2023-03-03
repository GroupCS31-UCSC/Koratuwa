<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewFeed.css">

<div class="flash-msg">
  <?php flash('addfeed_flash') ?>
  <?php flash('updatefeed_flash') ?>
  <?php flash('deletefeed_flash') ?>
</div>

<div class="search-add">
  <div class="search-area">
    <!-- <form action="<?php echo URLROOT; ?>/Livestock_Manager/searchCattle" method="POST"> -->
      <input type="text" name="search" id="search" class="search" placeholder="Search by COW ID">
      <span class="icon"><i class="fa-solid fa-search"></i></span>
    <!-- </form> -->
  </div>
  <input type="button" value="Add New Feed record" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addFeedMonitoring' ">
</div>

<div class="container" style="overflow-x: auto;">
  <table>
    <tr>
      <th>Stall ID</th>
      <th>Date</th>
      <th>Solid (Kg)</th>
      <th>Liquid (L)</th>
      <th>Action</th>
    </tr>
    <tr>
      <?php foreach ($data['feedMonitoringView'] as $feed_monitoring) : ?>
      <td><?php echo $feed_monitoring->stall_id ?></td>
      <td><?php echo $feed_monitoring->date ?></td>
      <td><?php echo $feed_monitoring->solid ?></td>
      <td><?php echo $feed_monitoring->liquid ?></td>
      <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT?>/Livestock_Manager/updateFeedMonitoring/<?php echo $feed_monitoring->stall_id ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>
          <a href="<?php echo URLROOT?>/Livestock_Manager/deleteFeedMonitoring/<?php echo $feed_monitoring->stall_id ?>"><button class="deleteBtn"><i class="fa-regular fa-trash-can"></i></button></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>

      

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>
