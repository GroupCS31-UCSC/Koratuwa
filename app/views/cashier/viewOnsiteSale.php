<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewSale.css">


<div class="flash-msg">
  <?php flash('addSale_flash') ?>
  <?php flash('updateSale_flash') ?>
  <?php flash('deleteSale_flash') ?>
</div>


<div class="search-add">
  <div class="search-area">
    <form action="<?php echo URLROOT; ?>/Cashier/searchReceipt" method="POST">
      <input type="text" name="search" id="search" class="search" placeholder="Search by Receipt Id">
      <span class="icon"><i class="fa-solid fa-search"></i></span>
    </form>
  </div>
  <input type="button" value="Add Sale" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Cashier/cashierHome' ">
</div>

<div class="container" style="overflow-x: auto;">
    <table>
    <tr>
      <th>Sale ID</th>
      <th>Date</th>
      <th>Time</th>
      <th>Payment</th>
      <!-- <th>Receipt ID</th> -->
      <th>Action</th>
    </tr>
  
    <tr>
      <?php $data_index=0 ?>
      <?php foreach ($data ['onsiteSaleView'] as $onsite_sale) : ?>
      <td><?php echo $onsite_sale->sale_id ?></td>
      <td><?php echo $onsite_sale->sale_date ?></td>
      <td><?php echo $onsite_sale->sale_time ?></td>
      <td><?php echo $onsite_sale->total_payment ?></td>
      <!-- <td><?php echo $onsite_sale->receipt_id ?></td> -->
      <td>
      <div class="table-btns">
          <a href="#"><button class="viewBtn" onclick=""><i class="fas fa-eye"></i></button></a>
        </div> 
      <!-- <?php foreach ($data ['productSaleView'] as $product_sale) : ?> -->
        <!-- <div class="table-btns">
          <a href="#"><button class="viewBtn" onclick="openModel('<?=$product_sale->receipt_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
        </div> -->
        <!-- <?php endforeach; ?> -->
      </td>
    </tr>
    <?php $data_index++; ?> 
    <?php endforeach; ?>
  </table>

</div>
<!-- popup for sale -->
<div class="model fade in" id="model" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
        <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i>Products Details</h4>
      </div>
      <div class="model-body">
        <table class="tableForm">
          <tbody>
            <tr>
              <td>Product ID</td>
              <td id="Model_Product_ID"></td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td id="Model_Quantity"></td>
            </tr>
          </tbody>           
        </table><br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>

  


<?php require APPROOT.'/views/include/footer.php'; ?>

<script>
  function openModel(status) {
    
  }

  function closeModel() {
    document.getElementById("model").classList.remove("open-model");
  }
</script>