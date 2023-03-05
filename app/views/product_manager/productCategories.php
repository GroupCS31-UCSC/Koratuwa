<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/productCategories.css">
<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>


<!-- ______________________________________________________________________________________________________-->

<!-- <?php echo $_SESSION['user_id']; ?></h2> -->


<!-- <div class="section">
  <h2>Our Products</h2> 
 <img class="img-bg" src="<?php echo URLROOT; ?>/public/img/hel.jpeg" alt="no">  

</div> -->





<div class="btnWrapper">
  <input type="button" value="Add new Product" class="pmaddBtn" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/addCategory' "> 
</div>


<!-- <div class="gallery">
<div class="content">


</div>

</div> -->


<div class="cardWrapper">

  <?php foreach ($data['categoryView'] as $category) : ?>
    <!-- <a href="<?php echo URLROOT?>/Product_Manager/viewCategory/<?php echo $category->product_id ?>">
    <button class="products"><?php echo $category->product_name ?></button></a> -->


    <a href="<?php echo URLROOT?>/Product_Manager/viewCategory/<?php echo $category->product_id ?>" class="card" >
      <div class="img">
        <img src="<?php echo UPLOADS . $category->image ?>" width='100' height='100'>
      </div>
      <div class="cardContent">
        <p><?php echo $category->product_name ?></p>
     
        <!-- <div class="table-btns">
      <a href="<?php echo URLROOT?>/Product_Manager/updateCategory/<?php echo $category->product_id  ?>"><button class="updateBtn" title="Update"><i class="fa-regular fa-pen-to-square"></i></button></a>
      <a href="<?php echo URLROOT?>/Product_Manager/deleteCategory/<?php echo $category->product_id ?>"><button class="deleteBtn" title="Delete"><i class="fa-regular fa-trash-can"></i></button></a>
   </div> -->
      </div>
  </a>
 
    <?php endforeach; ?>
    
  </div>
  




<!-- <input type="button" value="Add new Product Category" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/addCategory' "> 
  -->


<?php require APPROOT.'/views/include/footer.php'; ?>