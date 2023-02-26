<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/viewStock.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->
<div class="btnWrapper">
  <input type="button" value="Add new Product Stock" class="pmaddBtn" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/addStock' "> 
</div>


  <div class="section">
 
<h2>Stock Details</h2>
</div>

  <table>
      <tr>
        <th>Product ID</th>
        <th>Manufactured Date</th>
        <th>Expiry Date</th>
        <th>Quantity</th>
        <th>Timestamp</th>
      </tr>

      <?php foreach ($data['stockView'] as $product_stock) : ?>
      <tr>
        <td><?php echo $product_stock->product_id; ?></td>
        <td><?php echo $product_stock->mfd_date; ?></td>
        <td><?php echo $product_stock->exp_date; ?></td>
        <td><?php echo $product_stock->quantity; ?></td>
        <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT?>/product_manager/updateStock/"><button class="updateBtn">UPDATE</button></a>
          <a href="<?php echo URLROOT?>/product_manager/deleteStock/"><button class="deleteBtn">DELETE</button></a>
        </div>
    </td>
        
      </tr><br>
      <?php endforeach; ?>
    </table>

    <img class="img-bg" src="<?php echo URLROOT; ?>/public/img/milk-stock.jpg" alt="no">
<?php require APPROOT.'/views/include/footer.php'; ?>
