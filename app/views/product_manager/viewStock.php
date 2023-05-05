<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/viewStock.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->



<h2>Available Product Stock</h2>

<div class="cardWrapper">

  <?php foreach ($data['availableQty'] as $category) : ?>
    <!-- <a href="<?php echo URLROOT?>/Product_Manager/viewCategory/<?php echo $category->product_id ?>">
    <button class="products"><?php echo $category->product_name ?></button></a> -->


    <a href="<?php echo URLROOT?>/Product_Manager/viewCategory/<?php echo $category->product_id ?>" class="card" >
      
      <div class="cardContent">
        <p><?php echo $category->product_name ?></p>
        <p><?php echo $category->available_quantity ?></p>
     
      </div>
  </a>
 
    <?php endforeach; ?>
    
  </div>

<h2>All Product Stocks</h2>



  <table>
      <tr>
      <th>Stock ID</th>
        <th>Product ID</th>
        <th>Manufactured Date</th>
        <th>Expiry Date</th>
        <th>Quantity</th>
        
      </tr>

      <?php foreach ($data['stockView'] as $product_stock) : ?>
      <tr>
        <td><?php echo $product_stock->stock_id; ?></td>
        <td><?php echo $product_stock->product_id; ?></td>
        <td><?php echo $product_stock->mfd_date; ?></td>
        <td><?php echo $product_stock->exp_date; ?></td>
        <td><?php echo $product_stock->quantity; ?></td>
        
    

    </td>
        
      </tr>
      <?php endforeach; ?>
    </table>
<!-- 
    <img class="img-bg" src="<?php echo URLROOT; ?>/public/img/milk-stock.jpg" alt="no"> -->
<?php require APPROOT.'/views/include/footer.php'; ?>
