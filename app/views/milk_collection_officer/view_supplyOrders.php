<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>

<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_supplyOrders.css">
<!-- ______________________________________________________________________________________________________-->

<div class="container" style="overflow-x: auto;">
<!-- <section></section> -->
  <div class="title1">
  
    <h1>Ongoing Orders</h1>
    
  </div>

  <div class="ongoingOrders">
  
  <table>
      <tr>
        <th>Supply Order Id</th>
        <th>Supplier</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Supply Date</th>
        <th>Status</th>
      </tr>
      
    <?php foreach ($data['ordView'] as $ordView) : ?>
      <?php if($ordView->status == "Not Collected"): ?>

      <tr>
        <td><?php echo $ordView->supply_order_id; ?></td>
        <td><?php echo $ordView->supplier_id; ?>        <img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user" width="30" height="30"></td>
        <td><?php echo $ordView->quantity; ?></td>
        <td><?php echo $ordView->unit_price; ?></td>
        <td><?php echo $ordView->supply_date; ?></td>
        <!-- <td><?php echo $ordView->status; ?></td>     -->
        <td>
          <div class="table-btns">
            <a href="#popup1"><button class="pendingBtn">Pending</button></a>
        
          </div> 
        </td>
      </tr>
      <?php endif; ?> 
    <?php endforeach; ?>

    </table>

  </div>

  <div class="divider">
    
  </div>

  <div class="title2">
    <h1>Completed Orders</h1>
  </div>
  <!-- <section></section> -->

  <div class="pastOrders">
    <table>
      <tr>
        <th>Supply Order Id</th>
        <th>Supplier</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Quality</th>
        <th>Supply Date</th>
        <th>Status</th>
        <th>More</th>
      </tr>
      
    <?php foreach ($data['ordView'] as $ordView) : ?>
      <?php if($ordView->status != "Not Collected"): ?>

      <tr>
        <td><?php echo $ordView->supply_order_id; ?></td>
        <td><?php echo $ordView->supplier_id; ?>        <img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user" width="30" height="30"></td>
        <td><?php echo $ordView->quantity; ?></td>
        <td><?php echo $ordView->unit_price; ?></td>
        <td><?php echo $ordView->quality; ?></td>
        <td><?php echo $ordView->supply_date; ?></td>
        <td>
          <?php if($ordView->status == 'Collected') : ?>
            <span class="status collected">Collected</span>
          <?php else : ?>
            <span class="status rejected">Rejected</span>
          <?php endif; ?>
        </td>    

        <td>
          <div class="table-btns">
            <a href="<?php echo URLROOT?>/Milk_Collection_Officer/collectionDetails/<?php echo $ordView->supply_order_id; ?>"><button class="viewBtn">View Invoice</button></a>
          </div> 
        </td>
      </tr>
      <?php endif ?> 
    <?php endforeach; ?>

    </table>

  </div>

  <!------------ order checking popup window ---------------->
  <div id="popup1" class="overlay">
    <div class="popup">
      <h2>Order Checking...</h2>
      <a class="close" href="#">&times;</a>

      <div class="content">
      <form id="addForm" action="<?php echo URLROOT; ?>/Milk_Collection_Officer/orderChecking" method="POST">
        <div class="feature">

        <?php foreach ($data['ordView'] as $ordView) : ?>
          <div class="form-input-title">Supplier Id :</div> <?php echo $ordView->supplier_id; ?>
          <div class="form-input-title">Supplier Name :</div> <?php echo " "; ?>
          <div class="form-input-title">Supply Order Id :</div> <?php echo $ordView->supply_order_id; ?>
          <div class="form-input-title">Quantity :</div> <?php echo $ordView->quantity; ?>
          <div class="form-input-title">Unit Price :</div> <?php echo $ordView->unit_price; ?>
          <div class="form-input-title">Payment has to do :</div> <?php echo $ordView->quantity; ?> * <?php echo $ordView->unit_price; ?>
          <div class="form-input-title">Status :</div>  <?php echo $ordView->status; ?>

          <div class="form-input-title">Enter the density :</div>

          <input type="decimal" name="density" id="density" class="density" autocomplete="off" value="<?php echo $ordView->density; ?> ">
          <div class="btn">
          <input type="submit" value="Accept" class="acceptBtn">
          <input type="submit" value="Reject" class="dltBtn">
          </div>
          <?php break; ?>
          <?php endforeach; ?>

        </div>
      </form>
      </div>

    </div>
  </div>
<!------------------------------------------------------>





    


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>
