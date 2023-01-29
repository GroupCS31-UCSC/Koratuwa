<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/viewCategory.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->


<?php flash('addCategory_flash') ?>
<?php flash('updateCategory_flash') ?>
<?php flash('deleteCategory_flash') ?>



<table>
  <tr>
    <th>Ingredients</th>
    <th>Estimated Cost</th>
    <th>Price</th>
    <th>Image</th>
    <th>Action</th>
  </tr>

  <?php foreach ($data['category'] as $cat) : ?>
  <h1><?php echo $cat->product_name; ?></h1>

  <tr>
    <td><?php echo $cat->ingredients; ?></td>
    <td><?php echo $cat->unit_cost; ?></td>
    <td><?php echo $cat->unit_price; ?></td>

    <td><img src="<?php echo UPLOADS . $cat->image ?>" width='200' height='200'></td>
    <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT?>/Product_Manager/updateCategory/<?php echo $cat->product_id ?>"><button class="updateBtn">UPDATE</button></a>
          <a href="<?php echo URLROOT?>/Product_Manager/deleteCategory/<?php echo $cat->product_id ?>"><button class="deleteBtn">DELETE</button></a>
        </div>
    </td>
  </tr><br>
  <?php endforeach; ?>

</table>



<?php require APPROOT.'/views/include/footer.php'; ?>
