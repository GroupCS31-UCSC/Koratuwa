<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewMilkCollection.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<div class="container">

  <div class="divContainer1">
  <form action="<?php echo URLROOT; ?>/Admin/viewMilkCollection" method="POST" >
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <input type="submit" value="Search" class="submitBtn"> 
</form>

  <!-- <input type="date" id="searchInput3" placeholder="Search By Date..." onkeyup="searchFunc3();"> -->

  <input type="button" value="Refresh" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewMilkCollection' ">
    <h2>Internal Milk Collection</h2>
    <table id="detailsTable3">
      <thead>
        <th col-index = 1>Collection Id</th>
        <th col-index = 2>Stall Id
          <select class="table-filter3" onchange="filter_rows3()">
            <option value="all"></option>
          </select>
        </th>
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
    <table id="detailsTable4">
      <thead>
        <th col-index = 1>Supply Id</th>
        <th col-index = 2>Status
          <select class="table-filter4" onchange="filter_rows4()">
            <option value="all"></option>
          </select>
        </th>
        <th>Date</th>
        <th>Quantity(L)</th>
        <th>Supplier Id</th>
        <th>View More</th>
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['supOrd'] as $supOrd) : ?>
        <tr>
          <td><?php echo $supOrd->supply_order_id; ?></td>
          <td><?php echo $supOrd->status; ?></td>
          <td><?php echo $supOrd->supply_date; ?></td>
          <td><?php echo $supOrd->quantity; ?></td>
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

<script>

      getUniqueValuesFromColumn3();
      getUniqueValuesFromColumn4();
    </script>


    

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
