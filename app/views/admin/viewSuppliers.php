<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewSuppliers.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<div class="container">

  <div class="divContainer1">
    <h2>Koratuwa Suppliers</h2>
    <table id="supTable">
      <thead>
        <th>Supplier Id</th>
        <th>Name</th>
        <th>Contact Number</th>
        <th>Total <br>Supply Orders</th>
        <th>Action</th>
      </thead>
      <tbody>   
        <?php $data_index=0 ?>
        <?php foreach ($data['supView'] as $supView) : ?>
        <tr>
          <td><?php echo $supView->supplier_id; ?></td>
          <td><?php echo $supView->name; ?></td>
          <td><?php echo $supView->contact_number; ?></td>
          <td><?php echo '' ?></td>
          <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel5('<?=$supView->supplier_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          </td>
        </tr><br>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- <div class="divContainer2">
    <div class="tableElement">
      <div class="model">
        <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
        <table id="tableForm">
          <tbody id="newData">
        </tbody>  
      </table>
      </div> -->

  <div class="divContainer2">
    
    <div class="tableElement">
    <div class="part1">
      GRAPH DETAILS
    </div>
    <div class="part2">

    
    <div class="model fade in" id="model5" tabindex="-1">
      <div class="model-dialog">
        <div class="model-content">
          <div class="model-header">
            <button type="button" class="close" onclick="closeModel5()" ><span aria-hidden="true">×</span></button>
            <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i>Supplier Details</h4>
          </div>
          <div class="model-body">
            <table class="tableForm">
              <tbody id="newData5">
              </tbody>  
            </table>         
            <br>
          </div>
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>
    </div>
    </div>
  </div>
  
  <div class="divContainer3">
    <!-- feedbacks -->
    <section class="feedback">
      <div class="full-boxer">
      <?php foreach ($data['supFeedBacks'] as $supFB) : ?>
        <div class="comment-box">
          <div class="box-top">
            <div class="profile-box">
              <div class="profile-img">
              <!-- <img src="<?php echo UPLOADS . $supFB->image ?>" width='100' height='100'> -->
              </div>
              <div class="name">
                <strong><?php echo $supFB->feedback_id; ?></strong>
                <span><?php echo $supFB->supplier_id; ?></span>
              </div>
            </div>
          </div>
          <div class="comment">
            <p>
            <?php echo $supFB->feedback; ?>
            </p>         
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>
    
  </div>
      
    </div>
 
  </div>


</div>



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
    <!-- <table>
      <tr>
        <th>User Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Nic</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      
      <tr>
        <td><?php echo $supView->user_id; ?></td>
        <td><img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user" width="20" height="20"></td>
        <td><?php echo $supView->name; ?></td>
        <td><?php echo $supView->nic; ?></td>
        <td><?php echo $supView->contact_number; ?></td>
        <td><?php echo $supView->address; ?></td>
        <td><?php echo $supView->email; ?></td>

      </tr><br>

    </table> -->