<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/viewCategory.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->


<?php flash('addCategory_flash') ?>
<?php flash('updateCategory_flash') ?>
<?php flash('deleteCategory_flash') ?>


<!-- 
<table>
  <tr>
    <th>Ingredients</th>
    <th>Estimated Cost</th>
    <th>Price</th>
    <th>Image</th>
    <th>Action</th>
  </tr> -->

  <div class="  container">
  
  <?php foreach ($data['category'] as $cat) : ?>
 

  <div class=" float1">
  <h1><?php echo $cat->product_name; ?></h1>
  <img src="<?php echo UPLOADS . $cat->image ?>" width='200' height='200'>
  </div>

  <div class=" float2">
  <div class="heading">Details</div> <br>
    <hr>
    <br>
    <div class="l">Size of a Pack  </div><div class="r"><?php echo $cat->size;  ?></div>
    <div class="l">Ingredients </div><div class="r"><?php echo $cat->ingredients; ?></div>
    <div class="l">Expiry Duration </div><div class="r"><?php 
    $months = floor($data['expireDays']/30);
    $days = $data['expireDays'] - ($months * 30);
    if($months>0){
      echo $months ." ". "months and ";
    } 
    echo $days ." ". "days";  ?></div>
    <div class="l">Unit Price </div><div class="r"><?php echo "Rs."." ".  $cat->unit_price; ?></div>

    
  
        <div class="table-btns">
      <a href="<?php echo URLROOT?>/Product_Manager/updateCategory/<?php echo $cat->product_id  ?>"><button class="updateBtn" title="Update"><i class="fa-regular fa-pen-to-square"></i></button></a>
      <a href="<?php echo URLROOT?>/Product_Manager/deleteCategory/<?php echo $cat->product_id ?>"><button class="deleteBtn" title="Delete"><i class="fa-regular fa-trash-can"></i></button></a>
   </div>    

        

      </div>
   <br>
  <?php endforeach; ?>

  </div>

<div class="btnWrapper">
  <input type="button" value="Add new Product Batch" class="baddBtn" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/addStock/<?php echo $cat->product_id ?>' "> 
</div>

<table>
  <tr>
    <th>Batch ID</th>
    <th>Quanitity</th>
    <th>Manufactured Date </th>
    <th>Expiry Date</th>
    <th>Status</th>
  </tr>

  <?php foreach ($data['productStock'] as $product_stock) : ?>
      <tr>
        <td><?php echo $product_stock->stock_id; ?></td>
        <td><?php echo $product_stock->quantity; ?></td>
        <td><?php echo $product_stock->mfd_date; ?></td>
        <td><?php echo $product_stock->exp_date; ?></td>        
      </tr><br>
      <?php endforeach; ?>
</table>



<?php require APPROOT.'/views/include/footer.php'; ?>
