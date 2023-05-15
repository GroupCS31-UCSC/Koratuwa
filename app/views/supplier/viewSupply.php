<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/viewSupply.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->
<!-- navigation bar ------>
  <!-- <img class="img-bg" src="<?php echo URLROOT; ?>/img/sup2.jpg" alt="no"> -->
  <?php $placeSupplyFlash = flash('placeSupply_flash'); ?>
  <?php $dltSupOrderFlash = flash('dltSupOrder_flash'); ?>
  <?php $updateSupplyFlash = flash('updateSupply_flash'); ?>

  <?php if($placeSupplyFlash || $dltSupOrderFlash || $updateSupplyFlash): ?>
    <div class="flash-msg" id="msg-flash" style="display:block;" >
      <?php echo $placeSupplyFlash; ?>
      <?php echo $dltSupOrderFlash; ?>
      <?php echo $updateSupplyFlash; ?>
    </div>
  <?php endif; ?>
  <!-- <div class="tabel_content"> -->

    

  
  <div class="container">

    <div class="feature1">
      <!-- <div class="search"> -->
          <!-- <input type="text" class="searchTerm" placeholder="What are you looking for?">
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
          </button>        -->
          <!-- <input type="date" id="myDateInput" >
          <button type="submit" class="searchButton" onkeyup="filterTable()"> -->

      <!-- </div> -->
      
      <form action="<?php echo URLROOT; ?>/Supplier/viewSupply" method="POST" >
      <div class="filter">
      <label for="from">From:</label>
        <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
        <label for="to">  To:</label>
        <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
        <!-- <input type="submit" value="Search" class="submitBtn">  -->
        <a href=''><button class="filterBtn" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button></a>
        </div>
      </form>
      <!-- <a href="<?php echo URLROOT?>/Supplier/generateSupplyReport/"><button>Genarate PDF</button></a> -->
      <div class="table-wrapper">
      <table id="detailsTable6">
        <thead>
            <th col-index = 1>Supply Order ID</th>
            <th col-index = 2>Supply Date</th>
            <th col-index = 3>Supply Quantity (L) </th>
            <th col-index = 4>Price Received Per Unit (Rs) </th>
            <!-- <th>Supplying Address</th> -->
            <th col-index = 5>
              <select class="table-filter6" onchange="filter_rows6()">
                <option value="all">Status</option>
              </select>
            </th>

            <th>More</th>
        </thead>
        <tbody>
          <?php $data_index=0 ?>
          <?php foreach ($data['supOrderView'] as $supOrd) : ?>
          <tr>
            <td><?php echo $supOrd->supply_order_id; ?></td>
            <td><?php echo $supOrd->supply_date; ?></td>
            <td><?php echo $supOrd->quantity; ?></td>
            <td><?php echo $supOrd->unit_price; ?></td>
            <td><?php echo $supOrd->status; ?></td>
            <td>
              <?php if($supOrd->status == 'Ongoing') : ?>
                <div class="table-btns">
                  <a href="<?php echo URLROOT?>/Supplier/updateSupOrder/<?php echo $supOrd->supply_order_id ?>"><button class="updBtn" id="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>
                  <a href="<?php echo URLROOT?>/Supplier/deleteSupOrder/<?php echo $supOrd->supply_order_id ?>"><button class="dltBtn" id="deleteBtn"><i class="fa-regular fa-trash-can"></i></button></a>

                </div>

              <?php elseif($supOrd->status == 'Collected') : ?>
                <div class="table-btns">
                  <a href="<?php echo URLROOT?>/Supplier/getOrderReceipt/<?php echo $supOrd->supply_order_id ?>"><button class="viewBtn" title="Invoice"><i class="fa-solid fa-file-lines"></i></button></a>
                </div>
              <?php else : ?>
                <div class="table-btns">
                  <button class="viewBtn" onclick="openModel()" title="Note"><i class="fa-solid fa-file-lines"></i></button>
                </div>     
              <?php endif; ?>
            </td>
          </tr>
          <?php $data_index++; ?> 
          <?php endforeach; ?>
        </tbody>
      </table>
      </div>      
    </div>
  </div>
              


<!----------------- popup view ---------------->
<div class="model fade in" id="model" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
        <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i> Order Details</h4>
      </div>
      <div class="model-body">
        <p>jskdhskzdsjhfshefdshekdhkashkehfkjehfkjsdnlakfhlsdhflkadnf</p>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>


<script>
// ------------------------------------------------------//
  //   var currentTime = new Date();
  //   var hours = currentTime.getHours();
  //   var deleteBtn = document.querySelectorAll('.deleteBtn');
  //   for (var i = 0; i < deleteBtn.length; i++) {
  //   if (hours >= 8) {
  //       deleteBtn[i].disabled = true;
  //       deleteBtn[i].addEventListener('click', function(event) {
  //           event.preventDefault();
  //       });
  //   }
  // }
  // var updateBtn = document.querySelectorAll('.updateBtn');
  // for (var i = 0; i < updateBtn.length; i++) {
  //   if (hours >= 8) {
  //       updateBtn[i].disabled = true;
  //       updateBtn[i].addEventListener('click', function(event) {
  //           event.preventDefault();
  //       });
  //   }
  // }
  //--------------counter----------------//
  let counterup = document.querySelectorAll(".counter_up");
    let convert = Array.from(counterup);
    convert.map((counteritem) => {
      let counter = 0;
      function count() {
        counter++;
        counteritem.innerHTML = counter;
        if (counter == counteritem.dataset.number) {
          clearInterval(timing);
        }
      }
      let timing = setInterval(() => {
        count();
      }, counteritem.dataset.speed/counter);
  }); 

//-------------- view Note------------------//
function openModel() {
    document.getElementById("model").classList.add("open-model");
  }

  function closeModel() {
   document.getElementById("model").classList.remove("open-model");
  }
   
</script>

<script>
      getUniqueValuesFromColumn6();
    </script>

<!-- for table - status column FILTER -->
<!-- <div class="foot">
<?php require APPROOT.'/views/include/footer.php'; ?>
</div> -->
<script src="<?php echo URLROOT; ?>/js/supplier.js"></script>

<script>
  const fm = document.getElementById('msg-flash');
  fm.style.display = 'block';
  setTimeout(function() {
    fm.style.display = 'none';
  }, 1000);
</script>



        