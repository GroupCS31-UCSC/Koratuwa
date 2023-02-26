<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/productCategories.css">
<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>


<!-- ______________________________________________________________________________________________________-->

<!-- <?php echo $_SESSION['user_id']; ?></h2> -->





<div class="section">
<h2>Our Products</h2>
<img class="img-bg" src="<?php echo URLROOT; ?>/public/img/price.jpg" alt="no"> 

</div>





<div class="btnWrapper">
  <input type="button" value="Add new Product Category" class="pmaddBtn" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/addCategory' "> 
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
        <img src="<?php echo UPLOADS . $category->image ?>" width='200' height='200'>
      </div>
      <div class="cardContent">
        <p><?php echo $category->product_name ?></p>
      </div>
  </a>

    
    <?php endforeach; ?>
    
  </div>
  </div>




<!-- <input type="button" value="Add new Product Category" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/addCategory' "> 
  -->


<?php require APPROOT.'/views/include/footer.php'; ?>