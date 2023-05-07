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
  
  <?php foreach ($data['category'] as $cat) : ?>    <!--category has the  table data -->
 

  <div class=" float1">
  <h1><?php echo $cat->product_name; ?></h1>
  <img src="<?php echo UPLOADS . $cat->image ?>" width='200' height='200'>
  </div>

  <div class=" float2">
  <div class="heading">Product Details</div> <br>
    <hr>
    <br>

    <div class="form-input-container">

    <div class="form-input-wrapper">Size of a Pack  </div>
    <div class="form-input-wrapper"><?php echo $cat->unit_size;  ?></div>
    </div>

    <div class="form-input-container">
    <div class="form-input-wrapper">Ingredients </div>
    <div class="form-input-wrapper"><?php echo $cat->ingredients; ?></div>
    </div>

    <div class="form-input-container">
    <div class="form-input-wrapper">Expiry Duration </div>
    <div class="form-input-wrapper"><?php 
    $months = floor($data['expireDays']/30);
    $days = $data['expireDays'] - ($months * 30);
    if($months>0){
      echo $months ." ". "months ";
    } 
    if($days>0){
      echo $days ." ". "days"; 
    } 
     ?>
     </div>
     </div>

    <div class="form-input-container">
    <div class="form-input-wrapper">Unit Price </div>
    <div class="form-input-wrapper"><?php echo "Rs."." ".  $cat->unit_price; ?></div>
    </div>
    
  
        <div class="table-btns">
      <a href="<?php echo URLROOT?>/Product_Manager/updateCategory/<?php echo $cat->product_id  ?>"><button class="updateBtn" title="Update"><i class="fa-regular fa-pen-to-square"></i></button></a>
      <a href="<?php echo URLROOT?>/Product_Manager/deleteCategory/<?php echo $cat->product_id ?>"><button class="deleteBtn" title="Delete"><i class="fa-regular fa-trash-can"></i></button></a>
   </div>    

        

      </div>
  
  <?php endforeach; ?>

  </div>

<div class="btnWrapper">
  <input type="button" value="Add new Product Batch" class="baddBtn" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/addStock/<?php echo $cat->product_id ?>' "> 
</div>
<!-- search -->
<input type="text" id="searchInput2" placeholder="Search By Stock ID..." onkeyup="searchFunc2();">

<br><br><br>
<!-- filter -->
Filter by Manufactured Date:<br><br>
<form action="<?php echo URLROOT; ?>/Product_Manager/viewCategory/<?php echo $cat->product_id  ?>" method="POST" >
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <input type="submit" value="Search" class="submitBtn"> 
</form>


<input type="button" value="Refresh" class="" onclick="location.href='<?php echo URLROOT; ?>/Product_Manager/viewCategory/<?php echo $cat->product_id  ?>' ">

<!-- _______________________________________________ Stock Details for each product_______________________________________________________-->
<table id="detailsTable2">
  <thead>
    <th>Batch ID</th>
    <th>Quanitity</th>
    <th>Manufactured Date </th>
    <th>Expiry Date</th>
    <th>Status</th>
  </thead>
  <tbody>
  <?php foreach ($data['productStock'] as $product_stock) : ?>
      <tr>
        <td><?php echo $product_stock->stock_id; ?></td>
        <td><?php echo $product_stock->quantity; ?></td>
        <td><?php echo $product_stock->mfd_date; ?></td>
        <td><?php echo $product_stock->exp_date; ?></td>    
        <td><?php
        
        $today = date('Y-m-d');
        $futureDate=$product_stock->exp_date;
        $difference = strtotime($futureDate) - strtotime($today);
        $days = abs($difference/(60 * 60)/24);
        if($days ==0)
        {
          echo "Expired";
        }

        else{
          echo "Not expired";
        //   if($days ==1)
        //   {
        //     echo $days ." day left to expire";
        //   }
        //   else{
        //   echo $days ." days left to expire";
        // }
        }
        
        ?></td>        
      </tr><br>
      <?php endforeach; ?>
    </tbody>
</table>



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/pm.js"></script>
