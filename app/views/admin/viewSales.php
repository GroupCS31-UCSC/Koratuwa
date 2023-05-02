<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewSales.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<div class="container">

  <div class="divContainer1">
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
    <h2>Online Sales</h2>
    <table>
      <thead>
        <th>Order Id</th>
        <th>Date</th>
        <th>Status</th>
        <th>Payment</th>
        <th>Customer Id</th>
        <th>View More</th>
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['onlineS'] as $online) : ?>
        <tr>
          <td><?php echo $online->order_id; ?></td>
          <td><?php echo $online->ordered_date; ?></td>
          <td><?php echo $online->status; ?></td>
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




    

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
