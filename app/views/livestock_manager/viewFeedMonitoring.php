<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">

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

<session>
  <div class="container" style="overflow-x: auto;">
    <table>
      <tr>
        <th>Feed Record ID</th>
        <th>COW ID</th>
        <th>Food Item</th>
        <th>Quantity</th>
        <th>Remarks</th>
        <th>Date</th>
        <th>Time</th>
        <th>Action</th>
      </tr>

      <tr>
        <td>FR101</td>
        <td>COW101</td>
        <td>Food Item</td>
        <td>Quantity</td>
        <td>Remarks</td>
        <td>2021-01-01</td>
        <td>12:00:00</td>
        <td>
          <div class="table-btns">
            <a href="<?php echo URLROOT; ?>/Livestock_Manager/updateFeedMonitoring/"><button class="updateBtn">UPDATE</button></a>
            <a href="#"><button class="deleteBtn">DELETE</button></a>
          </div>
      </tr>
      <tr>
        <td>FR102</td>
        <td>COW101</td>
        <td>Food Item</td>
        <td>Quantity</td>
        <td>Remarks</td>
        <td>2021-01-01</td>
        <td>12:00:00</td>
        <td>
          <div class="table-btns">
            <a href="<?php echo URLROOT; ?>/Livestock_Manager/updateFeedMonitoring/"><button class="updateBtn">UPDATE</button></a>
            <a href="#"><button class="deleteBtn">DELETE</button></a>
          </div>
      </tr>
      <br><br><br><br><br>

      <!-- <?php foreach ($data['feedMonitoringView'] as $cattle) : ?>
      <tr>
        <td><?php echo $feed_monitoring->cow_id; ?></td>
        <td><?php echo $feed_monitoring->feed_record_id; ?></td>
        <td><?php echo $feed_monitoring->food_item; ?></td>
        <td><?php echo $feed_monitoring->quantity; ?></td>
        <td><?php echo $feed_monitoring->remarks; ?></td>
        <td><?php echo $feed_monitoring->date; ?></td>
        <td><?php echo $feed_monitoring->time; ?></td>
        <td>
          <div class="table-btns">
            <a href="#"><button class="updateBtn">UPDATE</button></a>
            <a href="#"><button class="deleteBtn">DELETE</button></a>
          </div>
        </td>
      </tr><br>
      <?php endforeach; ?> -->
      </table>

      

<?php require APPROOT.'/views/include/footer.php'; ?>
