<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewMilkCollection.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->



<div class="container">

  <div class="divContainer1">
  <form action="<?php echo URLROOT; ?>/Admin/viewMilkCollection" method="POST" >
  <div class="filter">
    <label for="from">From:</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To:</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <!-- <input type="button" value="Refresh" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewMilkCollection' "> -->
    <div class="form-input-container">
    <a href="<?php echo URLROOT?>/Admin/viewMilkCollection"><button class="filterBtn" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button></a>
    <!-- <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div> -->
    <!-- <div class="form-input-wrapper"><input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewMilkCollection' "></div> -->
  </div>
</form>
  </div>

  <!-- <input type="date" id="searchInput3" placeholder="Search By Date..." onkeyup="searchFunc3();"> -->

 
    <h2>Farm Milk Collection</h2>
    <table id="detailsTable3">
      <thead>
        <th col-index = 1>Collection Id</th>
        <th col-index = 2>
          <select class="table-filter3" onchange="filter_rows3()">
            <option value="all">Stall Id</option>
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
        </tr>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="divContainer2">
  <form action="<?php echo URLROOT; ?>/Admin/viewMilkCollection" method="POST" >
  <div class="filter">
    <label for="from2">From:</label>
    <input type="date" id="from2" name="from2" value="<?php echo $data['from2']; ?>"><br>
    <label for="to2">  To:</label>
    <input type="date" id="to2" name="to2" value="<?php echo $data['to2']; ?>">
    <div class="form-input-container">
    <a href="<?php echo URLROOT?>/Admin/viewMilkCollection"><button class="filterBtn" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button></a>
    <!-- <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div> -->
    <!-- <div class="form-input-wrapper"><input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewMilkCollection' "></div> -->
    </div>
    </div>
  </form>

    <h2>Supplier Milk Collection</h2><br>
    <table id="detailsTable4">
      <thead>
        <th col-index = 1>Supply Id</th>
        <th col-index = 2>
          <select class="table-filter4" onchange="filter_rows4()">
            <option value="all">Status</option>
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
        </tr>
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

<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        console.log(today, dd, mm, yyyy);
        console.log("test");
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        $('#from').attr('min',today);

</script>


    

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
