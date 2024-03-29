<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewSales.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<div class="container">

  <div class="divContainer1">
  <form action="<?php echo URLROOT; ?>/Admin/viewSales" method="POST" >
  <div class="filter">
    <label for="from">From:</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To:</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <div class="form-input-container">
    <a href="<?php echo URLROOT?>/Admin/viewSales"><button class="filterBtn" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button></a>
    <!-- <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div> -->
    <!-- <div class="form-input-wrapper"><input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewSales' "></div> -->
  </form>
  </div>
  </div>

    <h2>Onsite Sales</h2>
    <div class="onsiteTable">
    <div class="table-wrapper">
    <table>
      <thead>
        <th>Sale Id</th>
        <th>Date</th>
        <th>Time</th>
        <th>Payment</th>
        <!-- <th>Receipt</th> -->
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['onsiteS'] as $onsite) : ?>
        <tr>
          <td><?php echo $onsite->sale_id; ?></td>
          <td><?php echo $onsite->sale_date; ?></td>
          <td><?php echo $onsite->sale_time; ?></td>
          <td><?php echo $onsite->total_payment; ?></td>
          <!-- <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel1('<?=$onsite->sale_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td> -->
        </tr>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
    </div>
  </div>

  <div class="divContainer2">
  <form action="<?php echo URLROOT; ?>/Admin/viewSales" method="POST" >
  <div class="filter">
    <label for="from2">From:</label>
    <input type="date" id="from2" name="from2" value="<?php echo $data['from2']; ?>"><br>
    <label for="to2">  To:</label>
    <input type="date" id="to2" name="to2" value="<?php echo $data['to2']; ?>">
    <div class="form-input-container">
    <a href="<?php echo URLROOT?>/Admin/viewSales"><button class="filterBtn" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button></a>
    <!-- <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div> -->
    <!-- <div class="form-input-wrapper"><input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewSales' "></div> -->
    </div>
  
  </form>
  </div>
 

    <h2>Online Sales</h2>
    <div class="table-wrapper">
    <table id="detailsTable5">
      <thead>
        <th col-index = 1>Order Id</th>
        <th col-index = 2>
          <select class="table-filter5" onchange="filter_rows5()">
            <option value="all">Status</option>
          </select>
        </th>
        <th>Date</th>
        <th>Payment</th>
        <th>Customer Id</th>
        <!-- <th>View More</th> -->
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['onlineS'] as $online) : ?>
        <tr>
          <td><?php echo $online->order_id; ?></td>
          <td><?php echo $online->status; ?></td>
          <td><?php echo $online->ordered_date; ?></td>
          <td><?php echo $online->total_payment; ?></td>       
          <td><?php echo $online->customer_id; ?></td>
          <!-- <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel1('<?=$online->order_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td> -->
        </tr>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>

</div>
<script>
  getUniqueValuesFromColumn5();
</script>




    

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>

<script language="javascript">
        var today = new Date();
        // today.setDate(today.getDate() + <?php echo 14?>);
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        console.log(today, dd, mm, yyyy);
        console.log("test");
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        $('#from').attr('max',today);
        $('#to').attr('max',today);

        
    </script>

<script language="javascript">
        var today = new Date();
        // today.setDate(today.getDate() + <?php echo 14?>);
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        console.log(today, dd, mm, yyyy);
        console.log("test");
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        $('#from2').attr('max',today);
        $('#to2').attr('max',today);

        
    </script>