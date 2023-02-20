<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/viewSupply.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->
<!-- navigation bar ------>
  <!-- <img class="img-bg" src="<?php echo URLROOT; ?>/img/sup2.jpg" alt="no"> -->
   <?php flash('placeSupply_flash') ?>
  <?php flash('dltSupOrder_flash') ?>
  <?php flash('updateSupply_flash') ?>
  <!-- <div class="tabel_content"> -->
<section class="table-container">
  <div class="container">
    <table>
        <tr>
          <th>Supply Order ID</th>
          <th>Supply Date</th>
          <th>Supply Quantity (L) </th>
          <th>Price Received Per Unit (Rs) </th>
          <!-- <th>Supplying Address</th> -->
          <th>Status</th>
          <th>Remarks</th>
        </tr>

        <?php foreach ($data['supOrderView'] as $supOrd) : ?>
        <tr>
          <td><?php echo $supOrd->supply_order_id; ?></td>
          <td><?php echo $supOrd->supply_date; ?></td>
          <td><?php echo $supOrd->quantity; ?></td>
          <td><?php echo $supOrd->unit_price; ?></td>
          <!-- <td><?php echo $supOrd->supplying_address; ?></td> -->
          <td><?php echo $supOrd->status; ?></td>
          <td>
            <?php if($supOrd->status == 'Not Collected') : ?>
              <div class="table-btns">
                <a href="<?php echo URLROOT?>/Supplier/updateSupOrder/<?php echo $supOrd->supply_order_id ?>"><button class="updateBtn">UPDATE</button></a>
                <a href="<?php echo URLROOT?>/Supplier/deleteSupOrder/<?php echo $supOrd->supply_order_id ?>"><button class="deleteBtn">DELETE</button></a>
              </div>
            <?php else : ?>
              <?php echo $supOrd->remarks; ?>
            <?php endif; ?>
          </td>
        </tr><br>
        <?php endforeach; ?>

      </table>  
    </div>
</section>
<section class="details">
  <div class="container">
  <div class="feature">
    <div class="title"><h1>Total Supply Milk </h1></div>
    <svg viewBox="0 0 100 140">
      <defs>
        <filter id="goo">
              <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
              <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
              <feComposite in="SourceGraphic" in2="gooey" operator="atop"/>
        </filter>
      </defs>
      <rect id="box" x="10" y="0" width="80" height="0">
        <animate attributeName="height" from="0" to="85" dur="2s" fill="freeze" begin="1s"/>
        <animate attributeName="y" from="105" to="20" dur="2s" fill="freeze" begin="1s"/>
      </rect>
      <g>
        <path class="glass" d="M0 0 L0 140 L100 140 L100 0">
      </path>
      <rect class="glass" x="0" y="110" width="100" height="30"/>
      </g>
    </svg>    
  </div>

  
  <!-- <div class="feature">

  </div>     -->
  </div>
</section>


<p><?php echo($data['ordSum']) ?></p>     <!-- display the total milk quantity of relavant supplier -->
 
  <!-- </div>

</div>
</div> -->
<?php require APPROOT.'/views/include/footer.php'; ?>



        