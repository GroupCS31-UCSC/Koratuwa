<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/viewStock.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->
<script src="<?php echo URLROOT; ?>/js/pm.js"></script>


<h2>Available Product Stock</h2>

<div class="cardWrapper">

  <?php foreach ($data['availableQty'] as $category) : ?>
    <!-- <a href="<?php echo URLROOT?>/Product_Manager/viewCategory/<?php echo $category->product_id ?>">
    <button class="products"><?php echo $category->product_name ?></button></a> -->


    <a href="<?php echo URLROOT?>/Product_Manager/viewCategory/<?php echo $category->product_id ?>" class="card" >
      
      <div class="cardContent">
        <?php if($category->product_name == 'Raw Milk'): ?>
          <p><?php echo $category->product_name ?></p>
          <p><?php echo number_format($category->available_quantity,2) ?></p>
        <?php else: ?>
          <p><?php echo $category->product_name ?></p>
          <p><?php echo number_format($category->available_quantity) ?></p>
        <?php endif; ?>
     
      </div>
  </a>
 
    <?php endforeach; ?>
    
  </div>

<h2>All Product Stocks</h2>
<div class="filter">
<!-- search -->

<div class="search-container">
<div class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
<div class="search-box"><input type="text" id="searchInput1" placeholder="Search By Stock ID..." onkeyup="searchFunc1();"></div>

</div>
<!-- filter -->

<div class="topic">Filter by Manufactured Date:</div>
  <form action="<?php echo URLROOT; ?>/Product_Manager/viewStock" method="POST" >
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <div class="form-input-container">
    <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div>
    <div class="form-input-wrapper"><input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/viewStock' "></div>
  </form>

        </div>

  <table id="detailsTable">
      <thead>
        <th col-index = 1>Stock ID</th>
        <th col-index = 2>
          <select class="table-filter" onchange="filter_rows()">
            <option value="all">Product ID</option>
          </select>
        </th>
        <th col-index = 3>Manufactured Date</th>
        <th col-index = 4>Expiry Date</th>
        <th col-index = 5>Quantity</th>
        
      </thead>
      <tbody>
        <?php foreach ($data['stockView'] as $product_stock) : ?>
        <tr>
          <td><?php echo $product_stock->stock_id; ?></td>
          <td><?php echo $product_stock->product_id; ?></td>
          <td><?php echo $product_stock->mfd_date; ?></td>
          <td><?php echo $product_stock->exp_date; ?></td>
          <td><?php echo $product_stock->quantity; ?></td>        
        </tr>
        <?php endforeach; ?>
      </tbody>
  </table>
</div>
<script>
  getUniqueValuesFromColumn();
</script>

<!-- 
    <img class="img-bg" src="<?php echo URLROOT; ?>/public/img/milk-stock.jpg" alt="no"> -->
<?php require APPROOT.'/views/include/footer.php'; ?>

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
