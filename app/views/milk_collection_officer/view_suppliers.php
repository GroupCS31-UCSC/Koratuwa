<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_suppliers.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<section></section>
  
  <div class="container" style="overflow-x: auto;">
  <h1><u>Suppliers of Koratuwa</u></h1>

  <table>
    <tr>
      <th>Supplier  Id</th>
      <th>Image</th>
      <th>Name</th>
      <th>Nic</th>
      <th>Contact Number</th>
      <th>Address</th>
      <th>Email</th>
    </tr>
      
    <?php foreach ($data['supView'] as $supView) : ?>
    <tr>
      <td><?php echo $supView->supplier_id; ?></td>
      <td><img src="<?php echo URLROOT; ?>/img/users/user.png" alt="user" width="50" height="50"></td>
      <td><?php echo $supView->name; ?></td>
      <td><?php echo $supView->nic; ?></td>
      <td><?php echo $supView->contact_number; ?></td>
      <td><?php echo $supView->address; ?></td>
      <td><?php echo $supView->email; ?></td>
    </tr><br>
    <?php endforeach; ?>

  </table>
  </div>



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>
