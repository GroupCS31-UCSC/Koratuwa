<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">

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
            <a href="<?php echo URLROOT; ?>/Livestock_Manager/updateFeedMonitoring/">"><button class="updateBtn">UPDATE</button></a>
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

      <input type="button" value="Add New Feed record" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addFeedMonitoring' ">

<?php require APPROOT.'/views/include/footer.php'; ?>
