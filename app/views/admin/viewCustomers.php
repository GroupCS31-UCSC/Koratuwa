<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewCustomers.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->
<h2>Customers</h2>

<div class="container">

  <div class="divContainer1">
    <div class="graph">
      graph
    </div>
    <div class="cusTable">
      
      <div class="search-container">

<div class="search-icon"><button><i class="fa-solid fa-magnifying-glass"></i></button></div>

<div class="search-box">  <input type="text" id="searchInput4" placeholder="Search By Customer Name..." onkeyup="searchFunc4();">
     
   </div> 
   </div> 
  
      <table id="cusTable">
      <thead>
        <th>Customer Id</th>
        <th>Name</th>
        <th>Contact Number</th>
        <th>Total Orders</th>
        <th>Action</th>
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['cusView'] as $cusView) : ?>
        <tr>
          <td><?php echo $cusView->customer_id; ?></td>
          <td><?php echo $cusView->name; ?></td>
          <td><?php echo $cusView->contact_number; ?></td>
          <td><?php echo '' ?></td>
          <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel5('<?=$cusView->customer_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td>
        </tr><br>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>


  <!-- <div class="divContainer2">
  </div> -->
  
  <div class="divContainer2">
    <h3>Feedbacks</h3> 
    <section class="feedback">
      <div class="full-boxer">
      <?php foreach ($data['cusFeedBacks'] as $cusFB) : ?>
        <div class="comment-box">
          <div class="box-top">
            <div class="profile-box">
              <div class="profile-img">
              <!-- <img src="<?php echo UPLOADS . $cusFB->image ?>" width='100' height='100'> -->
              </div>
              <div class="name">
                <strong><?php echo $cusFB->feedback_id; ?></strong>
                <span><?php echo $cusFB->supplier_id; ?></span>
              </div>
            </div>
          </div>
          <div class="comment">
            <p>
            <?php echo $cusFB->feedback; ?>
            </p>         
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
    
  </div>


</div>



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
