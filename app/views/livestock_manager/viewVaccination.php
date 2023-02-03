<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>


<input type="button" value="Add New Vaccination" class="addBtn" onclick="">

<table>
  <tr>
    <th>COW ID</th>
    <th>Vaccination ID</th>
    <th>Date</th>
    <th>Remarks</th>
    <th>Action</th>
  </tr>

  <?php foreach ($data['vaccinationView'] as $cattle) : ?>
  <tr>
    <td><?php echo $vaccination->cow_id; ?></td>
    <td><?php echo $vaccination->vaccination_id; ?></td>
    <td><?php echo $vaccination->date; ?></td>
    <td><?php echo $vaccination->remarks; ?></td>
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
