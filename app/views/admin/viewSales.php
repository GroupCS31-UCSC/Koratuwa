<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewSales.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<div class="container">

  <div class="divContainer1">
  <form action="<?php echo URLROOT; ?>/Admin/viewSales" method="POST" >
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <input type="submit" value="Search" class="submitBtn"> 
  </form>
  <input type="button" value="Refresh" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewSales' ">
    <h2>Onsite Sales</h2>
    <table>
      <thead>
        <th>Sale Id</th>
        <th>Date</th>
        <th>Time</th>
        <th>Payment</th>
        <th>Receipt</th>
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['onsiteS'] as $onsite) : ?>
        <tr>
          <td><?php echo $onsite->sale_id; ?></td>
          <td><?php echo $onsite->sale_date; ?></td>
          <td><?php echo $onsite->sale_time; ?></td>
          <td><?php echo $onsite->total_payment; ?></td>
          <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel1('<?=$onsite->sale_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td>
        </tr><br>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="divContainer2">
  <form action="<?php echo URLROOT; ?>/Admin/viewSales" method="POST" >
    <label for="from2">From :</label>
    <input type="date" id="from2" name="from2" value="<?php echo $data['from2']; ?>"><br>
    <label for="to2">  To :</label>
    <input type="date" id="to2" name="to2" value="<?php echo $data['to2']; ?>">
    <input type="submit" value="Search" class="submitBtn"> 
  </form>
  <input type="button" value="Refresh" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewSales' ">

    <h2>Online Sales</h2>
    <table id="detailsTable5">
      <thead>
        <th col-index = 1>Order Id</th>
        <th col-index = 2>Status
          <select class="table-filter5" onchange="filter_rows5()">
            <option value="all"></option>
          </select>
        </th>
        <th>Date</th>
        <th>Payment</th>
        <th>Customer Id</th>
        <th>View More</th>
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
          <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel1('<?=$online->order_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
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
  getUniqueValuesFromColumn5();
</script>




    

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
