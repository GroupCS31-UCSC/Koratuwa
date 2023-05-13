<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewSale.css">

<h2>Onsite Sales</h2><br>

<div class="search-add">
  <div class="search-container">
    <div class="search-icon"><button><i class="fa-solid fa-magnifying-glass"></i></button></div>
    <input type="text" id="searchInput" placeholder="Search By Sale IDs..." onkeyup="searchFunc();">
  </div>
  
  <input type="button" value="Add Sale" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Cashier/cashierHome' ">
  </div>
  <!--date filter -->
  <form action="<?php echo URLROOT; ?>/Cashier/viewOnsiteSale" method="POST" >
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <div class="form-input-container">
    <div class="form-input-wrapper">
    <input type="submit" value="Search" class="submitBtn"> 
    </div>
    <div class="form-input-wrapper">
    <!-- refresh button -->
      <input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Cashier/viewOnsiteSale' ">
    </div>
  </form>
</div>  

<div class="container" style="overflow-x: auto;">
    <table id="detailsTable">
    <thead>
      <th>Sale ID</th>
      <th>Date</th>
      <th>Time</th>
      <th>Payment</th>
      <th>Action</th>
    </thead>
    <tbody>
    <?php $data_index = 0; ?>
    <tr>
      <?php foreach ($data ['onsiteSaleView'] as $onsite_sale) : ?>
      <td><?php echo $onsite_sale->sale_id ?></td>
      <td><?php echo $onsite_sale->sale_date ?></td>
      <td><?php echo $onsite_sale->sale_time ?></td>
      <td><?php echo $onsite_sale->total_payment ?></td>
      <td>
      <div class="table-btns">
        <a href="#"><button class="viewBtn" onclick="openModel('<?=$onsite_sale->sale_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
      </div>
      </td>
    </tr>
    <?php $data_index++; ?> 
    <?php endforeach; ?>
    </tbody>
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
          <tbody id="productDetails">
          </tbody>           
        </table><br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>

  


<?php require APPROOT.'/views/include/footer.php'; ?>

<script>
  function openModel(id) {
    const url = "/koratuwa/Cashier/getSaleItems/"+id;
    const form = new FormData();
    form.append("id", id);
    fetch(url, {
      method: "GET"
    }).then(response => response.text())
    .then(data => {
      console.log(data);
      if(data) {
        const domp = new DOMParser();
        const doc = domp.parseFromString(data, "text/html");
        const productDetails = doc.getElementById("productDetails");
        console.log(productDetails);
        document.getElementById("productDetails").innerHTML = productDetails.innerHTML;
        

        document.getElementById("productDetails").innerHTML = productDetails.innerHTML;
      }
    });
    document.getElementById("model").classList.add("open-model");
    
  }

  function closeModel() {
    document.getElementById("model").classList.remove("open-model");
  }
</script>


<script src="<?php echo URLROOT; ?>/js/cashier.js"></script>