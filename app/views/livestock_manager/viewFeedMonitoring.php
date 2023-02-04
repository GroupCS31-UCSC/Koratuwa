<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>

<input type="button" value="Add New Feed record" class="addBtn" onclick="">

<table>
  <tr>
    <th>COW ID</th>
    <th>Feed Record ID</th>
    <th>Food Item</th>
    <th>Quantity</th>
    <th>Remarks</th>
    <th>Date</th>
    <th>Time</th>
    <th>Action</th>
  </tr>

  <?php foreach ($data['feedMonitoringView'] as $cattle) : ?>
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
  <?php endforeach; ?>

</table>


<?php require APPROOT.'/views/include/footer.php'; ?>