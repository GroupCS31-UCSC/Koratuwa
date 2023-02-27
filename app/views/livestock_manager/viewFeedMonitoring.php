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
      <th>Date</th>
      <th>Cow ID</th>
      <th>Note</th>
      <th>Action</th>
    </tr>
    <tr>
      <?php foreach ($data['feedMonitoringView'] as $feed_monitoring) : ?>
      <td><?php echo $feed_monitoring->feed_date ?></td>
      <td><?php echo $feed_monitoring->cow_id ?></td>
      <td><?php echo $feed_monitoring->note ?></td>
      <td>
        <div class="feedItem fade in" id="feedItem" tableindex="-1" style="display: block;padding-right: 17px;">
          <div class="feedItem-dialog">
            <div class="feedItem-content">
              <div class="feedItem-header">
                <button type="button" class="close" onclick="closeFeedItem()" ><span aria-hidden="true">×</span></button>
                <h4 class="feedItem-title"><i class="fa fa-info-circle edit-color"></i> Item Details</h4>
              </div>
              <div class="feedItem-body">
                <table class="table table-bordered table-striped table-responsive">
                  <tr>
                    <th>Food Item</th>
                    <th>Item Quantity</th>
                    <th>Feeding Time</th>
                  </tr>
                  <tr>
                    <td><?php echo $feed_monitoring->feed_item ?></td>
                    <td><?php echo $feed_monitoring->feed_quantity ?></td>
                    <td><?php echo $feed_monitoring->feed_time ?></td>
                  </tr>                       
                </table><br>
              </div>
            </div>
          </div>
        </div>
        <div class="table-btns">
          <a href="#"><button class="viewBtn" onclick="openFeedItem()"><i class="fas fa-eye"></i></button></a>
          <a href="<?php echo URLROOT?>/Livestock_Manager/updateFeedMonitoring/<?php echo $feed_monitoring->feed_id ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>
          <a href="#"><button class="deleteBtn"><i class="fa-regular fa-trash-can"></i></button></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>

      

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>
