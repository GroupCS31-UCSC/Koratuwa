<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewMilkCollection.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<div class="container">

  <div class="divContainer1">
    <h2>Internal Milk Collection</h2>
    <table>
      <thead>
        <th>Collection Id</th>
        <th>Stall Id</th>
        <th>Quantity(L)</th>
        <th>Date</th>
        <th>Action</th>
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['mcView'] as $mc) : ?>
        <tr>
          <td><?php echo $mc->milk_collection_id; ?></td>
          <td><?php echo $mc->stall_id; ?></td>
          <td><?php echo $mc->quantity; ?></td>
          <td><?php echo $mc->collected_date; ?></td>
          <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel1('<?=$mc->milk_collection_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td>
        </tr><br>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="divContainer2">
    <h2>External Milk Collection</h2>
    <table>
      <thead>
        <th>Supply Id</th>
        <th>Date</th>
        <th>Quantity(L)</th>
        <th>Status</th>
        <th>Supplier Id</th>
        <th>View More</th>
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['supOrd'] as $supOrd) : ?>
        <tr>
          <td><?php echo $supOrd->supply_order_id; ?></td>
          <td><?php echo $supOrd->supply_date; ?></td>
          <td><?php echo $supOrd->quantity; ?></td>
          <td><?php echo $supOrd->status; ?></td>
          <td><?php echo $supOrd->supplier_id; ?></td>
          <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel1('<?=$supOrd->supply_order_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td>
        </tr><br>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>




    

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
