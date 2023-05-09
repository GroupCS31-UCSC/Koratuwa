<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewProduction.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<?php foreach ($data['productionView'] as $pv) : ?>

      <div class="product-card">
        <div class="product-box">
          
          <div class="div0-img">
            <img src="<?php echo UPLOADS . $pv->image ?>" width='100' height='100'>
          </div>
          <div class="div1-name">
            <strong><span><?php echo $pv->product_id; ?></span></strong><br>
            <strong><span><?php echo $pv->product_name; ?></span></strong>
          </div>
          <div class="div2-details">
            <strong>Ingredients:</strong><span><?php echo $pv->ingredients; ?></span><br>
            <strong>Expiry Duration:</strong><span><?php echo $pv->expiry_duration; ?></span><br>
            <strong>Unit Size:</strong><span><?php echo $pv->unit_size; ?></span><br>
            <strong>Unit Price:</strong><span><?php echo $pv->unit_price; ?></span><br>
          </div>
          <div class="div3-availQty">
            <span>Available Quantity:<br><?php echo $pv->available_quantity; ?></span>
          </div>
          <div class="div4-more">
            <a href="<?php echo URLROOT?>/Admin/viewProductStock/<?php echo $pv->product_id ?>"><button class="viewBtn" title="View Stock"><i class="fas fa-eye"></i></button></a>
          </div>

        </div>
      </div>

<?php endforeach; ?>




<!-- <section>
  <div class="container" style="overflow-x: auto;">

    <table>
      <tr>
        <th>Product Name</th>
        <th>Image</th>
        <th>Unit Cost</th>
        <th>Unit Price</th>
        <th>Ingredients</th>
        <th>Action</th>
      </tr>
      
  <?php foreach ($data['productionView'] as $pv) : ?>
  <tr>
    <td><?php echo $pv->product_name; ?></td>
    <td><img src="<?php echo UPLOADS . $pv->image ?>" width='60' height='55'></td>
    <td><?php echo $pv->unit_cost; ?></td>
    <td><?php echo $pv->unit_price; ?></td>
    <td><?php echo $pv->ingredients; ?></td>


    <td>

      <div class="table-btns">
      <a href="<?php echo URLROOT?>/Admin/updateProduction/"><button class="updateBtn">UPDATE</button></a>
      <a href="<?php echo URLROOT?>/Admin/deleteProduction/"><button class="deleteBtn">DELETE</button></a>
      </div>
    
    </td>
  </tr><br>
  <?php endforeach; ?>

    </table>

<input type="button" value="Add New production" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addProduction' "> -->



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
