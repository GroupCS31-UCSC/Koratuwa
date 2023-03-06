<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewFeed.css">

<div class="feedDetails">
  <h1>Feed Details</h1>
  <p>Feed is the most important factor in the production of milk. The amount of feed required for a cow to produce 1 litre of milk is 2.5 kg. The feed should be given in two meals a day. The first meal should be given in the morning and the second meal should be given in the evening. The amount of feed given in the morning should be 60% of the total amount of feed given in a day and the amount of feed given in the evening should be 40% of the total amount of feed given in a day. The feed should be given in the form of solid and liquid. The solid feed should be given in the form of grass, leaves, super napier, sorghum, pachon, etc. and the liquid feed should be given in the form of sailege (salt + sugar), azolla (high protein), punakku, corn, rice powder, etc. The feed should be given in the ratio of 60% solid and 40% liquid. The feed should be given in the form of grass, leaves, super napier, sorghum, pachon, etc. and the liquid feed should be given in the form of sailege (salt + sugar), azolla (high protein), punakku, corn, rice powder, etc. The feed should be given in the ratio of 60% solid and 40% liquid.</p>
  <!-- <table class="items">
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
  </table> -->
</div>



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
