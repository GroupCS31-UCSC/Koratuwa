<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/addStock.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->





<div class="form-container">

	<div class="form-header">
		<center><h1>Add new Product Stock</h1></center>
	</div>
	<br>

	<form action="<?php echo URLROOT; ?>/Product_Manager/addStock" method="POST" enctype="multipart/form-data">

<?php
  //  $hostname="localhost";
  //  $db="koratuwa";
  //  $username="root";
  //  $password="";

  //  $conn=new PDO("mysql:host=$hostname;dbname=$db",$username,$password);
  //  $sql="SELECT product_id FROM product_category";

  //  try
  //  {
  //    $stmt=$conn->prepare($sql);
  //    $stmt->execute();
  //    $results=$stmt->fetchAll();
  //  }

  //  catch(Exception $ex){
  //   echo($ex ->getMessage());

  //  }

?>
		<!--category name-->
	<div class="form-input-title">Product ID</div>
    <span class="form-invalid"><?php echo $data['pId_err']; ?></span>
	<label for="Select the Product"></label>
  <select name="mydropdown">
    <?php foreach ($options as $option) : ?>
        <option value="<?= $option['product_id'] ?>"></option>
    <?php endforeach; ?>
</select>

    <!--cost-->
    <div class="form-input-title">Quanitity</div>
    <span class="form-invalid"><?php echo $data['qty_err']; ?></span>
    <input type="number" name="qty" id="qty" class="qty" value="<?php echo $data['qty']; ?>">

    <!--price-->
    <div class="form-input-title">Manufactured Date</div>
    <span class="form-invalid"><?php echo $data['mfd_err']; ?></span>
    <input type="date" name="mfd" id="mfd" class="mfd" value="<?php echo $data['mfd']; ?>">

    <!--ingredients-->
    <div class="form-input-title">Expiry Date</div>
    <span class="form-invalid"><?php echo $data['exp_err']; ?></span>
    <input type="date" name="exp" id="exp" class="exp" value="<?php echo $data['exp']; ?>">

   


		<br>
		<input type="submit" value="Submit" class="submitBtn">


	</form>
  </div>

  <div class="section">
<img class="img-bg" src="<?php echo URLROOT; ?>/public/img/milk-stock.jpg" alt="no"> 
<h2>Stock Details</h2>
</div>

  <table>
      <tr>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Manufactured Date</th>
        <th>Expiry Date</th>
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


<?php require APPROOT.'/views/include/footer.php'; ?>
